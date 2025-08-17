<?php
namespace Ms;

use \Bitrix\Main\Loader;

class Site {

    private $hlBlockId = SITE_HL_ID;
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

    public static function getIbType() {
        return $GLOBALS['MS']['DOMAIN_INFO']['UF_IB_TYPE'];
    }

    public static function getPhones() {
        return $GLOBALS['MS']['DOMAIN_INFO']['UF_PHONES'];
    }

    public static function getEmails() {
        return $GLOBALS['MS']['DOMAIN_INFO']['UF_EMAIL'];
    }

    public static function getSchedule() {
        return $GLOBALS['MS']['DOMAIN_INFO']['UF_SCHEDULE'];
    }
    public static function getMap() {
        return $GLOBALS['MS']['DOMAIN_INFO']['UF_YA_MAP'];
    }

    public static function getDomain() {
        return $GLOBALS['MS']['DOMAIN_INFO']['UF_DOMAIN'];
    }

    public static function getLid() {
        return $GLOBALS['MS']['DOMAIN_INFO']['UF_SITE_ID'];
    }
    public static function getEmailFrom() {
        return $GLOBALS['MS']['DOMAIN_INFO']['UF_EMAIL_FROM'] ?: 'no-reply@' . $_SERVER['SERVER_NAME'];
    }

    public static function getHeaderScripts() {
        return $GLOBALS['MS']['DOMAIN_INFO']['UF_HEADER_SCRIPTS'];
    }

    public static function getFooterScripts() {
        return $GLOBALS['MS']['DOMAIN_INFO']['UF_FOOTER_SCRIPTS'];
    }

    public static function getYandexVerification() {
        if($GLOBALS['MS']['DOMAIN_INFO']['UF_YANDEX_VERIFICATION']) {
            return '<meta name="yandex-verification" content="' . $GLOBALS['MS']['DOMAIN_INFO']['UF_YANDEX_VERIFICATION'] . '" />';
        }
        return '';
    }

    public static function getGoogleVerification() {
        if($GLOBALS['MS']['DOMAIN_INFO']['UF_GOOGLE_VERIFICATION']) {
            return '<meta name="google-site-verification" content="' . $GLOBALS['MS']['DOMAIN_INFO']['UF_GOOGLE_VERIFICATION'] . '" />';
        }
        return '';
    }

    public static function getYandexRaiting() {
        return $GLOBALS['MS']['DOMAIN_INFO']['UF_YANDEX_RAITING'];
    }
}