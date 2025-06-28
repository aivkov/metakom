<?php
use Ms\Site;

require_once( $_SERVER['DOCUMENT_ROOT'] . '/local/lib/Loader.php');
Loader::register();

require_once( $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/includes.php');

Site::init();
