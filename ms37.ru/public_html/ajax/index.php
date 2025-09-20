<?php
class CAjaxRequest
{
    protected $arParams;
    protected $arResult;
    private $ajaxDir = "/ajax/includes/";

    public function __construct(&$arParams = [], &$arResult = [])
    {
        $this->arParams = &$arParams;
        $this->arResult = &$arResult;
    }

    public function execute()
    {
        $this->arParams = $_POST;
        $action = explode("/", $this->arParams['action']);

        $file = $_SERVER['DOCUMENT_ROOT'] . $this->ajaxDir . $action[0] . '.php';

        if (!file_exists($file)) {
            $this->arResult = [
                "status" => "error",
                "message" => "Action '" . $this->arParams['action'] . "' not found",
            ];
        } else {
            $arResult = &$this->arResult;
            $arParams = &$this->arParams;
            include $file;

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
        $this->arResult["success"] = true;
        echo json_encode($this->arResult);
    }
}

$ajaxRequest = new CAjaxRequest();
$ajaxRequest->execute();

die();