<?php
/** @global CMain $APPLICATION */

use Bitrix\Main\Page\Asset;
use Bitrix\Main\Page\AssetLocation;
use Ms\Site;
use Ms\Helper;

$curPage = $APPLICATION->GetCurPage();
$assets = Asset::getInstance();
$assets->addCss('/local/css/fancybox.css');
$assets->addCss('/local/css/main.css');
$assets->addCss(SITE_TEMPLATE_PATH . '/css/style.css');

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php Helper::showFaviconsHtml();?>

    <?php
    $canonical = Site::getCanonicalLink();
    if($canonical) {
        Asset::getInstance()->addString('<link rel="canonical" href="' . htmlspecialcharsbx($canonical) . '">',
            true,                       // уникальная строка, дубль не добавится
            AssetLocation::BEFORE_CSS   // место вывода внутри <head>
        );
    }
    ?>

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
