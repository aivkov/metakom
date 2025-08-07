<?php

/**
 * Единый входной файл для аякс запросов.
 * Уже подключено ядро битрикса, подключены инфоблоки
 */
define("NO_KEEP_STATISTIC", true); //Не учитываем статистику
define("NOT_CHECK_PERMISSIONS", true); //Не учитываем права доступа
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
define("PUBLIC_AJAX_MODE", true);

class CAjaxRequest
{
    protected $arParams;
    protected $arResult;
    private $ajaxDir = "/local/ajax/includes";

    public function __construct(&$arParams = [], &$arResult = [])
    {
        $this->arParams = &$arParams;
        $this->arResult = &$arResult;
    }

    private function forSql($array)
    {
        $connection = Bitrix\Main\Application::getConnection();
        $sqlHelper = $connection->getSqlHelper();

        foreach ($array as &$item) {
            if (is_array($item)) {
                $item = $this->forSql($item);
            } else {
                $item = $sqlHelper->forSql($item);
            }
        }

        return $array;
    }

    public function execute()
    {
        \Bitrix\Main\Loader::includeModule("main");
        \Bitrix\Main\Loader::includeModule("iblock");

        $this->arParams = $this->forSql($_POST);

        $action = explode("/", $this->arParams['action']);

        $fullPath = \Bitrix\Main\Application::getDocumentRoot() . $this->ajaxDir . "/" . $action[0] . '.php';
        $file = new Bitrix\Main\IO\File($fullPath);

        if (!$file->isExists() || !$file->isReadable()) {
            $this->arResult = [
                "status" => "error",
                "message" => "Action '" . $this->arParams['action'] . "' not found",
            ];
        } else {
            $arResult = &$this->arResult;
            $arParams = &$this->arParams;
            include $fullPath;

            if (isset($action[1])) {
                $className = 'AjaxRequest\\' . $action[0];
                if (class_exists($className)) {
                    $classAction = new $className($arParams, $arResult);
                    if (method_exists($classAction, $action[1])) {
                        $classAction->{$action[1]}();
                    } else {
                        $this->arResult = [
                            "status" => "error",
                            "message" => "Action '" . $this->arParams['action'] . "' not found",
                        ];
                    }
                } else {
                    $this->arResult = [
                        "status" => "error",
                        "message" => "Action '" . $action[0] . "' not found",
                    ];
                }

            }
        }

        $this->arResult["INPUT"] = $this->arParams;
        echo json_encode($this->arResult);
    }

}

$ajaxRequest = new CAjaxRequest();
$ajaxRequest->execute();

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_after.php");
die();