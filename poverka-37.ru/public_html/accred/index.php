<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetPageProperty("description", "Метаком Сервис является аккредитованой компанией в области обеспечения единства измерений в г. Иваново");
$APPLICATION->SetPageProperty("keywords", "аттестат аккредитации");
$APPLICATION->SetPageProperty("title", "Аттестат аккредитации | Метаком Сервис Иваново");

?>
    <div class="page">
        <div class="container">
            <h1 class="page__title"><?= $APPLICATION->ShowViewContent('element-title-cert') ?></h1>
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-detail.php', ['CODE' => 'cert', 'TEMPLATE' => 'content']) ?>
        </div>
    </div>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>