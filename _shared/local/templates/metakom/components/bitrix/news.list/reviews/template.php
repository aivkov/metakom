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

use Ms\Tools;

?>

    <div class="reviews">
        <div class="reviews__list">
            <?php if ($arResult['ITEMS']): ?>
                <?php foreach ($arResult['ITEMS'] as $arItem): ?>
                    <?php
                    if ($arItem['PREVIEW_PICTURE']) {
                        $arSmallFile = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], ['width' => 150, 'height' => 150], BX_RESIZE_IMAGE_EXACT);
                    } else {
                        $arSmallFile['src'] = Tools::getNoPhoto();
                    }
                    ?>

                    <div class="reviews__item review">
                        <div class="review__img">
                            <img src="<?= $arSmallFile['src'] ?>" alt="<?= $arItem['NAME'] ?>">
                        </div>

                        <div class="review__main">
                            <div class="review__title"><?= $arItem['NAME'] ?></div>
                            <div class="review__text">
                                <?= $arItem['PREVIEW_TEXT'] ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php else: ?>
                <p>Отзывов пока нет. Но вы можете стать первым</p>
            <?php endif ?>
        </div>

        <button class="reviews__add-btn btn" data-modal-open="review">Добавить отзыв</button>
    </div>

<?php $APPLICATION->IncludeFile('/includes/modal/review.php', $arParams) ?>