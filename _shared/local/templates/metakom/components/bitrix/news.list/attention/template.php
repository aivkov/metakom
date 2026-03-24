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
    <div class="attention">
        <?php if($arResult['PARENT_SECTION']['DESCRIPTION']):?>
            <div class="attention__description"><?=$arResult['PARENT_SECTION']['DESCRIPTION']?></div>
        <?php endif?>
        <div class="attention__list">
            <?php foreach($arResult['ITEMS'] as $arItem):?>
                <div class="attention__item">
                    <div class="attention__item-img">
                        <?php if($pictureId = $arItem['PROPERTIES']['PICTURE']['VALUE']):?>
                            <img src="<?=CFile::GetPath($pictureId)?>" alt="<?=$arItem['NAME']?>">
                        <?php endif?>
                    </div>
                    <div>
                        <div class="attention__item-text"><?=$arItem['NAME']?></div>
                    </div>
                </div>
            <?php endforeach?>
        </div>
    </div>
<?php endif?>

