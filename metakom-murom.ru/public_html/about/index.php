<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetTitle("О компании ООО «Метаком Сервис» в Муроме"); ?>
    <div class="page">
        <div class="container">
            <h1 class="page__title"><?php $APPLICATION->ShowTitle() ?></h1>
            <?php $APPLICATION->IncludeFile('/includes/metakom/content.php', ['CODE' => 'about']) ?>
        </div>
    </div>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>