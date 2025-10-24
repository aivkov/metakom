<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetPageProperty("description", "Как правило, поверка счетчика проводится работниками ЖЕУ на дому, без его снятия с помощью специальной переносной установки");
$APPLICATION->SetPageProperty("keywords", "Поверка счетчиков воды, Метаком Сервис Краснодар");
$APPLICATION->SetPageProperty("title", "Как производится поверка прибора? | Метаком Краснодар");

?>
    <div class="page">
        <div class="container">
            <h1 class="page__title"><?= $APPLICATION->ShowViewContent('element-title-how') ?></h1>
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-detail.php', ['CODE' => 'how', 'TEMPLATE' => 'content']) ?>
        </div>
    </div>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>