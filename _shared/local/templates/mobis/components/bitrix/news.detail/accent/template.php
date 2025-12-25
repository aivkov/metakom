<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
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

<div class="section section--bg section--accent">
    <?php if ($arResult['DETAIL_PICTURE']): ?>
        <div class="accent-block__img">
            <?php $arSmallFile = CFile::ResizeImageGet($arResult['DETAIL_PICTURE'], ['width' => 520, 'height' => 520], BX_RESIZE_IMAGE_PROPORTIONAL_ALT); ?>
            <img src="<?= $arSmallFile['src'] ?>" alt="<?= $arResult['NAME'] ?>">
        </div>
    <?php endif ?>
    <div class="container">
        <div class="accent-block">
            <div class="accent-block__wrap">
                <div class="accent-block__title title"><?= $arResult['NAME'] ?></div>
                <div class="accent-block__desc"><?= $arResult['DETAIL_TEXT'] ?></div>
                <?php if ($arResult['PROPERTIES']['LIST']['VALUE']): ?>
                    <div class="accent-block__list">
                        <?php foreach ($arResult['PROPERTIES']['LIST']['VALUE'] as $listItem): ?>
                            <div class="btn btn--white btn--transparent"><?= $listItem ?></div>
                        <?php endforeach ?>
                    </div>

                <?php endif ?>

            </div>
        </div>

    </div>
</div>