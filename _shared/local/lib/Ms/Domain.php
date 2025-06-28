<?php
namespace Ms;

class Domain {

    private $hlBlockId = 1;
    private $entityDataClass = null;
    public function selectInfo() {
        $this->entityDataClass = HLBlock::GetEntityDataClass($this->hlBlockId);
        $domainInfo = $this->entityDataClass::getList(['filter' => ['UF_SITE_ID' => SITE_ID]])->Fetch();
        $GLOBALS['MS']['DOMAIN_INFO'] = $domainInfo ?: [];
    }
}