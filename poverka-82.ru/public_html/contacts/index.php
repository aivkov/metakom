<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetPageProperty("description", "Поверка счетчиков воды в Крыму телефон, поверка счетчиков Феодосия контакты, поверка счетчиков Симферополь, поверка счетчиков Керчь");
$APPLICATION->SetPageProperty("keywords", "Поверка счетчиков воды, Метаком Сервис Крым");
$APPLICATION->SetPageProperty("title", "Контакты поверка счетчиков воды Крым");
$APPLICATION->SetTitle("Контакты"); ?>

    <div class="page">
        <div class="container">
            <h1 class="page__title"><?php $APPLICATION->ShowTitle(false) ?></h1>
            <?php $APPLICATION->IncludeFile('/includes/metakom/contacts.php') ?>
        </div>
    </div>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>