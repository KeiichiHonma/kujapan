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
            array('column'=>'name',             'as'=>'shop_name',        'locale'=>LOCALE_CN, 'type'=>COMMON,  'input'=>TRUE,  'group'=>'profile'),
            array('column'=>'detail',           'as'=>'shop_detail',      'locale'=>LOCALE_CN, 'type'=>COMMON,  'input'=>TRUE,  'group'=>'profile'),
            array('column'=>'address',          'as'=>null,     'locale'=>LOCALE_CN, 'type'=>COMMON,  'input'=>TRUE,  'group'=>'profile'),
            array('column'=>'map',              'as'=>null,     'locale'=>LOCALE_CN, 'type'=>COMMON,  'input'=>TRUE,  'group'=>'profile'),
            array('column'=>'open_hour',        'as'=>null,   'locale'=>LOCALE_CN, 'type'=>COMMON,  'input'=>TRUE,  'group'=>'profile'),
            array('column'=>'holiday',          'as'=>null,     'locale'=>LOCALE_CN, 'type'=>COMMON,  'input'=>TRUE,  'group'=>'profile'),
            array('column'=>'remarks',           'as'=>null,     'locale'=>LOCALE_CN, 'type'=>COMMON,  'input'=>TRUE,  'group'=>'profile'),
            array('column'=>'url',              'as'=>null,                  'locale'=>null,      'type'=>COMMON,  'input'=>TRUE,  'group'=>'profile'),
            
            //ここからクーポン情報
            array('column'=>'c_title',          'as'=>null,     'locale'=>LOCALE_CN, 'type'=>COMMON,  'input'=>TRUE,  'group'=>'profile'),
            array('column'=>'c_header',         'as'=>null,     'locale'=>LOCALE_CN, 'type'=>COMMON,  'input'=>TRUE,  'group'=>'profile'),//face下部のテキスト
            array('column'=>'c_detail',         'as'=>null,     'locale'=>LOCALE_CN, 'type'=>COMMON,  'input'=>TRUE,  'group'=>'profile'),//下部の詳細情報
            array('column'=>'c_price',          'as'=>null,     'locale'=>LOCALE_CN, 'type'=>COMMON,  'input'=>TRUE,  'group'=>'profile'),//価格
            array('column'=>'c_usual_price',    'as'=>null,     'locale'=>LOCALE_CN, 'type'=>COMMON,  'input'=>TRUE,  'group'=>'profile'),//通常価格
            array('column'=>'c_discount_rate',  'as'=>null,     'locale'=>LOCALE_CN, 'type'=>COMMON,  'input'=>TRUE,  'group'=>'profile'),//割引率
            array('column'=>'c_discount_value', 'as'=>null,     'locale'=>LOCALE_CN, 'type'=>COMMON,  'input'=>TRUE,  'group'=>'profile'),//割引額
            array('column'=>'c_condition',      'as'=>null,     'locale'=>LOCALE_CN, 'type'=>COMMON,  'input'=>TRUE,  'group'=>'profile'),//利用条件

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
            array('column'=>'sid',      'as'=>null,                 'locale'=>null,     'type'=>COMMON, 'input'=>FALSE),
            array('column'=>'fid',      'as'=>null,                 'locale'=>null,     'type'=>COMMON, 'input'=>FALSE),
            array('column'=>'detail',   'as'=>'shop_item_detail','locale'=>LOCALE_CN,'type'=>COMMON, 'input'=>TRUE),
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