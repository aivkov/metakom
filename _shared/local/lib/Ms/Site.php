<?php
namespace Ms;

use \Bitrix\Main\Loader;

class Site {

    private $hlBlockId = SITE_HL_ID;
    private $entityDataClass = null;

    private static $info;

    private static $iblockId;

    public static function init() {
        static::selectInfo();
        static::selectIblockId();
    }

    private static function selectInfo() {
        Loader::includeModule('iblock');
        $arFilter = ['IBLOCK_TYPE' => 'content', 'IBLOCK_CODE' => 'contacts', 'CODE' => SITE_ID, 'ACTIVE' => 'Y'];
        $res = \CIBlockElement::getList(['SORT' => 'asc'], $arFilter);
        static::$info = [];
        while($ob = $res->GetNextElement()) {
            $arFields = $ob->getFields();
            $arFields['PROPERTIES'] = $ob->getProperties();
            static::$info[] = $arFields;
        }
    }

    private static function selectIblockId() {
        Loader::includeModule('iblock');
        $arFilter = ['TYPE' => 'content','CODE' => static::getDomain(), "CHECK_PERMISSIONS" => "N"];
        $iBlock = \CIBlock::GetList([], $arFilter)->Fetch();
        if($iBlock['ID']) {
            static::$iblockId = $iBlock['ID'];
        }
    }

    public static function getIblockId() {
        if(!static::$iblockId) {
            static::selectIblockId();
        }
        return static::$iblockId;
    }

    public static function getIbType() {
        return '';
    }

    public static function getPhones() {
        return self::$info[0]['PROPERTIES']['PHONES']['VALUE'];
    }

    public static function getEmails() {
        return self::$info[0]['PROPERTIES']['EMAIL']['VALUE'];
    }

    public static function getSchedule() {
        return self::$info[0]['PROPERTIES']['SCHEDULE']['VALUE'];
    }
    public static function getMap() {
        return self::$info[0]['PROPERTIES']['YANDEX_MAP']['VALUE'];
    }

    public static function getDomain() {
        return self::$info[0]['PROPERTIES']['DOMAIN']['VALUE'];
    }

    public static function getLid() {
        return self::$info[0]['CODE'];
    }
    public static function getEmailFrom() {
        return self::$info[0]['PROPERTIES']['EMAIL_FROM']['VALUE'] ?: 'no-reply@' . $_SERVER['SERVER_NAME'];
    }

    public static function getHeaderScripts() {
        return self::$info[0]['PROPERTIES']['HEADER_SCRIPTS']['VALUE'];
    }

    public static function getFooterScripts() {
        return self::$info[0]['PROPERTIES']['FOOTER_SCRIPTS']['VALUE'];
    }

    public static function getYandexVerification() {
        if(self::$info[0]['PROPERTIES']['YANDEX_VERIFICATION_META']['VALUE']) {
            return '<meta name="yandex-verification" content="' . self::$info[0]['PROPERTIES']['YANDEX_VERIFICATION_META']['VALUE'] . '" />';
        }
        return '';
    }

    public static function getGoogleVerification() {
        if(self::$info[0]['PROPERTIES']['GOOGLE_VERIFICATION_META']['VALUE']) {
            return '<meta name="google-site-verification" content="' . self::$info[0]['PROPERTIES']['GOOGLE_VERIFICATION_META']['VALUE'] . '" />';
        }
        return '';
    }

    public static function getYandexRaiting() {
        return self::$info[0]['PROPERTIES']['YANDEX_RAITING']['VALUE'];
    }
}