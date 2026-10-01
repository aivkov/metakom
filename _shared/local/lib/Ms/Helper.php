<?php
namespace Ms;

use \Bitrix\Main\Loader;
use Bitrix\Main\Context;
use Bitrix\Main\SiteTable;

class Helper {
    public static function showFaviconsHtml() {
        $arSizes = ['512', '192', '180', '120', '32', '16'];

        $html = '';
        $docRoot = $_SERVER['DOCUMENT_ROOT'];
        if(file_exists($docRoot . '/favicon.ico')) {
            $html .= '<link rel="icon" href="/favicon.ico" type="image/x-icon" sizes="any">' . "\r\n";
        }
        foreach ($arSizes as $size) {
            $filePath = '/favicon-' . $size . '.png';
            if(file_exists($docRoot . $filePath)) {
                 $html .=  '<link rel="icon" type="image/png" sizes="' . $size . 'x' . $size . '" href="/favicon-' . $size .'.png">' . "\r\n";
            }
        }

        echo $html;
    }
}