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
    <div class="clients">
        <div class="clients__list">
            <?php foreach($arResult['ITEMS'] as $key => $arItem):?>
                <div class="clients__item">
                    <div class="clients__item-img">
                        <img src="<?=CFile::GetPath($arItem['PROPERTIES']['PICTURE']['VALUE'])?>" alt="">
                    </div>
                    <div class="clients__item-text"><?=$arItem['NAME']?></div>
                </div>
            <?php endforeach?>
        </div>
    </div>
<?php endif?>

