<?php
/** @var \CMain $APPLICATION */

$APPLICATION->IncludeComponent(
    "bitrix:menu",
    "services",
    array(
        "ALLOW_MULTI_SELECT" => "N",
        "CHILD_MENU_TYPE" => "services",
        "DELAY" => "N",
        "MAX_LEVEL" => "1",
        "MENU_CACHE_GET_VARS" => array(
        ),
        "MENU_CACHE_TIME" => "3600",
        "MENU_CACHE_TYPE" => "N",
        "MENU_CACHE_USE_GROUPS" => "Y",
        "ROOT_MENU_TYPE" => "services",
        "USE_EXT" => "Y",
        "COMPONENT_TEMPLATE" => "services",
        "SHOW_FEEDBACK" => $arParams['SHOW_FEEDBACK']
    ),
    false
);?>