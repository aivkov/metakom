<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetTitle("Установка и облуживание аналоговых домофонов от Метаком Сервис в Муроме");
$APPLICATION->SetAdditionalCss(CUtil::GetAdditionalFileURL('/local/css/banner.css'));
?>

    <div class="container">
        <div class="section">
            <?php $APPLICATION->IncludeFile('/includes/metakom/banner.php', ['ID' => 37]) ?>
        </div>
        <div class="section">
            <?php $APPLICATION->IncludeFile('/includes/metakom/banner2.php', ['ID' => 38]) ?>
        </div>
    </div>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>