<?php

namespace Ms;

class Brand
{
    private $hlBlockId = 5;
    private $entityDataClass;
    public function __construct() {
        $this->entityDataClass = HLBlock::GetEntityDataClass($this->hlBlockId);
    }

    public static function getByXmlId($xmlId) {
        if(!$xmlId) {
            return [];
        }
        $instance = new self;
        $brand = $instance->entityDataClass::getList(['filter' => ['UF_XML_ID' => $xmlId]])->Fetch();
        return $brand ?: [];
    }
}