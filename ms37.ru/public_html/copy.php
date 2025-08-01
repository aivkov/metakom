<?php

use Bitrix\Iblock\IblockTable;
use Bitrix\Iblock\TypeTable;
use Bitrix\Main\SiteTable;
use Bitrix\Main\Context;
use Bitrix\Main\Loader;
use Bitrix\Main\Result;

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

/**
 * Метод для копирования инфоблока
 * @param int $iblockIdFrom ID инфоблока для копирования
 * @param string $iblockTypeTo Код типа инфоблока, где будет создана копия
 * @return \Bitrix\Main\Result
 */
function iblockCopy(int $iblockIdFrom, string $iblockTypeTo, string $site): Result
{
    $result = new Bitrix\Main\Result();
    if (empty($iblockIdFrom)) {
        $result->addError(new Bitrix\Main\Error('Не указан инфоблок для копирования'));
        return $result;
    }
    if (empty($iblockTypeTo)) {
        $result->addError(new Bitrix\Main\Error('Не указан инфоблок для копирования'));
        return $result;
    }

    /**
     * Получаем все поля инфоблока-источника
     */
    $iblockFields = CIBlock::GetArrayByID($iblockIdFrom);
    unset($iblockFields["ID"], $iblockFields["LID"]);
    $iblockFields["GROUP_ID"] = CIBlock::GetGroupPermissions($iblockIdFrom);
    /**
     * Название и код API инфоблока должны быть уникальными, добавляем new к значениям
     */
    $iblockFields["API_CODE"] = "";
    $iblockFields["IBLOCK_TYPE_ID"] = $iblockTypeTo;

    /**
     * Привязка к сайту может быть множественной, поэтому используем отдельный запрос
     */

    $iblockFields["LID"] = [$site];


    /**
     * Создаем инфоблок
     */
    $iblockNew = new CIBlock();
    $iblockIdNew = $iblockNew->Add($iblockFields);
    if ($iblockIdNew === false) {
        $result->addError(new Bitrix\Main\Error($iblockNew->LAST_ERROR));
        return $result;
    }
    $GLOBALS['newIblockId'] = $iblockIdNew;

    /**
     * Выбираем и копируем свойства инфоблока
     */
    $iblockPropertyNew = new CIBlockProperty();
    $iblockProperties = CIBlockProperty::GetList(
        ["sort" => "asc", "name" => "asc"],
        ["ACTIVE" => "Y", "IBLOCK_ID" => $iblockIdFrom]
    );
    while ($property = $iblockProperties->GetNext()) {
        $property["IBLOCK_ID"] = $iblockIdNew;
        unset($property["ID"]);

        /**
         * Для свойств типа "список" дополнительным запросом получаем возможные варианты
         */
        if ($property["PROPERTY_TYPE"] === "L") {
            $propertyEnums = CIBlockPropertyEnum::GetList(
                ["DEF" => "DESC", "SORT" => "ASC"],
                ["IBLOCK_ID" => $iblockIdFrom, "CODE" => $property["CODE"]]
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
            $result->addError(new Bitrix\Main\Error($iblockPropertyNew->LAST_ERROR));
            return $result;
        }
    }
    return $result;
}

function iblockElementsCopy($fromIblockId, $toIblockId) {
    $arFilter = ['IBLOCK_ID' => $fromIblockId];
    $res = CIBlockElement::GetList([], $arFilter);
    while($item = $res->Fetch()) {
        $copyFields = [
            'IBLOCK_ID' => $toIblockId,
            'NAME' => $item['NAME'],
            'DETAIL_TEXT' => $item['DETAIL_TEXT'],
            'PREVIEW_TEXT' => $item['PREVIEW_TEXT'],
            'ACTIVE' => $item['ACTIVE'],
            'SORT' => $item['SORT'],
        ];
        if($item['PREVIEW_PICTURE']) {
            $copyFields['PREVIEW_PICTURE'] = CFile::MakeFileArray(CFile::GetPath($item['PREVIEW_PICTURE']));
        }
        if($item['DETAIL_PICTURE']) {
            $copyFields['DETAIL_PICTURE'] = CFile::MakeFileArray(CFile::GetPath($item['DETAIL_PICTURE']));
        }
        $el = new CIBlockElement;
        $el->Add($copyFields);
    }
}



Loader::IncludeModule("iblock");
$request = Context::getCurrent()->getRequest();
/**
 * Если запрос POST, пытаемся обработать
 */
if ($request->isPost()) {
    $result = iblockCopy((int)$request->getPost('from'), (string)$request->getPost('to'), (string)$request->getPost('site'));
    if($result && $result->isSuccess()) {
        iblockElementsCopy((int)$request->getPost('from'), $GLOBALS['newIblockId']);
    }
}

/**
 * Списки инфоблоков и типов инфоблоков для постороения списков
 */
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
                        <?=implode('<br />', $result->getErrorMessages())?>
                    </div>
                </div>
            </div>
        <?php } ?>
        <form action="<?=$request->getRequestedPage()?>" method="post">
            <div class="row justify-content-md-center">
                <div class="col-6">
                    <label for="from" class="form-label">Скопировать инфоблок</label>
                    <select class="form-select mb-3" name="from" required>
                        <option value="">-</option>
                        <?php foreach ($iblockList as $iblock) { ?>
                            <option value="<?= $iblock->getId() ?>"><?= $iblock->getId() ?>.  <?= $iblock->getName() ?>  - <?= $iblock->getIblockTypeId() ?></option>
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
                            <option value="<?= $siteItem->getLid() ?>"><?= $siteItem->getLid() ?> - <?= $siteItem->getName() ?></option>
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
<?php require($_SERVER["DOCUMENT_ROOT"] . '/bitrix/modules/main/include/epilog_after.php');