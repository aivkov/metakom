<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetPageProperty("description", "Мы всегда готовы помочь вам! Свяжитесь с нашей командой для получения информации о поверке счетчиков воды");
$APPLICATION->SetPageProperty("keywords", "Поверка счетчиков воды, Метаком Сервис Брянск");
$APPLICATION->SetPageProperty("title", "Контакты | Свяжитесь с нами для поверки счетчиков воды в Брянске");
$APPLICATION->SetTitle("Контакты"); ?>

    <div class="page">
        <div class="container">
            <h1 class="page__title"><?php $APPLICATION->ShowTitle(false) ?></h1>
            <?php $APPLICATION->IncludeFile('/includes/metakom/contacts.php') ?>
        </div>
    </div>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>