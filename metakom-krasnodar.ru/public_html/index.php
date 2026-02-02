<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetPageProperty("description", "ООО «Метаком» - Обслуживание, монтаж и ремонт домофонного оборудования, систем видеонаблюдения, СКУД г. Краснодар");
$APPLICATION->SetPageProperty("keywords", "Метаком, обслуживание, монтаж и ремонт домофонов, систем видеонаблюдения, СКУД,  г. Краснодар");
$APPLICATION->SetPageProperty("title", "ООО «Метаком» - Обслуживание, монтаж и ремонт домофонного оборудования, систем видеонаблюдения, СКУД г. Краснодар");
$APPLICATION->SetTitle("Метаком Краснодар");

$APPLICATION->SetAdditionalCss(CUtil::GetAdditionalFileURL('/local/css/banner.css'));
?>
    <div class="container">
        <div class="section section--no-pt">
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-detail.php', ['CODE' => 'main-banner', 'TEMPLATE' => 'banner']) ?>
        </div>
        <div class="section section--no-pt">
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-list.php', ['SECTION_CODE' => 'advantages', 'TEMPLATE' => 'advantages']) ?>
        </div>
    </div>

<?php $APPLICATION->IncludeFile('/includes/metakom/news-list.php', ['SECTION_CODE' => 'services', 'TEMPLATE' => 'services']) ?>

    <div class="container">
        <div class="section">
            <h2 class="section__title">Контакты</h2>
            <?php $APPLICATION->IncludeFile('/includes/metakom/contacts.php') ?>
        </div>
    </div>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>