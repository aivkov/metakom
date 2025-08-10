<?php
use Ms\Site;

require_once( $_SERVER['DOCUMENT_ROOT'] . '/local/lib/Loader.php');
Loader::register();

require_once( $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/includes.php');

Site::init();

$page = $APPLICATION->GetCurPage();

$cssPath = $page . 'style.css';
$filePath = $_SERVER['DOCUMENT_ROOT'] . $cssPath;
if(file_exists($filePath)) {
    $APPLICATION->SetAdditionalCss(CUtil::GetAdditionalFileURL($cssPath));
}