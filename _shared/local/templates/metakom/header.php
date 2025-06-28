<?php
/** @global CMain $APPLICATION */

use Bitrix\Main\Page\Asset;

$curPage = $APPLICATION->GetCurPage(true);
$assets = Asset::getInstance();
$assets->addCss(SITE_TEMPLATE_PATH . '/css/style.css');
$assets->addCss('/local/css/main.css');

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php $APPLICATION->ShowTitle(); ?></title>
    <?php
    $APPLICATION->ShowMeta("keywords", false);
    $APPLICATION->ShowMeta("description", false);
    $APPLICATION->ShowLink("canonical", null);
    $APPLICATION->ShowCSS(true);
    $APPLICATION->ShowHeadStrings();
    $APPLICATION->ShowHeadScripts();
    ?>
</head>
<body>
<div class="bx-panel"><?php $APPLICATION->ShowPanel() ?></div>
<header class="header">
    <div class="header__container container">
        <div class="header__left">
            <a href="/" class="header__logo">
                <img src="/local/img/logo.png" alt="Метаком-сервис">
            </a>
            <?php $APPLICATION->IncludeFile('/includes/menu/top.php')?>
        </div>
        <div class="header__right">
            <?php if($GLOBALS['MS']['UF_PHONES'])?>
            <div class="header__phones">
                <a href="tel=" class="header__phone"><?=$GLOBALS['MS']['DOMAIN_INFO']['UF_PHONES'][0]?></a>
            </div>
            <div class="header__feedback">
                <a href="#" data-modal-open="feedback" class="header__feedback-link">Оставить заявку</a>
            </div>
        </div>

    </div>
</header>




