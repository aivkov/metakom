<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetTitle("О нас ООО «Метаком Сервис» - Обслуживание, монтаж и ремонт домофонного оборудования, систем видеонаблюдения, СКУД г. Кострома - ООО «Метаком Сервис» - Обслуживание, монтаж и ремонт домофонного оборудования, систем видеонаблюдения, СКУД в г. Косторме"); ?>
    <div class="page">
        <div class="container">
            <h1 class="page__title"><?php $APPLICATION->ShowTitle() ?></h1>
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-detail.php', ['CODE' => 'about', 'TEMPLATE' => 'content']) ?>
        </div>
    </div>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>