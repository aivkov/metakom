<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetTitle("Установка и облуживание видеонаблюдения от Метаком Сервис в Брянске");
?>

    <div class="section section--banner">
        <div class="container">
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-detail.php', ['CODE' => 'banner-video', 'TEMPLATE' => 'banner']) ?>
        </div>
    </div>
    <div class="section section--services section--bg">
        <div class="container">
            <?php $APPLICATION->IncludeFile('/includes/mobis/menu/services.php') ?>
        </div>
    </div>
    <div class="section section--description">
        <div class="container container--narrow">
            <h2 class="section__title section__title--small"><?=$APPLICATION->ShowViewContent('section-title-description-video')?></h2>
            <?php $APPLICATION->IncludeFile('/includes/mobis/news-list.php', ['SECTION_CODE' => 'description-video', 'TEMPLATE' => 'swap']) ?>
        </div>
    </div>

<?php $APPLICATION->IncludeFile('/includes/metakom/news-detail.php', ['CODE' => 'accent-video', 'TEMPLATE' => 'accent']) ?>

    <div class="section section--steps">
        <div class="container">
            <h2 class="section__title section__title--small"><?=$APPLICATION->ShowViewContent('section-title-steps-video')?></h2>
            <?php $APPLICATION->IncludeFile('/includes/mobis/news-list.php', ['SECTION_CODE' => 'steps-video', 'TEMPLATE' => 'steps']) ?>
        </div>
    </div>

    <div class="section section--advantages">
        <div class="container">
            <h2 class="section__title section__title--small"><?=$APPLICATION->ShowViewContent('section-title-advantages-video')?></h2>
            <?php $APPLICATION->IncludeFile('/includes/mobis/news-list.php', ['SECTION_CODE' => 'advantages-video', 'TEMPLATE' => 'advantages']) ?>
        </div>
    </div>

    <div class="section section--contacts section--bg">
        <?php $APPLICATION->IncludeFile('/includes/mobis/contacts-block.php') ?>
    </div>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>