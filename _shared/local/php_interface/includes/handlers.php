<?php
use Bitrix\Main\EventManager;

$eventManager = EventManager::getInstance();
$eventManager->addEventHandler('main', 'OnEndBufferContent', ['\Ms\Handler', 'onEndBufferContent']);