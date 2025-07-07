<?php
/** @global CMain $APPLICATION */

use Bitrix\Main\Page\Asset;

$curPage = $APPLICATION->GetCurPage();
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
<?php $APPLICATION->IncludeFile('/includes/metakom/header.php')?>

<?php if($curPage !== '/'):?>
    <div class="page">
        <div class="container">
<?php endif?>





