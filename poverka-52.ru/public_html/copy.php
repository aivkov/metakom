<?php

use Bitrix\Iblock\IblockTable;
use Bitrix\Iblock\TypeTable;
use Bitrix\Main\SiteTable;
use Bitrix\Main\Context;
use Bitrix\Main\Loader;
use Bitrix\Main\Result;
use Bitrix\Main\Error;


require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

global $USER;
if (!$USER->IsAdmin()) {
    die('not authorized as admin');
}

class CopyIblock
{
    private $iblockFrom;
    private $iblockTypeTo;
    private $iblockName;
    private $iblockCode;
    private $siteId;

    private $newIblockId;

    private $sections = [];
    private $result;

    public function __construct()
    {
        $request = Context::getCurrent()->getRequest();
        $this->result = new Bitrix\Main\Result();
        $this->iblockFrom = (int)$request->getPost('from');
        $this->iblockTypeTo = (string)$request->getPost('to');
        $this->siteId = (string)$request->getPost('site');
        $this->iblockCode = $request->getPost('code');
        $this->iblockName = $request->getPost('name');
    }

    public function run()
    {
        $this->validate();
        if (!$this->result->isSuccess()) {
            return $this->result;
        }
        $this->copyIb();
        $this->copyIbProps();
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
            $this->result->addError(new Error('Не указан инфоблок для копирования'));
        }
        if (empty($this->iblockTypeTo)) {
            $this->result->addError(new Error('Не указан инфоблок для копирования'));
        }
        if (empty($this->siteId)) {
            $this->result->addError(new Error('Выберите привязку к сайту'));
        }
        if (empty($this->iblockName)) {
            $this->result->addError(new Error('Введите наименование инфоблока'));
        }
        if (empty($this->iblockCode)) {
            $this->result->addError(new Error('Введите символьный код инфоблока'));
        }
    }

    private function copyIb()
    {
        $arFields = CIBlock::GetArrayByID($this->iblockFrom);
        unset($arFields["ID"], $arFields["LID"]);

        $arFields["GROUP_ID"] = CIBlock::GetGroupPermissions($this->iblockFrom);

        $arFields["API_CODE"] = "";
        $arFields["IBLOCK_TYPE_ID"] = $this->iblockTypeTo;

        $arFields["LID"] = [$this->siteId];

        $arFields['NAME'] = $this->iblockName;
        $arFields['CODE'] = $this->iblockCode;

        $res = new CIBlock();
        $this->newIblockId = $res->Add($arFields);
        if ($this->newIblockId === false) {
            $this->result->addError(new Error($res->LAST_ERROR));
        }
    }

    private function copyIbProps()
    {
        $iblockPropertyNew = new CIBlockProperty();
        $iblockProperties = CIBlockProperty::GetList(
            ["sort" => "asc", "name" => "asc"],
            ["ACTIVE" => "Y", "IBLOCK_ID" => $this->iblockFrom]
        );
        while ($property = $iblockProperties->GetNext()) {
            $property["IBLOCK_ID"] = $this->newIblockId;
            unset($property["ID"]);

            /**
             * Для свойств типа "список" дополнительным запросом получаем возможные варианты
             */
            if ($property["PROPERTY_TYPE"] === "L") {
                $propertyEnums = CIBlockPropertyEnum::GetList(
                    ["DEF" => "DESC", "SORT" => "ASC"],
                    ["IBLOCK_ID" => $this->iblockFrom, "CODE" => $property["CODE"]]
                );
                while ($enumFields = $propertyEnums->GetNext()) {
                    $property["VALUES"][] = [
                        "VALUE" => $enumFields["VALUE"],
                        "DEF" => $enumFields["DEF"],
                        "SORT" => $enumFields["SORT"]
                    ];
                }
            }

            /**
             * Очистка ненужных элементов массива свойства, которые начинаются с ~
             */
            foreach ($property as $k => $v) {
                if (!is_array($v)) {
                    $property[$k] = trim($v);
                }
                if ($k[0] === '~') {
                    unset($property[$k]);
                }
            }

            $propertyCopy = $iblockPropertyNew->Add($property);
            if ($propertyCopy === false) {
                $this->result->addError(new Error($iblockPropertyNew->LAST_ERROR));
            }
        }
    }

    private function copySections()
    {
        $res = CIBlockSection::getList(['DEPTH_LEVEL' => 'ASC'], ['IBLOCK_ID' => $this->iblockFrom]);
        while ($section = $res->Fetch()) {
            $sectionId = $section['ID'];
            $iblockSectionId = $section['IBLOCK_SECTION_ID'];
            unset($section['ID'], $section['RIGHT_MARGIN'], $section['LEFT_MARGIN'], $section['TIMESTAMP_X'], $section['DATE_CREATE'],
                $section['CREATED_BY'], $section['IBLOCK_TYPE_ID'], $section['IBLOCK_CODE'], $section['IBLOCK_EXTERNAL_ID']);

            if ($section['IBLOCK_SECTION_ID']) {
                $section['IBLOCK_SECTION_ID'] = $this->sections[$iblockSectionId];
            }
            $section['IBLOCK_ID'] = $this->newIblockId;

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
        $arFilter = ['IBLOCK_ID' => $this->iblockFrom];
        $res = CIBlockElement::GetList([], $arFilter);

        while ($ob = $res->GetNextElement()) {
            $arFields = $ob->GetFields();
            $arProperties = $ob->getProperties();

            $copyFields = [
                'IBLOCK_ID' => $this->newIblockId,
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
    $result = (new CopyIblock())->run();
}

$iblockList = IblockTable::getList()->fetchCollection();
$iblockTypeList = TypeTable::getList()->fetchCollection();
$siteList = SiteTable::getList()->fetchCollection();
?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <div class="container pt-5">
        <?php if (isset($result) && $result->isSuccess()) { ?>
            <div class="row justify-content-md-center">
                <div class="col-6">
                    <div class="alert alert-success" role="alert">
                        Инфоблок успешно скопирован
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
                    <label for="from" class="form-label">Скопировать инфоблок</label>
                    <select class="form-select mb-3" name="from" required>
                        <option value="">-</option>
                        <?php foreach ($iblockList as $iblock) { ?>
                            <option value="<?= $iblock->getId() ?>"><?= $iblock->getId() ?>. <?= $iblock->getName() ?>
                                - <?= $iblock->getIblockTypeId() ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-6">
                    <label for="to" class="form-label">В тип инфоблока</label>
                    <select class="form-select mb-3" name="to" required>
                        <option value="">-</option>
                        <?php foreach ($iblockTypeList as $iblockType) { ?>
                            <option value="<?= $iblockType->getId() ?>"><?= $iblockType->getId() ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-6">
                    <label for="to" class="form-label">Привязать к сайту</label>
                    <select class="form-select mb-3" name="site" required>
                        <option value="">-</option>
                        <?php foreach ($siteList as $siteItem) { ?>
                            <option value="<?= $siteItem->getLid() ?>"><?= $siteItem->getLid() ?>
                                - <?= $siteItem->getName() ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group row justify-content-md-center">
                <div class="col-6">
                    <label for="to" class="form-label">Наименование ИБ</label>
                    <input type="text" class="mb-3 form-control" name="name" required>
                </div>
            </div>
            <div class="form-group row justify-content-md-center">
                <div class="col-6">
                    <label for="to" class="form-label">Символьный код (Домен)</label>
                    <input type="text" class="mb-3 form-control" name="code" required>
                </div>
            </div>

            <div class="row justify-content-md-center">
                <div class="col-6">
                    <button type="submit" class="btn btn-primary">Скопировать</button>
                </div>
            </div>
        </form>
    </div>
<?php require($_SERVER["DOCUMENT_ROOT"] . '/bitrix/modules/main/include/epilog_after.php');