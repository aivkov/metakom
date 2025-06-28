<?php
use Ms\Domain;

require_once( $_SERVER['DOCUMENT_ROOT'] . '/local/lib/Loader.php');
Loader::register();

require_once( $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/includes.php');

(new Domain)->selectInfo();