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

<div class="banner">
    <div class="banner__info">
        <h1 class="banner__title"><?=$arResult['NAME']?></h1>
        <?php if($arResult['PREVIEW_TEXT']):?>
            <div class="banner__desc"><?=$arResult['PREVIEW_TEXT']?></div>
        <?php endif?>
        <?php if($arResult['PROPERTIES']['BUTTON']['VALUE']):?>
            <?php $link = $arResult['PROPERTIES']['BUTTON']['DESCRIPTION'];
                $dataAttr = '';
                if(str_starts_with('##', $link)) {
                    $dataAttr = 'data-modal-ajax-open="' . substr($link, 2) . '"';
                    $link = '#';
                }
            ?>
            <a href="<?=$link?>" class="btn btn--200"><?=$arResult['PROPERTIES']['BUTTON']['VALUE']?></a>
        <?php endif?>
    </div>
    <?php if($arResult['PREVIEW_PICTURE']):?>
        <div class="banner__right">
            <div class="banner__img">
                <?php $arSmallFile = CFile::REsizeImageGet($arResult['PREVIEW_PICTURE'], ['width' => 618, 'height' => 535], BX_RESIZE_IMAGE_EXACT);?>
                <img src="<?=$arSmallFile['src']?>" alt="<?=$arResult['NAME']?>">
            </div>
        </div>

    <?php endif?>
</div>