<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetPageProperty("description", "Поверка частных приборов учета водопотребления является обязательным мероприятием для всех граждан РФ.");
$APPLICATION->SetPageProperty("keywords", "Поверка счетчиков воды, Метаком Сервис Иваново");
$APPLICATION->SetPageProperty("title", "Для чего нужна поверка счётчиков | Метаком Сервис Иваново");

?>
    <div class="page">
        <div class="container">
            <h1 class="page__title"><?= $APPLICATION->ShowViewContent('element-title-about') ?></h1>
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-detail.php', ['CODE' => 'about', 'TEMPLATE' => 'content']) ?>
        </div>
    </div>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>