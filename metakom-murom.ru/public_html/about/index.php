<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetTitle("О компании ООО «Метаком Сервис» в Муроме"); ?>

<?php $APPLICATION->IncludeFile('/includes/metakom/content.php', ['ID' => 28]) ?>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>