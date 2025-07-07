<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetPageProperty("description", "ООО «Метаком Сервис» - Обслуживание, монтаж и ремонт домофонного оборудования, систем видеонаблюдения, СКУД г. Иваново");
$APPLICATION->SetPageProperty("keywords", "Метаком Сервис, обслуживание, монтаж и ремонт домофонов, систем видеонаблюдения, СКУД, г. Иваново");
$APPLICATION->SetPageProperty("title", "О компании «Метаком Сервис» в Иваново и Кинешме");
$APPLICATION->SetTitle("Метаком Сервис Иваново");?>

<div class="section">
    <?php $APPLICATION->IncludeFile('/includes/metakom/content.php', ['ID' => 22])?>
</div>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>