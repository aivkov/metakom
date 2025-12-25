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

<?php if ($arResult['DETAIL_TEXT']): ?>
    <div class="advantages-main">
        <div class="advantages-main__img">
            <?php $arSmallFile = CFile::ResizeImageGet($arResult['DETAIL_PICTURE'], ['width' => 280, 'height' => 320], BX_RESIZE_IMAGE_EXACT); ?>
            <img src="<?= $arSmallFile['src'] ?>" alt="" class="radius">
        </div>
        <div class="advantages-main__text">
            <?=$arResult['DETAIL_TEXT']?>
        </div>
    </div>
<?php endif ?>