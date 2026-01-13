<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
LocalRedirect('/');
$APPLICATION->SetTitle("Установка и облуживание пожарной сигнализации от Метаком Сервис в Брянске");
?>

    <div class="section section--banner">
        <div class="container">
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-detail.php', ['CODE' => 'banner-fire', 'TEMPLATE' => 'banner']) ?>
        </div>
    </div>
    <div class="section section--services section--bg">
        <div class="container">
            <?php $APPLICATION->IncludeFile('/includes/mobis/menu/services.php') ?>
        </div>
    </div>
    <div class="section section--description">
        <div class="container container--narrow">
            <h2 class="section__title section__title--small"><?=$APPLICATION->ShowViewContent('section-title-description-fire')?></h2>
            <?php $APPLICATION->IncludeFile('/includes/mobis/news-list.php', ['SECTION_CODE' => 'description-fire', 'TEMPLATE' => 'swap']) ?>
        </div>
    </div>

<?php $APPLICATION->IncludeFile('/includes/metakom/news-detail.php', ['CODE' => 'accent-fire', 'TEMPLATE' => 'accent']) ?>

    <div class="section section--steps">
        <div class="container">
            <h2 class="section__title section__title--small"><?=$APPLICATION->ShowViewContent('section-title-steps-fire')?></h2>
            <?php $APPLICATION->IncludeFile('/includes/mobis/news-list.php', ['SECTION_CODE' => 'steps-fire', 'TEMPLATE' => 'steps']) ?>
        </div>
    </div>

    <div class="section section--advantages">
        <div class="container">
            <h2 class="section__title section__title--small"><?=$APPLICATION->ShowViewContent('section-title-advantages-fire')?></h2>
            <?php $APPLICATION->IncludeFile('/includes/mobis/news-list.php', ['SECTION_CODE' => 'advantages-fire', 'TEMPLATE' => 'advantages']) ?>
        </div>
    </div>

    <div class="section section--contacts section--bg">
        <?php $APPLICATION->IncludeFile('/includes/mobis/contacts-block.php') ?>
    </div>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>