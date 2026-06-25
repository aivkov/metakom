<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetTitle("Типы трубок");
$APPLICATION->SetPageProperty("title", "Типы трубок | Метаком-Краснодар");
$APPLICATION->SetPageProperty("description", "Типы трубок Метаком");
?>

    <div class="page">
        <div class="container">
            <h1 class="page__title"><?php $APPLICATION->ShowTitle(false) ?></h1>
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-detail.php', ['CODE' => 'tubes', 'TEMPLATE' => 'content']) ?>
        </div>
    </div>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>