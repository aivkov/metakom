<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetPageProperty("description", "Узнайте, почему поверка счетчиков воды важна для точного учета и снижения коммунальных расходов");
$APPLICATION->SetPageProperty("keywords", "Поверка счетчиков воды, Метаком Сервис Брянск");
$APPLICATION->SetPageProperty("title", "Поверка счетчиков воды БГЦРПУ Брянск");

?>
    <div class="page">
        <div class="container">
            <h1 class="page__title"><?= $APPLICATION->ShowViewContent('element-title-about') ?></h1>
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-detail.php', ['CODE' => 'about', 'TEMPLATE' => 'content']) ?>
        </div>
    </div>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>