<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetPageProperty("title", "ООО «Метаком» г. Краснодар | Карта сайта");
$APPLICATION->SetTitle("Карта сайта", true);
?>

<div class="container">
    <h1 class="page__title"><?php $APPLICATION->ShowTitle(false) ?></h1>
    <?php $APPLICATION->IncludeComponent(
        "bitrix:main.map",
        "metakom",
        Array(
            "CACHE_TIME" => "3600",
            "CACHE_TYPE" => "A",
            "COL_NUM" => "1",
            "LEVEL" => "2",
            "SET_TITLE" => "Y",
            "SHOW_DESCRIPTION" => "N"
        )
    );?>
</div>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>