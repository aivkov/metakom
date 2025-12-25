<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
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
    <div class="banner__text">
        <div>
            <div class="banner__title title extrafont"><?=$arResult['NAME']?></div>
            <div class="banner__description"><?=$arResult['DETAIL_TEXT']?></div>
        </div>
        <a class="banner__action extrafont" data-modal-ajax-open="call">Установить</a>
    </div>

    <div class="banner__img">
        <?php $arSmallFile = CFile::ResizeImageGet($arResult['DETAIL_PICTURE'], ['width' => 400, 'height' => 400], BX_RESIZE_IMAGE_EXACT); ?>
        <img src="<?=$arSmallFile['src']?>" alt="<?=$arResult['NAME']?>">
    </div>
</div>