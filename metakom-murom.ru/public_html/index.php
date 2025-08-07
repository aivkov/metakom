<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetPageProperty("description", "ООО «Метаком Сервис» - Обслуживание, монтаж и ремонт домофонного оборудования, систем видеонаблюдения, СКУД г. Муром");
$APPLICATION->SetPageProperty("keywords", "Метаком Сервис, обслуживание, монтаж и ремонт домофонов, систем видеонаблюдения, СКУД,  г. Муром");
$APPLICATION->SetPageProperty("title", "ООО «Метаком Сервис» - Обслуживание, монтаж и ремонт домофонного оборудования, систем видеонаблюдения, СКУД г. Муром");
$APPLICATION->SetTitle("Метаком Сервис Муром"); ?>

    <div class="container">
        <div class="section">
            <?php $APPLICATION->IncludeFile('/includes/metakom/banner.php', ['ID' => 27]) ?>
        </div>
        <div class="section">
            <?php $APPLICATION->IncludeFile('/includes/metakom/advantages.php') ?>
        </div>
    </div>

    <?php $APPLICATION->IncludeFile('/includes/metakom/services.php', ['ID' => 14]) ?>

    <div class="container">
        <div class="section">
            <h2 class="section__title">Контакты</h2>
            <?php $APPLICATION->IncludeFile('/includes/metakom/contacts.php') ?>
        </div>
    </div>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>