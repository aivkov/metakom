<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetPageProperty("description", "Метаком Сервис является аккредитованой компанией в области поверки счетчиков воды");
$APPLICATION->SetPageProperty("keywords", "аттестат аккредитации");
$APPLICATION->SetPageProperty("title", "Аттестат аккредитации | Метаком Сервис Нижний Новгород");

?>
    <div class="page">
        <div class="container">
            <h1 class="page__title"><?= $APPLICATION->ShowViewContent('element-title-how') ?></h1>
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-detail.php', ['CODE' => 'how', 'TEMPLATE' => 'content']) ?>
        </div>
    </div>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>