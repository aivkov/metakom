<?php

use Bitrix\Iblock\IblockTable;
use Bitrix\Iblock\TypeTable;
use Bitrix\Main\SiteTable;
use Bitrix\Iblock\SectionTable;
use Bitrix\Main\Context;
use Bitrix\Main\Loader;
use Bitrix\Main\Result;
use Bitrix\Main\Error;


require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

global $USER;
if (!$USER->IsAdmin()) {
    die('not authorized as admin');
}

class CopySection
{
    private $iblockFrom;
    private $iblockTo;

    private $section;

    private $sections;


    public function __construct()
    {
        $request = Context::getCurrent()->getRequest();
        $this->result = new Bitrix\Main\Result();
        $this->iblockFrom = (int)$request->getPost('from');
        $this->iblockTo = (string)$request->getPost('to');
        $this->section = (string)$request->getPost('section');
    }

    public function run()
    {
        $this->validate();
        if (!$this->result->isSuccess()) {
            return $this->result;
        }

        $this->copySections();
        $this->copyElements();
        return $this->result;
    }

    private function validate()
    {
        if (empty($this->iblockFrom)) {
            $this->result->addError(new Error('Не указан инфоблок "Откуда копировать"'));
        }
        if (empty($this->iblockTo)) {
            $this->result->addError(new Error('Не указан инфоблок "Куда копировать"'));
        }
        if (empty($this->iblockTo)) {
            $this->result->addError(new Error('Не выбран раздел'));
        }

    }

    private function copySections()
    {
        $arFilter = ['IBLOCK_ID' => $this->iblockFrom,'ID' => $this->section];
        $res = CIBlockSection::getList([], $arFilter);
        $arSections = [];
        while($s = $res->Fetch()) {
            $arSections[] = $s;
        }

        $arFilter = ['IBLOCK_ID' => $this->iblockFrom,'SECTION_ID' => $this->section];
        $res = CIBlockSection::getList(['DEPTH_LEVEL' => 'ASC'], $arFilter);
        while($s = $res->Fetch()) {
            $arSections[] = $s;
        }

        foreach($arSections as $section) {
            $sectionId = $section['ID'];
            $iblockSectionId = $section['IBLOCK_SECTION_ID'];
            unset($section['ID'], $section['RIGHT_MARGIN'], $section['LEFT_MARGIN'], $section['TIMESTAMP_X'], $section['DATE_CREATE'],
                $section['CREATED_BY'], $section['IBLOCK_TYPE_ID'], $section['IBLOCK_CODE'], $section['IBLOCK_EXTERNAL_ID']);

            if ($section['IBLOCK_SECTION_ID']) {
                $section['IBLOCK_SECTION_ID'] = $this->sections[$iblockSectionId];
            }
            $section['IBLOCK_ID'] = $this->iblockTo;

            if ($section['PICTURE']) {
                $section['PICTURE'] = CFile::MakeFileArray(CFile::GetPath($section['PICTURE']));
            }

            if ($section['DETAIL_PICTURE']) {
                $section['DETAIL_PICTURE'] = CFile::MakeFileArray(CFile::GetPath($section['DETAIL_PICTURE']));
            }

            $bs = new CIBlockSection;

            $newSectionId = $bs->Add($section);
            if ($newSectionId) {
                $this->sections[$sectionId] = $newSectionId;
            } else {
                $this->result->addError(new Error($res->LAST_ERROR));
            }
        }
    }

    private function copyElements()
    {
        $arFilter = ['IBLOCK_ID' => $this->iblockFrom, 'SECTION_ID' => $this->section, 'INCLUDE_SUBSECTIONS' => 'Y'];
        $res = CIBlockElement::GetList([], $arFilter);

        while ($ob = $res->GetNextElement()) {
            $arFields = $ob->GetFields();
            $arProperties = $ob->getProperties();

            $copyFields = [
                'IBLOCK_ID' => $this->iblockTo,
                'NAME' => $arFields['NAME'],
                'CODE' => $arFields['CODE'],
                'ACTIVE' => $arFields['ACTIVE'],
                'ACTIVE_FROM' => $arFields['ACTIVE_FROM'],
                'ACTIVE_TO' => $arFields['ACTIVE_TO'],
                'SORT' => $arFields['SORT'],
                'PREVIEW_TEXT' => $arFields['PREVIEW_TEXT'],
                'PREVIEW_TEXT_TYPE' => $arFields['PREVIEW_TEXT_TYPE'],
                'DETAIL_TEXT' => $arFields['DETAIL_TEXT'],
                'DETAIL_TEXT_TYPE' => $arFields['DETAIL_TEXT_TYPE'],
            ];

            if ($arFields['IBLOCK_SECTION_ID']) {
                $copyFields['IBLOCK_SECTION_ID'] = $this->sections[$arFields['IBLOCK_SECTION_ID']];
            }

            if ($arFields['PREVIEW_PICTURE']) {
                $copyFields['PREVIEW_PICTURE'] = CFile::MakeFileArray(CFile::GetPath($arFields['PREVIEW_PICTURE']));
            }
            if ($arFields['DETAIL_PICTURE']) {
                $copyFields['DETAIL_PICTURE'] = CFile::MakeFileArray(CFile::GetPath($arFields['DETAIL_PICTURE']));
            }

            if ($arProps = $this->selectElementProperties($arProperties)) {
                $copyFields['PROPERTY_VALUES'] = $arProps;
            }
            $el = new CIBlockElement;
            $el->Add($copyFields);
        }
    }

