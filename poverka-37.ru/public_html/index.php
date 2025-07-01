<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetPageProperty("description", "Компания &quot;Метаком-Сервис&quot; занимается поверкой приборов учёта водоснабжения в городе Иваново. Внесение данных в систему &quot;АРШИН&quot;");
$APPLICATION->SetPageProperty("title", "Поверка счётчиков воды | Компания Метаком Иваново");
$APPLICATION->SetTitle("Поверка приборов учета водоснабжения");?>

    <div class="container">
        <div class="section">
            <?php $APPLICATION->IncludeFile('/includes/metakom/banner.php', ['ID' => 8])?>
        </div>
    </div>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>