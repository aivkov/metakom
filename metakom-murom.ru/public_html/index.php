<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetPageProperty("description", "ООО «Метаком Сервис» - Обслуживание, монтаж и ремонт домофонного оборудования, систем видеонаблюдения, СКУД г. Муром");
$APPLICATION->SetPageProperty("keywords", "Метаком Сервис, обслуживание, монтаж и ремонт домофонов, систем видеонаблюдения, СКУД,  г. Муром");
$APPLICATION->SetPageProperty("title", "ООО «Метаком Сервис» - Обслуживание, монтаж и ремонт домофонного оборудования, систем видеонаблюдения, СКУД г. Муром");
$APPLICATION->SetTitle("Метаком Сервис Муром");

$APPLICATION->SetAdditionalCss(CUtil::GetAdditionalFileURL('/local/css/banner.css'));
?>
    <div class="container">
        <div class="section section--no-pt">
            <?php $APPLICATION->IncludeFile('/includes/metakom/banner.php', ['CODE' => 'main-banner']) ?>
        </div>
        <div class="section section--no-pt">
            <?php $APPLICATION->IncludeFile('/includes/metakom/advantages.php', ['SECTION_CODE' => 'advantages']) ?>
        </div>
    </div>

<?php $APPLICATION->IncludeFile('/includes/metakom/services.php', ['SECTION_CODE' => 'services']) ?>

    <div class="container">
        <div class="section">
            <h2 class="section__title">Контакты</h2>
            <?php $APPLICATION->IncludeFile('/includes/metakom/contacts.php') ?>
        </div>
    </div>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>