    private function selectElementProperties($arProperties)
    {
        $resultProps = [];
        if (is_array($arProperties) && !empty($arProperties)) {
            foreach ($arProperties as $arProp) {
                if ($arProp['PROPERTY_TYPE'] == 'S') {
                    if ($arProp['DESCRIPTION']) {
                        $resultProps[$arProp['CODE']] = [
                            'n0' => [
                                'VALUE' => $arProp['VALUE'],
                                'DESCRIPTION' => $arProp['DESCRIPTION']
                            ]
                        ];
                    } else {
                        $resultProps[$arProp['CODE']] = $arProp['VALUE'];
                    }
                } elseif ($arProp['PROPERTY_TYPE'] == 'F') {
                    if ($arProp['VALUE']) {
                        $resultProps[$arProp['CODE']] = CFile::MakeFileArray(CFile::GetPath($arProp['VALUE']));
                    }
                }
            }
        }
        return $resultProps;
    }
}


Loader::IncludeModule("iblock");
$request = Context::getCurrent()->getRequest();

if ($request->isPost()) {
    $result = (new CopySection())->run();
}

$iblockList = IblockTable::getList()->fetchCollection();
$sectionList = SectionTable::getList();
?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <div class="container pt-5">
        <?php if (isset($result) && $result->isSuccess()) { ?>
            <div class="row justify-content-md-center">
                <div class="col-6">
                    <div class="alert alert-success" role="alert">
                        Раздел успешно скопирован
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if (isset($result) && !$result->isSuccess()) { ?>
            <div class="row justify-content-md-center">
                <div class="col-6">
                    <div class="alert alert-danger" role="alert">
                        <?= implode('<br />', $result->getErrorMessages()) ?>
                    </div>
                </div>
            </div>
        <?php } ?>
        <form action="<?= $request->getRequestedPage() ?>" method="post">
            <div class="row justify-content-md-center">
                <div class="col-6">
                    <label for="from" class="form-label">ИБ откуда</label>
                    <select class="form-select mb-3 js-select-ib" name="from" required>
                        <option value="">-</option>
                        <?php foreach ($iblockList as $iblock) { ?>
                            <option value="<?= $iblock->getId() ?>"><?= $iblock->getId() ?>
                                - <?= $iblock->getIblockTypeId() ?> <?= $iblock->getName() ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-6">
                    <label for="from" class="form-label">ИБ куда</label>
                    <select class="form-select mb-3" name="to" required>
                        <option value="">-</option>
                        <?php foreach ($iblockList as $iblock) { ?>
                            <option value="<?= $iblock->getId() ?>"><?= $iblock->getId() ?>
                                - <?= $iblock->getIblockTypeId() ?> <?= $iblock->getName() ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row justify-content-md-center">
                <div class="col-6">
                    <label for="from" class="form-label">Раздел</label>
                    <select class="form-select mb-3" name="section" required>
                        <option value="">-</option>
                        <?php while ($section = $sectionList->Fetch()) { ?>
                            <option class="js-option-section" value="<?= $section['ID'] ?>"
                                    data-ib-id="<?= $section['IBLOCK_ID'] ?>"
                                    style="display: none">[IB - <?= $section['IBLOCK_ID'] ?>] <?= $section['ID'] ?>
                                . <?= $section['NAME'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row justify-content-md-center">
                <div class="col-6">
                    <button type="submit" class="btn btn-primary">Скопировать</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        const ibSelect = document.querySelector('.js-select-ib')
        if (!!ibSelect) {
            ibSelect.addEventListener('change', (e) => {
                const iblockId = e.target.value

                const sOptions = document.querySelectorAll('.js-option-section')
                sOptions.forEach((option) => {
                    const sIbId = option.dataset.ibId
                    if (sIbId == iblockId) {
                        option.style.display = 'block'
                    } else {
                        option.style.display = 'none'
                    }
                })
            })

        }
    </script>
<?php require($_SERVER["DOCUMENT_ROOT"] . '/bitrix/modules/main/include/epilog_after.php');