<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetPageProperty("description", "Управляющая компания #SITE_NAME# #CITY_PC#");
$APPLICATION->SetPageProperty("keywords", "Управляющая компания #SITE_NAME# #CITY_PC#");
$APPLICATION->SetPageProperty("title", "Управляющая компания #SITE_NAME# #CITY_PC#");
$APPLICATION->SetTitle("Управляющая компания #SITE_NAME#");
?>
    <div class="page">
        <div class="container">
            <h1 class="page__title"><?= $APPLICATION->ShowViewContent('element-title-uk-main') ?></h1>
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-detail.php', ['CODE' => 'uk-main', 'TEMPLATE' => 'content']) ?>
        </div>
    </div>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>