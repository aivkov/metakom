<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');


$APPLICATION->SetPageProperty("description", "Поверка счётчиков воды на дому без снятия — 600 ₽, для ТСЖ и ЖСК — от 450 ₽. Вносим результаты в ФГИС «Аршин», выдаём документы. Пн–Пт 9:00–18:00, тел. 8 (4932) 52-80-20");
$APPLICATION->SetPageProperty("keywords", "Поверка счетчиков воды, Метаком Иваново");
$APPLICATION->SetPageProperty("title", "Поверка счетчиков воды в Иванове без снятия — 600 ₽ | Метаком Сервис");
$APPLICATION->SetTitle("Поверка счетчиков воды, Метаком Иваново");

$APPLICATION->SetAdditionalCss(CUtil::GetAdditionalFileURL('/local/css/banner.css'));
?>
    <div class="container">
        <div class="section section--no-pt section--no-pb">
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-detail.php', ['CODE' => 'main-banner', 'TEMPLATE' => 'banner']) ?>
        </div>

        <div class="section">
            <h2 class="page__title"><?= $APPLICATION->ShowViewContent('element-title-main-about') ?></h2>
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