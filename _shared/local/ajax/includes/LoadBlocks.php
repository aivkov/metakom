<?php
namespace AjaxRequest;

class LoadBlocks extends \CAjaxRequest
{
    public function modal() {
        global $APPLICATION;

        ob_start();
        $modalId = $this->arParams['modal_id'];
        $absPath = '/includes/modal/' . $modalId . '.php';

        $filePath = $_SERVER['DOCUMENT_ROOT'] . $absPath;
        $this->arResult['test'] = $filePath;
        if(file_exists($filePath)) {
            $APPLICATION->includeFile($absPath, $this->arParams);
        }

        $this->arResult['html'] = ob_get_clean();
    }
}