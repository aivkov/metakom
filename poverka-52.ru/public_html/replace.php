<?php
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

use Bitrix\Main\Loader;

Loader::includeModule('iblock');

$ids = [110, 108, 107,106,105,104,103,102,95,93,92,91,90,89,88,65,64,63,62,62,61,59,58, 117,118,119,116,115,114,113, 60];

$arFilter = ['ID' => $ids];
$arSelect = ['ID', 'NAME', 'PREVIEW_PICTURE'];
$res = CIBlockElement::GetList(['ID' => 'ASC'], $arFilter, false, false, $arSelect);
while($item = $res->Fetch()) {
    $pictureId = $item['PREVIEW_PICTURE'];
    if($pictureId) {
        $arFile = CFile::MakeFileArray(CFile::GetPath($item['PREVIEW_PICTURE']));
        CIBlockElement::SetPropertyValuesEx($item['ID'], false, array('PICTURE' => $arFile));
        $el = new CIBlockElement;
        $el->Update($item['ID'], ['PREVIEW_PICTURE'=> ['del' => 'Y']]);
    }
}