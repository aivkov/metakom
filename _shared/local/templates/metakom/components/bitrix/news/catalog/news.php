<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
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
$this->setFrameMode(true);

$arResult = [];
$arResult['SECTIONS'] = [];

$arFilter = [
    'IBLOCK_ID' => $arParams['IBLOCK_ID'],
    'ACTIVE' => 'Y',
    'DEPTH_LEVEL' => 1
];
$arOrder = [
    'SORT' => 'ASC'
];

$res = CIBlockSection::GetList($arOrder, $arFilter);
while ($section = $res->GetNext()) {
    $arResult['SECTIONS'][] = $section;
}
?>
<h1 class="page__title"><?$APPLICATION->ShowTitle(false)?></h1>
<div class="catalog-section section section--no-pt">
    <div class="catalog-section__list">
        <?php foreach ($arResult['SECTIONS'] as $arSection): ?>
            <a href="<?=$arSection['SECTION_PAGE_URL']?>" class="catalog-section__item">
                <span class="catalog-section__item-img img-block">
                    <img src="<?=CFile::GetPath($arSection['PICTURE'])?>" alt="<?=$arSection['NAME']?>">
                </span>
                <span class="catalog-section__item-title"><?=$arSection['NAME']?></span>
            </a>
        <?php endforeach ?>
    </div>
</div>