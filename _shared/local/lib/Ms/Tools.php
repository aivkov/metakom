<?php

namespace Ms;

use Bitrix\Main\Type\DateTime;

class Tools
{
    public static function phoneToTel($phone)
    {
        return preg_replace("/[^0-9\+]/", "", $phone);
    }

    public static function getHref($link)
    {
        if (str_starts_with($link, '##')) {
            return '#';
        }
        return $link;
    }

    public static function getLinkAttr($link)
    {
        if (str_starts_with($link, '##')) {
            $modalId = substr($link, 2);
            return 'data-modal-ajax-open="' . $modalId . '"';
        }
        return '';
    }

    public static function formatDate($obDate, $skipYear = false)
    {
        if ($obDate instanceof Date || $obDate instanceof DateTime) {
            $day = $obDate->format('d');
            $month = $obDate->format('n');
            $str = $day . ' ' . static::getMonthName($month)[1];
            if (!$skipYear) {
                $year = $obDate->format('Y');
                $str .= ' ' . $year;
            }
            return $str;
        }
        return '';
    }

    public static function formatDateStr($dateStr, $skipYear = false)
    {
        if (!$dateStr) {
            return '';
        }
        $obDate = new DateTime($dateStr);
        return static::formatDate($obDate, $skipYear);
    }

    public static function getMonthName($numMonth)
    {
        $monthes = [
            ['январь', 'января'],
            ['февраль', 'февраля'],
            ['март', 'марта'],
            ['апрель', 'апреля'],
            ['май', 'мая'],
            ['июнь', 'июня'],
            ['июль', 'июля'],
            ['август', 'августа'],
            ['сентябрь', 'сентября'],
            ['октябрь', 'октября'],
            ['ноябрь', 'ноября'],
            ['декабрь', 'декабря'],
        ];
        return $monthes[$numMonth - 1];
    }

    public static function getNoPhoto()
    {
        return '/local/img/no-photo.png';
    }

    public static function formatPrice($price) {
        if(!$price) {
            return 'Цена по запросу';
        }
        $decimals = 0;
        if($price - (int)$price) {
            $decimals = 2;
        }
        return number_format($price, $decimals, '.', ' ') . ' ₽';
    }

    public static function getNavPaginationPath ( $nav, $page )
    {
        global $APPLICATION;
        if ($nav->NavPageNomer == $page)
        {
            $url = 'javascript:void(0)';
        }
        else
        {
            if ((int)$nav->NavNum)
            {
                $url = $APPLICATION->getCurPageParam( 'PAGEN_' . $nav->NavNum . '=' . $page, [ 'PAGEN_' . $nav->NavNum, 'bxajaxid' ] );
            }
            else
            {
                $url = $APPLICATION->getCurPageParam( $nav->NavNum . '=page-' . $page, [ $nav->NavNum, 'bxajaxid' ] );
            }
        }

        return $url;
    }

    public static function formatFileSize($size) {
        $a = $size;
        if(!$size) {
            return '0 Б';
        }
        if($size < 1000) {
            return $size . ' Б';
        }
        $size = round($size / 1024, 0);
        if($size < 1000) {
            return $size . ' КБ';
        }
        $size = round($size / 1024, 1);
        if($size < 1000) {
            return $size . ' МБ';
        }
        $size = round($size / 1024, 1);
        return $size . ' ГБ';
    }
}