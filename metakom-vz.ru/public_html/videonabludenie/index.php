<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetTitle("Установка и облуживание Ip видеокамер от Метаком Сервис в Вязниках");
$APPLICATION->SetAdditionalCss(CUtil::GetAdditionalFileURL('/local/css/banner.css'));
?>

    <div class="section section--no-pt">
        <div class="container">
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-detail.php', ['CODE' => 'video-banner', 'TEMPLATE' => 'banner']) ?>
        </div>
    </div>

    <div class="section section--grey">
        <?php $APPLICATION->IncludeFile('/includes/metakom/news-detail.php', ['CODE' => 'video-banner2', 'TEMPLATE' => 'banner2']) ?>
    </div>

    <div class="section section">
        <div class="container">
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-list.php', ['SECTION_CODE' => 'video-bonus', 'TEMPLATE' => 'bonus']) ?>
        </div>
    </div>

    <div class="section section--grey">
        <div class="container">
            <h2 class="section__title section__title--big"><?= $APPLICATION->ShowViewContent('section-title-video-steps') ?></h2>
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-list.php', ['SECTION_CODE' => 'video-steps', 'TEMPLATE' => 'steps']) ?>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-list.php', ['SECTION_CODE' => 'video-advance', 'TEMPLATE' => 'advance']) ?>
        </div>
    </div>

    <div class="section section--grey">
        <div class="container">
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-detail.php', ['CODE' => 'video-feedback', 'TEMPLATE' => 'feedback']) ?>
        </div>
    </div>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>