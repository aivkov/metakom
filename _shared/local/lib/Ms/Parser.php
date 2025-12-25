<?php

namespace Ms;

class Parser
{
    private $iblockId = 31;
    private $url = 'https://satro-paladin.com/';
    private $data = [];
    private $sections = [
        '/catalog/domofony-i-peregovornye-ustroystva/'
    ];
    private $sectionCode;

    public function run()
    {
        foreach ($this->sections as $sectionUri) {
            $this->parseSection($sectionUri);
        }
    }

    private function parseSection($sectionUri)
    {
        $url = $this->url . $sectionUri;
        $data = file_get_html($url);
        $products = $data->find('.good_block_wrapper');
        foreach ($products as $product) {
            $link = $product->find('.title', 0);
            if ($link) {
                $uri = $link->attr['href'];
                if ($uri) {
                    $this->parseProduct($uri);
                }
            }
        }

    }

    private function parseProduct($uri)
    {
        $url = $this->url . $uri;
        $data = file_get_html($url);
        $product = $data->find('.details_content', 0);
        $about = $data->find('.about_content', 0);

        $urlParts = explode('/', trim($uri, '/'));
        $extId = (int)$urlParts[count($urlParts) - 1];

        $arPictures = $this->selectProductPictures($product);
        $morePhoto = [];
        foreach($arPictures as $key => $picture) {
            if(!$key) {
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
            'PROPERTY_VALUES' => [
                'PRICE' => $this->getPrice($product),
                'MORE_PHOTO' => $morePhoto,
                'FEATURES' => $this->getFeatures($product),
                'CHARACTERISTICS' => $this->getCharacteristics($about)
            ]
        ];

        $el = new \CIBlockElement;
        if($id = $this->existProductId($extId)) {
            $res = $el->Update($id, $arFields);
        } else {
            $res = $el->Add($arFields);
        }
    }

    private function existProductId($extId) {
        $arFilter = ['IBLOCK_ID' => $this->iblockId, 'XML_ID' => $extId];
        $res = \CIBlockElement::GetList([], $arFilter, false, false, ['ID'])->Fetch();
        return (int)$res['ID'];
    }

    private function getProductTitle($data) {
        $obTitle = $data->find('h1', 0);
        return $obTitle->plaintext;
    }

    private function selectProductPictures($product)
    {
        $gallery = $product->find('.image_gallery .web_slider ', 0);
        $slides = $gallery->find('.slide');

        $arPictures = [];
        foreach ($slides as $slide) {
            $img = $slide->find('img', 0);
            $href = $img->attr['original_img'];
            $arPictures[] = $href;
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

    private function getDescription($el) {
        $description = '';
        $obDescription = $el->find('.description', 0);
        foreach($obDescription->children() as $children) {
            $description .= $children->outertext;
        }
        return $description;
    }
}