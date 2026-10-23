<?php

namespace Ms;

use Ms\Site;

class Handler
{
    public static function onEndBufferContent(&$content) {
        $phones = Site::getPhones();
        $content = str_replace('#PHONE#', $phones[0]['phone'] ?: '', $content);

        $citiesPC = array_values(Site::getCitiesPC());
        $citiesPC = array_unique($citiesPC);
        $citiesPCStr = '';
        if(is_array($citiesPC)) {
            foreach($citiesPC as $key => $city) {
                $citiesPCStr .= $city;
                if(count($citiesPC) > 1) {
                    if($key === count($citiesPC) - 2) {
                        $citiesPCStr .= ' и ';
                    }
                    elseif($key < count($citiesPC) - 2) {
                        $citiesPCStr .= ', ';
                    }
                }
            }
        }
        if($citiesPCStr) {
            $citiesPCStr = 'в ' . $citiesPCStr;
        }
        $content = str_replace('#CITY_PC#', $citiesPCStr, $content);

        $content = str_replace('#SITE_NAME#', Site::getSiteName() ?: '', $content);
    }
}