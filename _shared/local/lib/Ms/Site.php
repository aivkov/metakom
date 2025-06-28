<?php
namespace Ms;

use \Bitrix\Main\Loader;

class Site {

    private $hlBlockId = 1;
    private $entityDataClass = null;

    public static function init() {
        $instance = new static;
        $instance->selectDomainInfo();
        $instance->selectIbInfo();
    }

    private function selectDomainInfo() {

        $this->entityDataClass = HLBlock::GetEntityDataClass($this->hlBlockId);
        $domainInfo = $this->entityDataClass::getList(['filter' => ['UF_SITE_ID' => SITE_ID]])->Fetch();
        $GLOBALS['MS']['DOMAIN_INFO'] = $domainInfo ?: [];
    }

    private function selectIbInfo() {
        global $DB;
        $siteId = $GLOBALS['MS']['DOMAIN_INFO']['UF_SITE_ID'];
        $sql = 'SELECT `CODE`, `ID` FROM b_iblock WHERE LID = "' . $siteId . '"';
        $res = $DB->Query($sql);
        $GLOBALS['MS']['IB_INFO'] = [];
        while($ib = $res->Fetch()) {
            $GLOBALS['MS']['IB_INFO'][$ib['CODE']] = $ib['ID'];
        }
    }
}