<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

$price = $arResult['PROPERTIES']['PRICE']['VALUE'];
?>

<div class="catalog-detail">
    <h1 class="catalog-detail__title catalog-detail__title--mobile"><?=$arResult['NAME']?></h1>
    <div class="catalog-detail__top">
        <div class="catalog-detail__slider">
            <?php if ($arResult['PICTURES']): ?>

                <div class="catalog-detail__thumbs swiper">
                    <div class="catalog-detail__thumbs-nav catalog-detail__thumbs-nav--prev">
                        <svg width="100%" height="100%" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M12 20.5C12.5523 20.5 13 20.0523 13 19.5L13 6.41421L17.2929 10.7071C17.6834 11.0976 18.3166 11.0976 18.7071 10.7071C19.0976 10.3166 19.0976 9.68342 18.7071 9.29289L12.7071 3.29289C12.5196 3.10536 12.2652 3 12 3C11.7348 3 11.4804 3.10536 11.2929 3.29289L5.29289 9.29289C4.90237 9.68342 4.90237 10.3166 5.29289 10.7071C5.68342 11.0976 6.31658 11.0976 6.70711 10.7071L11 6.41421L11 19.5C11 20.0523 11.4477 20.5 12 20.5Z"
                                  fill="currentColor"></path>
                        </svg>
                    </div>
                    <div class="catalog-detail__thumbs-wrapper swiper-wrapper">
                        <?php foreach ($arResult['PICTURES'] as $pictureId): ?>
                            <div class="catalog-detail__thumb swiper-slide">
                                <?php $smallPicture = CFile::ResizeImageGet($pictureId, ['width' => 120, 'height' => 120], BX_RESIZE_IMAGE_PROPORTIONAL) ?>
                                <img src="<?= $smallPicture['src'] ?>" alt="<?= $arResult['NAME'] ?>">
                            </div>
                        <?php endforeach ?>
                    </div>
                    <div class="catalog-detail__thumbs-nav catalog-detail__thumbs-nav--next">
                        <svg width="100%" height="100%" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M12 20.5C12.5523 20.5 13 20.0523 13 19.5L13 6.41421L17.2929 10.7071C17.6834 11.0976 18.3166 11.0976 18.7071 10.7071C19.0976 10.3166 19.0976 9.68342 18.7071 9.29289L12.7071 3.29289C12.5196 3.10536 12.2652 3 12 3C11.7348 3 11.4804 3.10536 11.2929 3.29289L5.29289 9.29289C4.90237 9.68342 4.90237 10.3166 5.29289 10.7071C5.68342 11.0976 6.31658 11.0976 6.70711 10.7071L11 6.41421L11 19.5C11 20.0523 11.4477 20.5 12 20.5Z"
                                  fill="currentColor"></path>
                        </svg>
                    </div>
                </div>

                <div class="catalog-detail__swiper swiper">
                    <div class="catalog-detail__swiper-wrapper swiper-wrapper">
                        <?php foreach ($arResult['PICTURES'] as $pictureId): ?>
                            <div class="catalog-detail__slide swiper-slide">
                                <?php $smallPicture = CFile::ResizeImageGet($pictureId, ['width' => 480, 'height' => 480], BX_RESIZE_IMAGE_PROPORTIONAL) ?>
                                <img src="<?= $smallPicture['src'] ?>" alt="<?= $arResult['NAME'] ?>">
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>


            <?php endif ?>

        </div>

        <div class="catalog-detail__right">
            <div class="catalog-detail__title catalog-detail__title--desktop"><?=$arResult['NAME']?></div>
            <?php if($arResult['PROPERTIES']['FEATURES']['VALUE']):?>
                <div class="catalog-detail__list">
                    <?php foreach($arResult['PROPERTIES']['FEATURES']['VALUE'] as $key => $value):?>
                        <div class="catalog-detail__list-row catalog-detail__features">
                            <span><?=$arResult['PROPERTIES']['FEATURES']['DESCRIPTION'][$key]?></span>
                            <span class="catalog-detail__dotted"></span>
                            <span><?=$value?></span>
                        </div>
                    <?php endforeach?>
                </div>
            <?php endif?>

            <?php if($arResult['BRAND']):?>
                <?php if($arResult['BRAND']['UF_FILE']):?>
                    <?php $smallPicture = CFile::ResizeImageGet($arResult['BRAND']['UF_FILE'], ['width' => 132, 'height' => 26], BX_RESIZE_IMAGE_PROPORTIONAL )?>
                    <div class="catalog-detail__brand">
                        <img src="<?=$smallPicture['src']?>" alt="<?=$arResult['BRAND']['UF_XML_ID']?>">
                    </div>
                <?php endif?>
            <?php endif?>
            <div class="catalog-detail__bottom">

                <div class="catalog-detail__price">
                    <?php if($price):?>
                        <div class="catalog-detail__price-name">Цена:</div>
                    <?php endif?>
                    <div class="catalog-detail__price-price <?php if(!$price):?> catalog-detail__price--no-price<?php endif?>"><?=Tools::formatPrice($price)?> </div>
                </div>

                <button class="btn btn--200" data-modal-ajax-open="product" data-name="<?=$arResult['NAME']?>" data-price="<?=$price?>"
                        data-picture="<?=$arResult['DETAIL_PICTURE']['ID']?>">Заказать</button>
            </div>

        </div>
    </div>
    <?php if($arResult['DETAIL_TEXT']):?>
        <div class="catalog-detail__block">
            <h2 class="catalog-detail__subtitle">О товаре</h2>
            <?=$arResult['DETAIL_TEXT']?>
        </div>
    <?php endif?>
    <?php if($arResult['PROPERTIES']['CHARACTERISTICS']['VALUE']):?>
        <div class="catalog-detail__block">
            <h2 class="catalog-detail__subtitle">Технические характеристики</h2>
            <div class="catalog-detail__list">
                <?php foreach($arResult['PROPERTIES']['CHARACTERISTICS']['VALUE'] as $key => $value):?>
                    <div class="catalog-detail__list-row">
                        <span><?=$arResult['PROPERTIES']['CHARACTERISTICS']['DESCRIPTION'][$key]?></span>
                        <span class="catalog-detail__dotted"></span>
                        <span><?=$value?></span>
                    </div>
                <?php endforeach?>
            </div>
        </div>
    <?php endif?>

    <?php if($arResult['PROPERTIES']['DOCUMENTS']['VALUE']):?>
        <div class="catalog-detail__block">
            <h2 class="catalog-detail__subtitle">Документы</h2>
            <div class="catalog-detail__documents">
                <?php foreach($arResult['PROPERTIES']['DOCUMENTS']['VALUE'] as $key => $fileId):?>
                    <?php $arFile = CFile::getFileArray($fileId);?>
                    <div class="catalog-detail__document">
                        <a href="<?=$arFile['SRC']?>" class="catalog-detail__document-name"><?=$arFile['DESCRIPTION']?></a>
                        <span class="catalog-detail__document-size"><?=Tools::formatFileSize($arFile['FILE_SIZE'])?></span>
                        <a href="<?=$arFile['SRC']?>" download>
                            <img src="/local/img/icons/download.svg" alt="Скачать">
                        </a>
                    </div>
                <?php endforeach?>
            </div>
        </div>
    <?php endif?>
</div>