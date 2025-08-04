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

use Ms\Tools;

?>

<?php if($arResult['ITEMS']):?>
    <div class="section services">
        <div class="container services__container">
            <?php foreach($arResult['ITEMS'] as $arItem):?>
                <div class="services__item service">
                    <div class="service__top">
                        <div class="service__head">
                            <div class="service__head-img">
                                <?php if($arItem['PREVIEW_PICTURE']):?>
                                    <?php $arSmallFile = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], ['width' => 50, 'height' => 50], BX_RESIZE_IMAGE_EXACT);?>
                                    <img src="<?=$arSmallFile['src']?>" alt="<?=$arItem['NAME']?>">
                                <?php endif?>
                            </div>
                            <div class="service__title"><?=$arItem['NAME']?></div>
                        </div>
                        <div class="service__desc"><?=$arItem['PREVIEW_TEXT']?></div>
                    </div>
                    <div class="service__bottom">
                        <?php if($arItem['PROPERTIES']['BUTTON']['VALUE']):?>
                            <?php $href = $arItem['PROPERTIES']['BUTTON']['DESCRIPTION'];?>
                            <a href="<?=Tools::getHref($href)?>" class="btn btn--fullwidth" <?=Tools::getLinkAttr($href)?>>
                                <span><?=$arItem['PROPERTIES']['BUTTON']['VALUE']?></span>
                            </a>
                        <?php endif?>
                    </div>
                </div>
            <?php endforeach?>
        </div>
    </div>
<?php endif?>