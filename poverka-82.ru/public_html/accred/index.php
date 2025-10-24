<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetPageProperty("description", "Метаком Сервис поверка счетчиков воды в Феодосии");
$APPLICATION->SetPageProperty("keywords", "аттестат аккредитации, поверка счетчиков воды, Крым");
$APPLICATION->SetPageProperty("title", "Аттестат аккредитации | поверка счетчиков воды");

?>
    <div class="page">
        <div class="container">
            <h1 class="page__title"><?= $APPLICATION->ShowViewContent('element-title-cert') ?></h1>
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-detail.php', ['CODE' => 'cert', 'TEMPLATE' => 'content']) ?>
        </div>
    </div>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>