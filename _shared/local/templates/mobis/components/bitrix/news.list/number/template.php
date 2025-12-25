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
    <div class="services-main">
        <div class="services-main__list">
            <?php foreach($arResult['ITEMS'] as $key => $arItem):?>

                <div class="services-main__item">
                    <div class="services-main__number extrafont">
                        <?php if($key < 9):?>0<?php endif?><?=$key + 1?>
                    </div>
                    <div class="services-main__img">
                        <?php $arSmallFile = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], ['width' => 280, 'height' => 320], BX_RESIZE_IMAGE_EXACT);?>
                        <img src="<?=$arSmallFile['src']?>" alt="<?=$arItem['NAME']?>">
                    </div>
                    <div class="services-main__info">
                        <div class="services-main__title title"><?=$arItem['NAME']?></div>
                        <div class="services-main__text"><?=$arItem['PREVIEW_TEXT']?></div>
                        <?php if($arItem['PROPERTIES']['LIST']['VALUE']):?>
                            <div class="services-main__features">
                                <?php foreach($arItem['PROPERTIES']['LIST']['VALUE'] as $str):?>
                                    <div class="services-main__feature-item btn btn--transparent">
                                        <?=$str?>
                                    </div>
                                <?php endforeach?>
                            </div>
                        <?php endif?>

                        <?php if($arItem['PROPERTIES']['LINK']['VALUE']):?>
                            <div class="services-main__action">
                                <a href="<?=$arItem['PROPERTIES']['LINK']['VALUE']?>" class="link--accent">
                                    <?=$arItem['PROPERTIES']['LINK']['DESCRIPTION'] ?: 'Подробнее'?>
                                </a>
                            </div>
                        <?php endif?>
                    </div>
                </div>
            <?php endforeach?>
        </div>
    </div>
<?php endif?>

