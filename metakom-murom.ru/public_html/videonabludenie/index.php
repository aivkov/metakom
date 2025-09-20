<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetTitle("Установка и облуживание Ip видеокамер от Метаком Сервис в Муроме");
$APPLICATION->SetAdditionalCss(CUtil::GetAdditionalFileURL('/local/css/banner.css'));
?>

    <div class="section section--no-pt">
        <div class="container">
            <?php $APPLICATION->IncludeFile('/includes/metakom/banner.php', ['CODE' => 'video-banner']) ?>
        </div>
    </div>

    <div class="section section--grey">
        <?php $APPLICATION->IncludeFile('/includes/metakom/banner2.php', ['CODE' => 'video-banner2']) ?>
    </div>

    <div class="section section">
        <div class="container">
            <?php $APPLICATION->IncludeFile('/includes/metakom/bonus.php', ['SECTION_CODE' => 'video-bonus']) ?>
        </div>
    </div>

    <div class="section section--grey">
        <div class="container">
            <h2 class="section__title section__title--big"><?= $APPLICATION->ShowViewContent('section-title-video-steps') ?></h2>
            <?php $APPLICATION->IncludeFile('/includes/metakom/steps.php', ['SECTION_CODE' => 'video-steps']) ?>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <?php $APPLICATION->IncludeFile('/includes/metakom/advance.php', ['SECTION_CODE' => 'video-advance']) ?>
        </div>
    </div>

    <div class="section section--grey">
        <div class="container">
            <?php $APPLICATION->IncludeFile('/includes/metakom/feedback.php', ['CODE' => 'video-feedback']) ?>
        </div>
    </div>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>