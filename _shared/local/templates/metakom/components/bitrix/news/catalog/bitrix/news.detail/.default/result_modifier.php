<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

use Ms\Brand;

$arResult['PICTURES'] = [];
if($arResult['DETAIL_PICTURE']['ID']) {
    $arResult['PICTURES'][] = $arResult['DETAIL_PICTURE']['ID'];
}
if($arResult['PROPERTIES']['MORE_PHOTO']['VALUE']) {
    $arResult['PICTURES'] = array_merge($arResult['PICTURES'], $arResult['PROPERTIES']['MORE_PHOTO']['VALUE']);
}

$arResult['BRAND'] = Brand::getByXmlId($arResult['PROPERTIES']['BRAND']['VALUE']);