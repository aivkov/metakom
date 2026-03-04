<?php

namespace Ms;

use \Bitrix\Main\Type\DateTime;

class Parser
{
    private $iblockId = 31;

    private $hlBlockId = 4;
    private $url = 'https://satro-paladin.com';
    private $data = [];

    private $error = '';

    private $arParams;
    private $sections = [
        '/catalog/domofony-i-peregovornye-ustroystva/monitory-videodomofonov/',
        '/catalog/domofony-i-peregovornye-ustroystva/videopaneli-individualnye/',
        '/catalog/domofony-i-peregovornye-ustroystva/audiotrubki/',
        '/catalog/sistemy-videonablyudeniya/videokamery/',
        '/catalog/sistemy-ohranno-pozharnoy-signalizacii/',
        '/catalog/sistemy-videonablyudeniya/monitory-i-televizory/monitory/',
        '/catalog/zamki-dovodchiki-i-furnitura/dovodchiki-dvernye/'
    ];
    private $sectionCode;

    private $entityDataClass;

    public function __construct($arParams = [])
    {
        require($_SERVER['DOCUMENT_ROOT'] . '/local/tools/simple-html-dom.php');
        $this->entityDataClass = HLBlock::GetEntityDataClass($this->hlBlockId);
        $this->arParams = $arParams;
    }

    public function clearTable()
    {
        global $DB;
        $query = 'TRUNCATE TABLE ms_catalog_import';
        $res = $DB->Query($query);
        $a = $res;
    }

    public function continue()
    {
        $productRow = $this->selectProductRow();
        $this->parseProduct($productRow);
        $res = $this->getTotalInfo();
        $res['error'] = $this->error;
        $res['status'] = 'success';
        return $res;
    }

    private function selectProductRow()
    {
        $res = $this->entityDataClass::getList(['filter' => ['UF_IMPORT_DATE_TIME' => false], 'limit' => 1])->Fetch();
        return $res;
    }

    private function getTotalInfo()
    {
        $arFilter = ['!UF_IMPORT_DATE_TIME' => false];
        $done = $this->countRowsByFilter($arFilter);

        $arFilter = [];
        $total = $this->countRowsByFilter($arFilter);
        $percent = 100;
        if($total) {
            $percent = round($done / $total * 100, 2);
        }
        return ['count' => (int)$done, 'total' => (int)$total, 'percent' => $percent];
    }

    private function countRowsByFilter($arFilter) {
        $res = $this->entityDataClass::getList(
            [
                'select' => ['CNT'],
                'filter' => $arFilter,
                'runtime' => [
                    new \Bitrix\Main\Entity\ExpressionField('CNT', 'COUNT(*)'),
                ]
            ]
        )->Fetch();
        return $res['CNT'];
    }

    public function scanSection()
    {
        $count = $this->arParams['count'] ?? 1;
        $page = $this->arParams['page'] ?? 1;

        $sectionUri = $this->sections[$count - 1];
        $sectionUrl = $this->url . $sectionUri;

        if($page > 1) {
            $sectionUrl .= '?page=' . $page;
        }

        $data = file_get_html($sectionUrl);
        if($page == 1) {
            $lastPage = $this->getLastPage($data);
        } else {
            $lastPage = $this->arParams['last_page'];
        }

        $title = trim($data->find('h1', 0)->plaintext);

        $products = $data->find('.good_block_wrapper');
        foreach ($products as $product) {
            $link = $product->find('.title', 0);
            if ($link) {
                $productLink = $link->attr['href'];
                $arFields = [
                    'UF_SECTION_URL' => $sectionUri,
                    'UF_SECTION_NAME' => $title,
                    'UF_PRODUCT_LINK' => $productLink,
                    'UF_PAGE_NUMBER' => $page
                ];

                $this->entityDataClass::add($arFields);
            }
        }
        $countSections = count($this->sections);
        $percent = round(($page / $lastPage / $countSections + ($count - 1) / $countSections) * 100, 1);
        return ['status' => 'success', 'total' => count($this->sections), 'count' => $count, 'page' => $page, 'last_page' => $lastPage, 'percent' => $percent];
    }

    private function getLastPage($data)
    {
        $pagination = $data->find('.pagination', 0);
        if ($pagination) {
            $paginationLinks = $pagination->find('a.page_number');
            if ($paginationLinks && count($paginationLinks)) {
                $lastLink = $paginationLinks[count($paginationLinks) - 2];
                $lastPage = (int)$lastLink->innertext;
            }
        }
        if ($lastPage) {
            return $lastPage;
        }
        return 1;
    }

