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

use Ms\Tools;

?>

<div class="banner container">
    <?php if($arResult['PREVIEW_PICTURE']):?>
        <div class="banner__picture">
            <div class="banner__img banner__img--small">
                <?php $arSmallFile = CFile::ResizeImageGet($arResult['PREVIEW_PICTURE'], ['width' => 400, 'height' => 400], BX_RESIZE_IMAGE_PROPORTIONAL);?>
                <img src="<?=$arSmallFile['src']?>" alt="<?=$arResult['NAME']?>">
            </div>
        </div>
    <?php endif?>
    <div class="banner__info">
        <h2 class="banner__title"><?=$arResult['NAME']?></h2>
        <?php if($arResult['PREVIEW_TEXT']):?>
            <div class="banner__desc banner__desc--accent"><?=$arResult['PREVIEW_TEXT']?></div>
        <?php endif?>
        <?php if($arResult['PROPERTIES']['BUTTON']['VALUE']):?>
            <?php $link = $arResult['PROPERTIES']['BUTTON']['DESCRIPTION']; ?>
            <a href="<?=Tools::getHref($link)?>" class="btn btn--200" <?=Tools::getLinkAttr($link)?>>
                <span><?=$arResult['PROPERTIES']['BUTTON']['VALUE']?></span>
            </a>
        <?php endif?>
    </div>

</div>