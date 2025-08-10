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
    <div class="benefit">
        <?php if($arResult['PICTURE']):?>
            <div class="benefit__img">
                <img src="<?=CFile::GetPath($arResult['PICTURE'])?>" alt="">
            </div>
        <?php endif?>
        <div class="benefit__list">
            <?php foreach($arResult['ITEMS'] as $arItem):?>
                <?php $imageId = $arItem['PREVIEW_PICTURE']['ID'] ?: $arItem['PROPERTIES']['SVG_IMAGE']['VALUE'];?>
                <div class="benefit__item">
                    <?php if($imageId):?>
                        <div class="benefit__item-img">
                            <img src="<?=CFile::getPath($imageId)?>" alt="<?=$arItem['NAME']?>">
                        </div>
                    <?php endif?>
                    <div>
                        <div class="benefit__title subtitle"><?=$arItem['NAME']?></div>
                        <div class="benefit__desc"><?=$arItem['PREVIEW_TEXT']?></div>
                    </div>
                </div>
            <?php endforeach?>
        </div>
    </div>
<?php endif?>

