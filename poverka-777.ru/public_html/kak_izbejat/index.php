<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetPageProperty("description", "В данной статье описаны самые распространенные методы мошенничества при проведении поверки счетчиков воды в Москве");
$APPLICATION->SetPageProperty("keywords", "Поверка счетчиков воды, Метаком Сервис Москва");
$APPLICATION->SetPageProperty("title", "За честный бизнес | Метаком Москв");

?>
    <div class="page">
        <div class="container">
            <h1 class="page__title"><?= $APPLICATION->ShowViewContent('element-title-security') ?></h1>
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-detail.php', ['CODE' => 'security', 'TEMPLATE' => 'content']) ?>
        </div>
    </div>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>