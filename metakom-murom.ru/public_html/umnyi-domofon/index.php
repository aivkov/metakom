<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetTitle("Установка и облуживание умных домофонов от Метаком Сервис в Муроме");
$APPLICATION->SetAdditionalCss(CUtil::GetAdditionalFileURL('/local/css/banner.css'));
?>

    <div class="container">
        <div class="section section--no-pt">
            <?php $APPLICATION->IncludeFile('/includes/metakom/banner.php', ['CODE' => 'ud-banner']) ?>
        </div>
        <div class="section section--no-pt">
            <?php $APPLICATION->IncludeFile('/includes/metakom/banner2.php', ['CODE' => 'ud-banner2']) ?>
        </div>
    </div>
    <div class="section section--dark-accent">
        <?php $APPLICATION->IncludeFile('/includes/metakom/description.php', ['CODE' => 'ud-description']) ?>
    </div>

    <div class="section section">
        <div class="container">
            <?php $APPLICATION->IncludeFile('/includes/metakom/bonus.php', ['SECTION_CODE' => 'ud-bonus']) ?>
        </div>
    </div>

    <div class="section section--grey">
        <div class="container">
            <h2 class="section__title section__title--big"><?= $APPLICATION->ShowViewContent('section-title-ud-steps') ?></h2>
            <?php $APPLICATION->IncludeFile('/includes/metakom/steps.php', ['SECTION_CODE' => 'ud-steps']) ?>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <?php $APPLICATION->IncludeFile('/includes/metakom/advance.php', ['SECTION_CODE' => 'ud-advance']) ?>
        </div>
    </div>

    <div class="section section--grey">
        <div class="container">
            <?php $APPLICATION->IncludeFile('/includes/metakom/feedback.php', ['CODE' => 'ud-feedback']) ?>
        </div>
    </div>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>