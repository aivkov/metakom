<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetTitle("Установка и облуживание умных домофонов от Метаком Сервис в Муроме");
$APPLICATION->SetAdditionalCss(CUtil::GetAdditionalFileURL('/local/css/banner.css'));
?>

    <div class="container">
        <div class="section section--no-pt">
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-detail.php', ['CODE' => 'ud-banner', 'TEMPLATE' => 'banner']) ?>
        </div>
        <div class="section section--no-pt">
            <?php $APPLICATION->IncludeFile('/includes/metakom/nres-detail.php', ['CODE' => 'ud-banner2', 'TEMPLATE' => 'banner2']) ?>
        </div>
    </div>
    <div class="section section--dark-accent">
        <?php $APPLICATION->IncludeFile('/includes/metakom/news-detail.php', ['CODE' => 'ud-description', 'TEMPLATE' => 'description']) ?>
    </div>

    <div class="section section">
        <div class="container">
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-list.php', ['SECTION_CODE' => 'ud-bonus', 'TEMPLATE' => 'bonus']) ?>
        </div>
    </div>

    <div class="section section--grey">
        <div class="container">
            <h2 class="section__title section__title--big"><?= $APPLICATION->ShowViewContent('section-title-ud-steps') ?></h2>
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-list.php', ['SECTION_CODE' => 'ud-steps', 'TEMPLATE' => 'steps']) ?>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-list.php', ['SECTION_CODE' => 'ud-advance', 'TEMPLATE' => 'advance']) ?>
        </div>
    </div>

    <div class="section section--grey">
        <div class="container">
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-detail.php', ['CODE' => 'ud-feedback', 'TEMPLATE' => 'feedback']) ?>
        </div>
    </div>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>