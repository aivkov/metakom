<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetTitle("Результаты проведения специальной оценки условий труда");
$APPLICATION->SetPageProperty("title", "Специальная оценка условий труда | Краснодар");
?>

    <div class="page">
        <div class="container">
            <h1 class="page__title"><?php $APPLICATION->ShowTitle(false) ?></h1>
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-detail.php', ['CODE' => 'sout', 'TEMPLATE' => 'content']) ?>
        </div>
    </div>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>