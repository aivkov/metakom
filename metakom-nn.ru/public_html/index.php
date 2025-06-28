<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetPageProperty("description", "ООО «Метаком Сервис» - Обслуживание, монтаж и ремонт домофонного оборудования, систем видеонаблюдения, СКУД г. Нижний Новгород");
$APPLICATION->SetPageProperty("keywords", "Метаком Сервис, обслуживание, монтаж и ремонт домофонов, систем видеонаблюдения, СКУД,  г. Нижний Новгород");
$APPLICATION->SetPageProperty("title", "ООО «Метаком Сервис» - Обслуживание, монтаж и ремонт домофонного оборудования, систем видеонаблюдения, СКУД г. Нижний Новгород");
$APPLICATION->SetTitle("Поверка приборов учета водоснабжения");?>

<div class="container">
    <div class="section">
        <?php $APPLICATION->IncludeFile('/includes/metakom/banner.php')?>
    </div>
</div>


<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>