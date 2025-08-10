<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetTitle("Установка и облуживание Ip видеокамер от Метаком Сервис в Муроме");
$APPLICATION->SetAdditionalCss(CUtil::GetAdditionalFileURL('/local/css/banner.css'));
?>


    <div class="section section--no-pt">
        <div class="container">
            <?php $APPLICATION->IncludeFile('/includes/metakom/banner.php', ['ID' => 42]) ?>
        </div>
    </div>
    <div class="section section--grey">
        <?php $APPLICATION->IncludeFile('/includes/metakom/banner2.php', ['ID' => 43]) ?>
    </div>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>