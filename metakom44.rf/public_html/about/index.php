<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
?>
    <div class="page">
        <div class="container">
            <h1 class="page__title"><?= $APPLICATION->ShowViewContent('element-title-about') ?></h1>
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-detail.php', ['CODE' => 'about', 'TEMPLATE' => 'content']) ?>
        </div>
    </div>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>