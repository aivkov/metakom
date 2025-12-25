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
    <div class="about-main">
        <div class="about-main__list">
            <?php foreach($arResult['ITEMS'] as $key => $arItem):?>
                <div class="about-main__item">
                    <div class="about-main__text">
                        <div class="about-main__title title"><?=$arItem['NAME']?></div>
                        <?php $propLink = $arItem['PROPERTIES']['LINK'];?>
                        <?php if($propLink['VALUE']):?>
                            <a href="<?=$propLink['VALUE']?>" class="link--accent"><?=$propLink['DESCRIPTION'] ?: $propLink['VALUE']?></a>
                        <?php endif?>
                    </div>
                    <div class="about-main__img">
                        <?php $arSmallFile = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], ['width' => 600, 'height' => 600], BX_RESIZE_IMAGE_EXACT);?>
                        <img src="<?=$arSmallFile['src']?>" alt="<?=$arItem['NAME']?>">
                        <?php if(!$key):?>
                            <div class="about-main__social">
                                <?php $APPLICATION->IncludeFile('/includes/mobis/social.php')?>
                            </div>
                        <?php endif?>
                    </div>
                </div>

            <?php endforeach?>
        </div>
    </div>
<?php endif?>

