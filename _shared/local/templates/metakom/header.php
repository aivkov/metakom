<?php
/** @global CMain $APPLICATION */

use Bitrix\Main\Page\Asset;
use Ms\Site;

$curPage = $APPLICATION->GetCurPage();
$assets = Asset::getInstance();
$assets->addCss('/local/css/main.css');
$assets->addCss(SITE_TEMPLATE_PATH . '/css/style.css');

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/favicon.ico')):?>
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <?php endif?>
    <?php if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/favicon-32.png')):?>
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32.png">
    <?php endif?>
    <?php if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/favicon-16.png')):?>
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16.png">
    <?php endif?>

    <title><?php $APPLICATION->ShowTitle(); ?></title>
    <?=Site::getGoogleVerification()?>
    <?=Site::getYandexVerification()?>
    <?php
    $APPLICATION->ShowMeta("keywords", false);
    $APPLICATION->ShowMeta("description", false);
    $APPLICATION->ShowLink("canonical", null);
    $APPLICATION->ShowCSS(true);
    $APPLICATION->ShowHeadStrings();
    $APPLICATION->ShowHeadScripts();
    ?>
    <?=Site::getHeaderScripts()?>
</head>
<body>
<div class="bx-panel"><?php $APPLICATION->ShowPanel() ?></div>
<?=Site::getYandexRaiting()?>
<?php $APPLICATION->IncludeFile('/includes/metakom/header.php')?>
