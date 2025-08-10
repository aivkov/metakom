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
    <div class="steps">
        <?php foreach($arResult['ITEMS'] as $key => $arItem):?>
            <div class="steps__item">
                <div class="steps__number"><?=($key + 1)?></div>
                <div class="steps__info">
                    <div class="steps__item-title title"><?=$arItem['NAME']?></div>
                    <div class="steps__item-text"><?=$arItem['PREVIEW_TEXT']?></div>
                </div>
            </div>
        <?php endforeach?>
    </div>
<?php endif?>

