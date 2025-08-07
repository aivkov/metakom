<?php

namespace Ms;

class Tools
{
    public static function phoneToTel($phone) {
        return preg_replace("/[^0-9\+]/", "", $phone);
    }
    public static function getDomain() {
        return $GLOBALS['MS']['DOMAIN_INFO']['UF_DOMAIN'];
    }

    public static function getLid() {
        return $GLOBALS['MS']['DOMAIN_INFO']['UF_DOMAIN'];
    }

    public static function getHref($link) {
        if(str_starts_with($link, '##')) {
            return '#';
        }
        return $link;
    }

    public static function getLinkAttr($link) {
        if(str_starts_with($link, '##')) {
            $modalId = substr($link, 2);
            return 'data-modal-ajax-open="' . $modalId . '"';
        }
        return '';
    }
}