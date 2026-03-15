<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

use Ms\Tools;
?>

<div class="catalog-list section section--no-pt">
    <div class="catalog-list__list">
        <?php foreach($arResult['ITEMS'] as $arItem):?>
            <?php $price = $arItem['PROPERTIES']['PRICE']['VALUE']?>
            <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="catalog-item">
                <span>
                      <span class="catalog-item__img img-block">
                        <?php $smallPicture = CFile::ResizeImageGet($arItem['DETAIL_PICTURE'], ['width' => 300, 'height' => 200], BX_RESIZE_IMAGE_PROPORTIONAL )?>
                        <img src="<?=$smallPicture['src']?>" alt="<?=$arItem['NAME']?>">
                    </span>
                    <span class="catalog-item__title"><?=$arItem['NAME']?></span>
                    <?php if($arItem['PROPERTIES']['BRAND']['VALUE']):?>
                        <span class="catalog-item__brand"><?=$arItem['PROPERTIES']['BRAND']['VALUE']?></span>
                    <?php endif?>
                </span>
                    <span>
                     <span class="catalog-item__price <?php if(!$price):?> catalog-item__price--no-price<?php endif?>"><?=Tools::formatPrice($price)?> </span>
                     <span class="btn" data-modal-ajax-open="product" data-name="<?=$arItem['NAME']?>" data-price="<?=$price?>"
                           data-picture="<?=$arItem['DETAIL_PICTURE']['ID']?>">Заказать</span>
                </span>
            </a>
        <?php endforeach?>
    </div>
    <?php if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <?php $APPLICATION->IncludeFile('/includes/pagination/simple.php', $arResult)?>
    <?php endif;?>
</div>




