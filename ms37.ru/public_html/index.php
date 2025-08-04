<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetPageProperty("description", "ООО «Метаком Сервис» - Обслуживание, монтаж и ремонт домофонного оборудования, систем видеонаблюдения, СКУД г. Иваново");
$APPLICATION->SetPageProperty("keywords", "Метаком Сервис, обслуживание, монтаж и ремонт домофонов, систем видеонаблюдения, СКУД,  г. Иваново");
$APPLICATION->SetPageProperty("title", "ООО «Метаком Сервис» - Обслуживание, монтаж и ремонт домофонного оборудования, систем видеонаблюдения, СКУД г. Иваново");
$APPLICATION->SetTitle("Метаком Сервис Иваново");?>

<div class="container">
    <div class="section">
        <?php $APPLICATION->IncludeFile('/includes/metakom/banner.php', ['ID' => 9])?>
    </div>
    <div class="section">
        <?php $APPLICATION->IncludeFile('/includes/metakom/advantages.php')?>
    </div>
</div>

<?php $APPLICATION->IncludeFile('/includes/metakom/services.php', ['ID' => 11])?>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>