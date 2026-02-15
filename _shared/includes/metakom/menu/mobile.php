<?php
/** @var \CMain $APPLICATION */

$APPLICATION->IncludeComponent(
    "bitrix:menu",
    "mobile",
    array(
        "ALLOW_MULTI_SELECT" => "N",
        "CHILD_MENU_TYPE" => "mobile",
        "DELAY" => "N",
        "MAX_LEVEL" => "1",
        "MENU_CACHE_GET_VARS" => array(
        ),
        "MENU_CACHE_TIME" => "3600",
        "MENU_CACHE_TYPE" => "N",
        "MENU_CACHE_USE_GROUPS" => "Y",
        "ROOT_MENU_TYPE" => "mobile",
        "USE_EXT" => "N",
        "COMPONENT_TEMPLATE" => "mobile"
    ),
    false
);?>