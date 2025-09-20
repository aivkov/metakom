<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetTitle("Установка и облуживание аналоговых домофонов от Метаком Сервис в Муроме");
$APPLICATION->SetAdditionalCss(CUtil::GetAdditionalFileURL('/local/css/banner.css'));
?>

    <div class="container">
        <div class="section section--no-pt">
            <?php $APPLICATION->IncludeFile('/includes/metakom/banner.php', ['CODE' => 'domofon-banner']) ?>
        </div>
    </div>
    <div class="section section--grey">
        <div class="container">
            <?php $APPLICATION->IncludeFile('/includes/metakom/banner2.php', ['CODE' => 'domofon-banner2']) ?>
        </div>
    </div>
    <div class="container">
        <div class="section">
            <h2 class="section__title"><?=$APPLICATION->ShowViewContent('section-title-domofon-benefit')?></h2>
            <?php $APPLICATION->IncludeFile('/includes/metakom/benefit.php', ['SECTION_CODE' => 'domofon-benefit']) ?>
        </div>
    </div>
    <div class="section section--grey">
        <div class="container">
            <h2 class="section__title section__title--big"><?=$APPLICATION->ShowViewContent('section-title-domofon-steps')?></h2>
            <?php $APPLICATION->IncludeFile('/includes/metakom/steps.php', ['SECTION_CODE' => 'domofon-steps']) ?>
        </div>
    </div>
    <div class="container">
        <div class="section section--extra">
            <h2 class="section__title"><?=$APPLICATION->ShowViewContent('section-title-domofon-advanced')?></h2>
            <?php $APPLICATION->IncludeFile('/includes/metakom/benefit.php', ['SECTION_CODE' => 'domofon-advanced']) ?>
        </div>
    </div>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>