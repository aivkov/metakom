<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetPageProperty("description", "Поверка счётчиков воды на дому без снятия — 700 ₽, замена со счётчиком — 2 500 ₽. Вносим результаты в ФГИС «Аршин», выдаём документы. Пн–Пт 9:00–18:00, тел. +7 (831) 415-41-20");
$APPLICATION->SetPageProperty("keywords", "Поверка счетчиков воды, Метаком Сервис Нижний Новгород");
$APPLICATION->SetPageProperty("title", "Поверка счетчиков воды | Компания Метаком Сервис Нижний Новгород");
$APPLICATION->SetTitle("Поверка и замена счетчиков воды в Нижнем Новгороде — от 700 ₽ | Метаком Сервис");

$APPLICATION->SetAdditionalCss(CUtil::GetAdditionalFileURL('/local/css/banner.css'));
?>
    <div class="container">
        <div class="section section--no-pt section--no-pb">
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-detail.php', ['CODE' => 'main-banner', 'TEMPLATE' => 'banner']) ?>
        </div>

        <div class="section">
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-detail.php', ['CODE' => 'main-about', 'TEMPLATE' => 'content']) ?>
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