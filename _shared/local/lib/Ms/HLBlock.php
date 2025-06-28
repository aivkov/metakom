<?php

namespace Ms;

use \Bitrix\Highloadblock\HighloadBlockTable as HLBT;

class HLBlock
{
    public static function GetEntityDataClass ( $HlBlockId )
    {
        \CModule::IncludeModule( "highloadblock" );
        if (empty( $HlBlockId ) || $HlBlockId < 1)
        {
            return false;
        }
        $hlblock = HLBT::getById( $HlBlockId )->fetch();
        $entity = HLBT::compileEntity( $hlblock );
        $entityDataClass = $entity->getDataClass();

        return $entityDataClass;
    }

    public static function GetEntityDataClassByHbName ( $hbName )
    {
        \CModule::IncludeModule( "highloadblock" );
        $hlblock = \Bitrix\Highloadblock\HighloadBlockTable::getList( [ 'filter' => [ 'NAME' => $hbName ] ] )->Fetch();
        if ( !empty( $hlblock ))
        {
            $hlblock = \Bitrix\Highloadblock\HighloadBlockTable::getById( $hlblock['ID'] )->Fetch();
            \Bitrix\Highloadblock\HighloadBlockTable::compileEntity( $hlblock );

            return $hlblock['NAME'] . 'Table';
        }

        return '';
    }
}