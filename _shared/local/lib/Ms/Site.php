<?php
namespace Ms;

use \Bitrix\Main\Loader;

class Site {
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

    public static function getPhones() {
        return static::$info[0]['PROPERTIES']['PHONES']['VALUE'];
    }

    public static function getEmails() {
        return static::$info[0]['PROPERTIES']['EMAIL']['VALUE'];
    }

    public static function getSchedule() {
        return static::$info[0]['PROPERTIES']['SCHEDULE']['VALUE'];
    }
    public static function getMap() {
        return static::$info[0]['PROPERTIES']['YANDEX_MAP']['~VALUE'] ?: '';
    }

    public static function getDomain() {
        return static::$info[0]['PROPERTIES']['DOMAIN']['VALUE'];
    }

    public static function getLid() {
        return static::$info[0]['CODE'];
    }
    public static function getEmailFrom() {
        return static::$info[0]['PROPERTIES']['EMAIL_FROM']['VALUE'] ?: 'no-reply@' . $_SERVER['SERVER_NAME'];
    }

    public static function getHeaderScripts() {
        $arScripts = static::$info[0]['PROPERTIES']['HEADER_SCRIPTS']['VALUE'];
        $scriptStr = '';
        if(is_array($arScripts) && !empty($arScripts)) {
            $scriptStr .= "\r\n";
            foreach($arScripts as $arScript) {
                $scriptStr .= htmlspecialchars_decode($arScript['TEXT']);
            }
        }
        $scriptStr .= "\r\n";
        return $scriptStr;
    }

    public static function getFooterScripts() {
        $arScripts = static::$info[0]['PROPERTIES']['FOOTER_SCRIPTS']['VALUE'];
        $scriptStr = '';
        if(is_array($arScripts) && !empty($arScripts)) {
            $scriptStr .= "\r\n";
            foreach($arScripts as $arScript) {
                $scriptStr .= htmlspecialchars_decode($arScript['TEXT']);
            }
        }
        $scriptStr .= "\r\n";
        return $scriptStr;
    }

    public static function getYandexVerification() {
        if(static::$info[0]['PROPERTIES']['YANDEX_VERIFICATION_META']['VALUE']) {
            return '<meta name="yandex-verification" content="' . static::$info[0]['PROPERTIES']['YANDEX_VERIFICATION_META']['VALUE'] . '" />' . "\r\n";
        }
        return '';
    }

    public static function getGoogleVerification() {
        if(static::$info[0]['PROPERTIES']['GOOGLE_VERIFICATION_META']['VALUE']) {
            return '<meta name="google-site-verification" content="' . static::$info[0]['PROPERTIES']['GOOGLE_VERIFICATION_META']['VALUE'] . '" />' . "\r\n";
        }
        return '';
    }

    public static function getYandexRaiting() {
        if($iframe = static::$info[0]['PROPERTIES']['YANDEX_RAITING']['VALUE']) {
            return htmlspecialchars_decode($iframe) . "\r\n";
        }
        return '';
    }

    public static function getSocial() {
        $arSocial = [];
        $prop = static::$info[0]['PROPERTIES']['SOCIAL'];
        if(is_array($prop['VALUE'])) {
            foreach($prop['VALUE'] as $key => $link) {
                $icon = $prop['DESCRIPTION'][$key];
                if(strpos($icon, '.') === false) {
                    $icon .= '.svg';
                }
                $arSocial[] = [
                    'link' => $link,
                    'icon' => $icon
                ];
            }
        }
        return $arSocial;
    }
    
    public static function getCities() {
        $arCities = [];
        foreach(static::$info as $arItem) {
            if($city = trim($arItem['PROPERTIES']['CITY']['VALUE'])) {
                $arCities[] = $city;
            }
        }
        return $arCities;
    }

    public static function getAddresses() {
        $arAddresses = [];
        foreach(static::$info as $arItem) {
            if($address = trim($arItem['PROPERTIES']['ADDRESS']['VALUE'])) {
                $arAddresses[] = $address;
            }
        }
        return $arAddresses;
    }
}