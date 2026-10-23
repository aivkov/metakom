<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetPageProperty("description", "Новости #SITE_NAME# #CITY_PC#");
$APPLICATION->SetPageProperty("keywords", "Новости #SITE_NAME# #CITY_PC#");
$APPLICATION->SetPageProperty("title", "Новости #SITE_NAME# #CITY_PC#");
$APPLICATION->SetTitle("Новости #SITE_NAME#");
?>

    <div class="page">
        <div class="container">
            <h1 class="page__title"><?php $APPLICATION->ShowTitle(false) ?></h1>
            <?php $APPLICATION->IncludeFile('/includes/metakom/news.php', ['SECTION_CODE' => 'news']) ?>
        </div>
    </div>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>