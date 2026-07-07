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

?>

<div class="bonus__content">
    <div class="bonus__img">
        <img src="<?=CFile::getPath($arResult['PARENT_SECTION']['PICTURE'])?>" alt="">
    </div>
    <div class="bonus__info">
        <div class="bonus__info-title"><?=$arResult['PARENT_SECTION']['DESCRIPTION']?></div>
        <?php if($arResult['ITEMS']):?>
            <div class="bonus__list">
                <?php foreach($arResult['ITEMS'] as $arItem):?>
                    <div class="bonus__item">
                        <?php if($arItem['PROPERTIES']['PICTURE']['VALUE']):?>
                            <div class="bonus__item-img">
                                <img src="<?=CFile::GetPath($arItem['PROPERTIES']['PICTURE']['VALUE'])?>" alt="">
                            </div>
                        <?php endif?>
                        <div class="bonus__item-text">
                            <div class="bonus__item-title"><?=$arItem['NAME']?></div>
                            <?php if($arItem['PREVIEW_TEXT']):?>
                                <div class="bonus__item-description"><?=$arItem['PREVIEW_TEXT']?></div>
                            <?php endif?>
                        </div>
                    </div>
                <?php endforeach?>
            </div>
        <?php endif?>
    </div>
</div>

