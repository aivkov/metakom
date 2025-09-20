<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetPageProperty("description", "Узнайте, для чего нужна поверка счетчиков воды, какова процедура ее проведения и какие последствия могут возникнуть при несвоевременной поверке.");
$APPLICATION->SetPageProperty("keywords", "Поверка счетчиков воды, Метаком Сервис Нижний Новгород");
$APPLICATION->SetPageProperty("title", "Поверка счетчиков: необходимость, процедура и последствия | Метаком Сервис Нижний Новгород");

?>
    <div class="page">
        <div class="container">
            <h1 class="page__title"><?= $APPLICATION->ShowViewContent('element-title-about') ?></h1>
            <?php $APPLICATION->IncludeFile('/includes/metakom/content.php', ['CODE' => 'about']) ?>
        </div>
    </div>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>