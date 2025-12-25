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
        <div class="steps__list">
            <?php foreach($arResult['ITEMS'] as $key => $arItem):?>
                <div class="steps__item">
                    <div class="steps__img">
                        <?php $arSmallFile = CFile::ResizeImageGet($arItem['PROPERTIES']['PICTURE']['VALUE'], ['width' => 160, 'height' => 160], BX_RESIZE_IMAGE_PROPORTIONAL_ALT);?>
                        <img src="<?=$arSmallFile['src']?>" alt="<?=$arItem['NAME']?>">
                    </div>
                    <div class="steps__info">
                        <div class="steps__title title"><?=$arItem['NAME']?></div>
                        <div class="steps__text"><?=$arItem['PREVIEW_TEXT']?></div>
                    </div>
                    <div class="steps__number extrafont">
                        <?php if($key < 9):?>0<?php endif?><?=$key + 1?>
                    </div>
                </div>
            <?php endforeach?>
        </div>
    </div>
<?php endif?>


