<?php

namespace Ms;

class Tools
{
    public static function phoneToTel($phone) {
        return preg_replace("/[^0-9\+]/", "", $phone);
    }
}