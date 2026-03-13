<?php
namespace AjaxRequest;

class Parser extends \CAjaxRequest
{
    public function run() {
        $obParser = new \Ms\Parser($this->arParams);
        if($this->arParams['begin']) {
            $obParser->clearTable();
        }
        $this->arResult = $obParser->scanSection();
    }

    public function continue() {
        $this->arResult = (new \Ms\Parser())->continue();
    }

    public function reset() {
        $this->arResult = (new \Ms\Parser())->reset();
    }
}