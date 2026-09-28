<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetTitle("Оплата");
$APPLICATION->SetPageProperty("title", "Оплата домофона Метаком | Метаком-Новороссийск");
$APPLICATION->SetPageProperty("description", "Способы оплаты за обслуживание домофона Метаком в Новороссийске и Анапе");
?>

    <div class="page">
        <div class="container">
            <h1 class="page__title"><?php $APPLICATION->ShowTitle(false) ?></h1>
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-detail.php', ['CODE' => 'payment', 'TEMPLATE' => 'content']) ?>
        </div>
    </div>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>