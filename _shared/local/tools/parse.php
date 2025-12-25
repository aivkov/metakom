<?php
ini_set('max_execution_time', 900);
ini_set('memory_limit', "1026M");

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');
require($_SERVER['DOCUMENT_ROOT'] . '/local/tools/simple-html-dom.php');


global $USER;
if (!$USER->IsAdmin()) {
    die('not authorized as admin');
}

$obParser = new \Ms\Parser();
$obParser->run();