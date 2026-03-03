<?php
namespace AjaxRequest;

class Parser extends \CAjaxRequest
{
    public function run() {
        $count = $this->arParams['count'] ?: 1;
        $obParser = new \Ms\Parser();
        if($this->arParams['begin']) {
            $obParser->clearTable();
        }
        $this->arResult = $obParser->scanSection($count);
    }

    public function continue() {
        $this->arResult = (new \Ms\Parser())->continue();
    }
}