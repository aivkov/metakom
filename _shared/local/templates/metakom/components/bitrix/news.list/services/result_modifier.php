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
