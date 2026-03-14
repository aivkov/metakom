<?php
ini_set('max_execution_time', 900);
ini_set('memory_limit', "1026M");

use Bitrix\Main\Page\Asset;
use Ms\Parser;

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

$assets = Asset::getInstance();
$assets->addCss('/local/css/main.css');
$assets->addCss('/local/css/parser.css');
$assets->addCss(SITE_TEMPLATE_PATH . '/css/style.css');

global $USER;
if (!$USER->IsAdmin()) {
    //die('not authorized as admin');
}

$arResult = (new Parser)->getTotalInfo();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Парсер</title>
    <?php $APPLICATION->ShowCSS(true); ?>
</head>
<body>

<div class="section">
    <div class="container">
        <div class="parser__title js-parser__title"></div>

        <div class="progress-bar">
            <div class="progress-bar__progress">
                <div class="progress-bar__done js-progress-bar" style="width: <?=$arResult['percent']?>%;"></div>
            </div>
            <div class="progress-bar__info js-progress-info"><?=$arResult['count']?>/<?=$arResult['total']?> (<?=$arResult['percent']?>%)</div>
        </div>


        <div class="parser__actions js-parser-actions">
            <button class="btn btn--160 js-ajax-link" data-action="Parser/run" data-ajax-callback="afterParserRun" data-begin="start" onclick="startScanSections()">Начать заново</button>
            <button class="btn btn--160 btn--transparent btn--attention js-ajax-link" data-action="Parser/reset" data-ajax-callback="afterParserReset">Сбросить</button>
            <button class="btn btn--160 btn--transparent js-ajax-link" data-action="Parser/continue" data-ajax-callback="afterParserContinue"
                    onclick="startImportProducts()">Продолжить</button>
            <button class="btn btn--160 js-pause-btn" onclick="toggleParsePause(this)">Приостановить</button>
        </div>
    </div>
</div>
<script src="<?= CUtil::GetAdditionalFileURL('/local/js/main.js') ?>"></script>
<script src="<?= CUtil::GetAdditionalFileURL('/local/js/parser.js') ?>"></script>

</body>
</html>


