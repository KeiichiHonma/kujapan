<?php
require_once('fw/tableManager.php');
class shopTable extends tableManager
{
    static private $table_info = array
        (
            array('column'=>'_id',              'as'=>'shop_id',          'locale'=>null,      'type'=>MINIMUM, 'input'=>FALSE, 'group'=>null),
            array('column'=>'ctime',            'as'=>null,                  'locale'=>null,      'type'=>ALL,     'input'=>FALSE, 'group'=>null),
            array('column'=>'mtime',            'as'=>null,                  'locale'=>null,      'type'=>ALL,     'input'=>FALSE, 'group'=>null),
            array('column'=>'mid',              'as'=>null,                  'locale'=>null,      'type'=>COMMON,  'input'=>FALSE, 'group'=>null),
            array('column'=>'aid',              'as'=>null,                  'locale'=>null,      'type'=>COMMON,  'input'=>TRUE,  'group'=>'profile'),
            array('column'=>'gid',              'as'=>null,                  'locale'=>null,      'type'=>COMMON,  'input'=>TRUE,  'group'=>'profile'),
            array('column'=>'name_ja',          'as'=>'shop_name',        'locale'=>LOCALE_JA, 'type'=>COMMON,  'input'=>TRUE,  'group'=>'profile'),
            array('column'=>'name_cn',          'as'=>'shop_name',        'locale'=>LOCALE_CN, 'type'=>COMMON,  'input'=>TRUE,  'group'=>'profile'),
            array('column'=>'name_tw',          'as'=>'shop_name',        'locale'=>LOCALE_TW, 'type'=>COMMON,  'input'=>TRUE,  'group'=>'profile'),
            array('column'=>'detail_ja',        'as'=>'shop_detail',      'locale'=>LOCALE_JA, 'type'=>COMMON,  'input'=>TRUE,  'group'=>'profile'),
            array('column'=>'detail_cn',        'as'=>'shop_detail',      'locale'=>LOCALE_CN, 'type'=>COMMON,  'input'=>TRUE,  'group'=>'profile'),
            array('column'=>'detail_tw',        'as'=>'shop_detail',      'locale'=>LOCALE_TW, 'type'=>COMMON,  'input'=>TRUE,  'group'=>'profile'),
            array('column'=>'address_ja',       'as'=>'shop_address',     'locale'=>LOCALE_JA, 'type'=>COMMON,  'input'=>TRUE,  'group'=>'profile'),
            array('column'=>'address_cn',       'as'=>'shop_address',     'locale'=>LOCALE_CN, 'type'=>COMMON,  'input'=>TRUE,  'group'=>'profile'),
            array('column'=>'address_tw',       'as'=>'shop_address',     'locale'=>LOCALE_TW, 'type'=>COMMON,  'input'=>TRUE,  'group'=>'profile'),
            array('column'=>'open_hour_ja',     'as'=>'shop_open_hour',   'locale'=>LOCALE_JA, 'type'=>COMMON,  'input'=>TRUE,  'group'=>'profile'),
            array('column'=>'open_hour_cn',     'as'=>'shop_open_hour',   'locale'=>LOCALE_CN, 'type'=>COMMON,  'input'=>TRUE,  'group'=>'profile'),
            array('column'=>'open_hour_tw',     'as'=>'shop_open_hour',   'locale'=>LOCALE_TW, 'type'=>COMMON,  'input'=>TRUE,  'group'=>'profile'),
            array('column'=>'holiday_ja',       'as'=>'shop_holiday',     'locale'=>LOCALE_JA, 'type'=>COMMON,  'input'=>TRUE,  'group'=>'profile'),
            array('column'=>'holiday_cn',       'as'=>'shop_holiday',     'locale'=>LOCALE_CN, 'type'=>COMMON,  'input'=>TRUE,  'group'=>'profile'),
            array('column'=>'holiday_tw',       'as'=>'shop_holiday',     'locale'=>LOCALE_TW, 'type'=>COMMON,  'input'=>TRUE,  'group'=>'profile'),
            array('column'=>'url',              'as'=>null,                  'locale'=>null,      'type'=>COMMON,  'input'=>TRUE,  'group'=>'profile'),
            array('column'=>'face',             'as'=>null,                  'locale'=>null,      'type'=>COMMON,  'input'=>FALSE, 'group'=>null),
            array('column'=>'setting',          'as'=>null,                  'locale'=>null,      'type'=>COMMON,  'input'=>FALSE, 'group'=>null),
            array('column'=>'index',            'as'=>null,                  'locale'=>null,      'type'=>COMMON,  'input'=>FALSE, 'group'=>null),
            array('column'=>'validate',         'as'=>'shop_validate',    'locale'=>null,      'type'=>COMMON,  'input'=>FALSE,'group'=>null)
        );

    static public function get($type = COMMON){
        return parent::get(self::$table_info,$type);
    }

    //aliasあり
    //aliasありの場合、第2引数は配列となる
    static public function getAlias($type = COMMON){
        return parent::getAlias(self::$table_info,array('type'=>$type,'alias'=>A_SHOP));
    }

    static public function getLocale($type = COMMON){
        return parent::getLocale(self::$table_info,$type);
    }

    //aliasありの場合、第2引数は配列となる
    static public function getLocaleAlias($type = COMMON){
        return parent::getLocaleAlias(self::$table_info,array('type'=>$type,'alias'=>A_SHOP));
    }

    static public function getInput(){
        return parent::getInput(self::$table_info);
    }
    
    static public function getProfile(){
        return parent::getGroup(self::$table_info,'profile');
    }
}

class shopItemTable extends tableManager
{
    static private $table_info = array
        (
            array('column'=>'_id',      'as'=>'shop_item_id',    'locale'=>null,     'type'=>MINIMUM,'input'=>FALSE),
            array('column'=>'ctime',    'as'=>null,                 'locale'=>null,     'type'=>COMMON, 'input'=>FALSE),
            array('column'=>'mtime',    'as'=>null,                 'locale'=>null,     'type'=>COMMON, 'input'=>FALSE),
            array('column'=>'sid',     'as'=>null,                 'locale'=>null,     'type'=>COMMON, 'input'=>FALSE),
            array('column'=>'fid',      'as'=>null,                 'locale'=>null,     'type'=>COMMON, 'input'=>FALSE),
            array('column'=>'detail_ja','as'=>'shop_item_detail','locale'=>LOCALE_JA,'type'=>COMMON, 'input'=>TRUE),
            array('column'=>'detail_cn','as'=>'shop_item_detail','locale'=>LOCALE_CN,'type'=>COMMON, 'input'=>TRUE),
            array('column'=>'detail_tw','as'=>'shop_item_detail','locale'=>LOCALE_TW,'type'=>COMMON, 'input'=>TRUE),
            array('column'=>'type',     'as'=>null,                 'locale'=>null,     'type'=>COMMON, 'input'=>FALSE)
        );
    
    static public function get($type = COMMON){
        return parent::get(self::$table_info,$type);
    }

    //aliasあり
    //aliasありの場合、第2引数は配列となる
    static public function getAlias($type = COMMON){
        return parent::getAlias(self::$table_info,array('type'=>$type,'alias'=>A_SHOP_ITEM));
    }

    static public function getLocale($type = COMMON){
        return parent::getLocale(self::$table_info,$type);
    }

    //aliasありの場合、第2引数は配列となる
    static public function getLocaleAlias($type = COMMON){
        return parent::getLocaleAlias(self::$table_info,array('type'=>$type,'alias'=>A_SHOP_ITEM));
    }

    static public function getInput(){
        return parent::getInput(self::$table_info);
    }
}
?>