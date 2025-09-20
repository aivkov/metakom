<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetPageProperty("description", "Компания «Метаком-Сервис» занимается поверкой счетчиков воды в Нижнем Новгороде. Внесение данных в систему «АРШИН»");
$APPLICATION->SetPageProperty("keywords", "Поверка счетчиков воды, Метаком Сервис Нижний Новгород");
$APPLICATION->SetPageProperty("title", "Поверка счетчиков воды | Компания Метаком Сервис Нижний Новгород");
$APPLICATION->SetTitle("Поверка счетчиков воды, Метаком Сервис Нижний Новгород");

$APPLICATION->SetAdditionalCss(CUtil::GetAdditionalFileURL('/local/css/banner.css'));
?>
    <div class="container">
        <div class="section section--no-pt section--no-pb">
            <?php $APPLICATION->IncludeFile('/includes/metakom/banner.php', ['CODE' => 'main-banner']) ?>
        </div>

        <div class="section">
            <?php $APPLICATION->IncludeFile('/includes/metakom/content.php', ['CODE' => 'main-about']) ?>
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