    private function parseProduct($row)
    {
        $uri = $row['UF_PRODUCT_LINK'];
        $url = $this->url . $uri;
        $data = file_get_html($url);
        $product = $data->find('.details_content', 0);
        $about = $data->find('.about_content', 0);

        $urlParts = explode('/', trim($uri, '/'));
        $extId = (int)$urlParts[count($urlParts) - 1];

        $arPictures = $this->selectProductPictures($product);
        $morePhoto = [];
        foreach ($arPictures as $key => $picture) {
            if (!$key) {
                continue;
            }
            $morePhoto[] = \CFile::MakeFileArray($picture);
        }

        $arFields = [
            'IBLOCK_ID' => $this->iblockId,
            'ACTIVE' => 'Y',
            'XML_ID' => $extId,
            'NAME' => $this->getProductTitle($data),
            'DETAIL_TEXT' => $this->getDescription($about),
            'DETAIL_TEXT_TYPE' => 'html',
            'DETAIL_PICTURE' => $arPictures ? \CFile::MakeFileArray($arPictures[0]) : false,
            'IBLOCK_SECTION_ID' => $this->getSectionId($row),
            'PROPERTY_VALUES' => [
                'PRICE' => $this->getPrice($product),
                'MORE_PHOTO' => $morePhoto,
                'FEATURES' => $this->getFeatures($product),
                'CHARACTERISTICS' => $this->getCharacteristics($about)
            ]
        ];

        $el = new \CIBlockElement;
        if ($id = $this->existProductId($extId)) {
            $res = $el->Update($id, $arFields);
        } else {
            $res = $el->Add($arFields);
        }

        if (!$res) {
            $arFields = ['UF_IMPORT_ERROR' => $el->LAST_ERROR, 'UF_IMPORT_DATE_TIME' => new DateTime()];
            $this->error = $el->LAST_ERROR;
        } else {
            $arFields = ['UF_IMPORT_ERROR' => '', 'UF_IMPORT_DATE_TIME' => new DateTime()];
        }

        $this->entityDataClass::update($row['ID'], $arFields);
    }

    private function getSectionId($row) {
        $sectionName = $row['UF_SECTION_NAME'];
        $parts = explode('/', trim($row['UF_SECTION_URL'], '/'));

        $sectionCode = $parts[count($parts) - 1];
        $arFilter = ['CODE' => $sectionCode];
        $arSelect = ['ID'];
        $checkSection = \CIBlockSection::GetList([], $arFilter, false, $arSelect)->Fetch();
        if($checkSection) {
            return $checkSection['ID'];
        }
        $arFields = ['IBLOCK_ID' => $this->iblockId, 'NAME' => $sectionName, 'CODE' => $sectionCode];
        $bs = new \CIBlockSection;
        $sectionId = $bs->Add($arFields);
        return $sectionId;
    }

    private function existProductId($extId)
    {
        $arFilter = ['IBLOCK_ID' => $this->iblockId, 'XML_ID' => $extId];
        $res = \CIBlockElement::GetList([], $arFilter, false, false, ['ID'])->Fetch();
        return (int)$res['ID'];
    }

    private function getProductTitle($data)
    {
        $obTitle = $data->find('h1', 0);
        return $obTitle->plaintext;
    }

    private function selectProductPictures($product)
    {
        $arPictures = [];
        $gallery = $product->find('.image_gallery .web_slider ', 0);
        if($gallery) {
            $slides = $gallery->find('.slide');
            if($slides) {
                foreach ($slides as $slide) {
                    $img = $slide->find('img', 0);
                    $href = $img->attr['original_img'];
                    $arPictures[] = $href;
                }
            }
        }

        return $arPictures;
    }

    private function getPrice($product)
    {
        $obPrice = $product->find('[itemprop="price"]', 0);
        return $obPrice->attr['content'];
    }

    private function getFeatures($product)
    {
        $resFeatures = [];
        $obFeatures = $product->find('.details .specs', 0);
        $arFeatures = $obFeatures->children();
        foreach ($arFeatures as $feature) {
            if (isset($feature->attr['itemprop'])) {
                continue;
            }
            if ($feature->tag == 'a') {
                continue;
            }

            $resFeatures[] = $this->formatFeature($feature);
        }
        return $resFeatures;
    }

    private function getCharacteristics($el)
    {
        $resChar = [];
        $obChar = $el->find('#specs .specs', 0);
        $arChar = $obChar->children();
        foreach ($arChar as $char) {
            $resChar[] = $this->formatFeature($char);
        }
        return $resChar;
    }

    private function formatFeature($feature)
    {
        $value = trim($feature->find('.value', 0)->plaintext);
        $text = trim($feature->plaintext);
        return [
            'DESCRIPTION' => substr($text, 0, strlen($text) - strlen($value)),
            'VALUE' => $value
        ];
    }

    private function getDescription($el)
    {
        $description = '';
        $obDescription = $el->find('.description', 0);
        foreach ($obDescription->children() as $children) {
            $description .= $children->outertext;
        }
        return $description;
    }
}