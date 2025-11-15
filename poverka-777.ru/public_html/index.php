<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetPageProperty("description", "Компания «Метаком-Сервис» занимается поверкой счетчиков воды в городе Москва. Внесение данных в систему «АРШИН»");
$APPLICATION->SetPageProperty("keywords", "Поверка счетчиков воды, Метаком Сервис Москва");
$APPLICATION->SetPageProperty("title", "Поверка счетчиков воды | Компания Метаком Сервис Москва");
$APPLICATION->SetTitle("Поверка счетчиков воды, Метаком Сервис Москва");

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