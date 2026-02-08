<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}

/** @var array $arParams */
/** @var array $arResult */
/** @global \CMain $APPLICATION */
/** @global \CUser $USER */
/** @global \CDatabase $DB */
/** @var \CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var array $templateData */
/** @var \CBitrixComponent $component */

if($arParams['PARENT_SECTION_CODE']) {
    $arFilter = ['IBLOCK_ID' => $arParams['IBLOCK_ID'], 'CODE' => $arParams['PARENT_SECTION_CODE']];
    $arSelect = ['ID', 'PICTURE', 'NAME', 'CODE'];
    $arResult['PARENT_SECTION'] = CIBlockSection::GetList([], $arFilter, false, $arSelect)->Fetch();
    $this->__component->setResultCacheKeys(['PARENT_SECTION']);
}

foreach($arResult['ITEMS'] as &$arItem) {
    if(strpos($arItem['DETAIL_TEXT'], '#DETAIL_PICTURE#') !== false) {
        $picture = '<img src="' . CFile::GetPath($arItem['DETAIL_TEXT']) . '" alt="">';
        str_replace('#DETAIL_PICTURE#', $picture, $arItem['DETAIL_TEXT']);
    }
}
unset($arItem);

