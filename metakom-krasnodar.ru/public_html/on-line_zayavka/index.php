<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetTitle("Онлайн-заявка"); ?>
    <div class="page">
        <div class="container">
            <h1 class="page__title"><?php $APPLICATION->ShowTitle() ?></h1>
            <div class="form-block">
                <?php $APPLICATION->IncludeFile('/includes/form/order.php');?>
            </div>
        </div>
    </div>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>