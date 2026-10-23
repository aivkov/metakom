<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetPageProperty("description", "Контакты #SITE_NAME# #CITY_PC#");
$APPLICATION->SetPageProperty("keywords", "Контакты #SITE_NAME# #CITY_PC#");
$APPLICATION->SetPageProperty("title", "Контакты #SITE_NAME# #CITY_PC#");
$APPLICATION->SetTitle("Контакты");
?>

    <div class="page">
        <div class="container">
            <h1 class="page__title"><?php $APPLICATION->ShowTitle(false) ?></h1>
            <?php $APPLICATION->IncludeFile('/includes/metakom/contacts.php') ?>
        </div>
    </div>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>