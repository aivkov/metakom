<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetPageProperty("description", "Поверка счетчиков воды без снятия в Брянске. Аттестат аккредитации");
$APPLICATION->SetPageProperty("keywords", "аттестат аккредитации, поверка счетчиков");
$APPLICATION->SetPageProperty("title", "Поверка счетчиков БГЦРПУ Брянск. Аккредитованная компания");
$APPLICATION->SetTitle('Аттестат аккредитации')

?>
    <div class="page">
        <div class="container">
            <h1 class="page__title"><?= $APPLICATION->ShowViewContent('element-title-cert') ?></h1>
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-detail.php', ['CODE' => 'cert', 'TEMPLATE' => 'content']) ?>
        </div>
    </div>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>