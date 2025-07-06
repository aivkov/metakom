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

<?php if($arResult['ITEMS']):?>
    <div class="advantages">
        <div class="advantages__list">
            <?php foreach($arResult['ITEMS'] as $arItem):?>
                <div class="advantages__item">
                    <div class="advantages__img">
                        <?php $arSmallFile = CFile::REsizeImageGet($arItem['PREVIEW_PICTURE'], ['width' => 50, 'height' => 50], BX_RESIZE_IMAGE_EXACT);?>
                        <img src="<?=$arSmallFile['src']?>" alt="<?=$arItem['NAME']?>">
                    </div>
                    <div class="advantages__title"><?=$arItem['NAME']?></div>
                    <div class="advantages__desc"><?=$arItem['PREVIEW_TEXT']?></div>
                </div>
            <?php endforeach?>
        </div>
    </div>
<?php endif?>

