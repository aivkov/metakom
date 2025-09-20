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
    <div class="advance">
        <?php if($arResult['PARENT_SECTION']['PICTURE']):?>
            <div class="advance__img">
                <img src="<?=CFile::GetPath($arResult['PARENT_SECTION']['PICTURE'])?>" alt="">
            </div>
        <?php endif?>
        <div class="advance__list">
            <?php foreach($arResult['ITEMS'] as $arItem):?>
                <div class="advance__item">
                    <div class="advance__item-img">
                        <?php if($pictureId = $arItem['PROPERTIES']['PICTURE']['VALUE']):?>
                            <img src="<?=CFile::GetPath($pictureId)?>" alt="<?=$arItem['NAME']?>">
                        <?php elseif($arItem['PREVIEW_PICTURE']):?>
                            <?php $arSmallFile = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], ['width' => 70, 'height' => 70], BX_RESIZE_IMAGE_EXACT);?>
                            <img src="<?=$arSmallFile['src']?>" alt="<?=$arItem['NAME']?>">
                        <?php endif?>
                    </div>
                    <div>
                        <div class="advance__item-title"><?=$arItem['NAME']?></div>
                        <div class="advance__item-desc"><?=$arItem['PREVIEW_TEXT']?></div>
                    </div>
                </div>
            <?php endforeach?>
        </div>
    </div>
<?php endif?>

