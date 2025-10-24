<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetPageProperty("description", "Свяжитесь с нами для получения консультаций, информации о услугах и записи на поверку счетчиков в Краснодаре. Мы готовы ответить на все ваши вопросы!");
$APPLICATION->SetPageProperty("keywords", "Поверка счетчиков воды, Метаком Сервис Краснодар");
$APPLICATION->SetPageProperty("title", "Контакты | Метаком Сервис Краснодар");
$APPLICATION->SetTitle("Контакты"); ?>

    <div class="page">
        <div class="container">
            <h1 class="page__title"><?php $APPLICATION->ShowTitle(false) ?></h1>
            <?php $APPLICATION->IncludeFile('/includes/metakom/contacts.php') ?>
        </div>
    </div>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>