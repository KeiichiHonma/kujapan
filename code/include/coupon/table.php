<?php
require_once('fw/tableManager.php');
class couponTable extends tableManager
{
    static private $table_info = array
        (
            array('column'=>'_id',           'as'=>'coupon_id',        'locale'=>null,      'type'=>MINIMUM, 'input'=>FALSE, 'group'=>null),
            array('column'=>'ctime',         'as'=>null,               'locale'=>null,      'type'=>ALL,     'input'=>FALSE, 'group'=>null),
            array('column'=>'mtime',         'as'=>null,               'locale'=>null,      'type'=>ALL,     'input'=>FALSE, 'group'=>null),
            array('column'=>'sid',          'as'=>null,               'locale'=>null,      'type'=>COMMON,  'input'=>FALSE, 'group'=>null),
            array('column'=>'discount_value','as'=>null,               'locale'=>null,      'type'=>COMMON,  'input'=>TRUE,  'group'=>null),
            array('column'=>'discount_ja',   'as'=>'coupon_discount',  'locale'=>LOCALE_JA, 'type'=>COMMON,  'input'=>TRUE,  'group'=>null),
            array('column'=>'discount_cn',   'as'=>'coupon_discount',  'locale'=>LOCALE_CN, 'type'=>COMMON,  'input'=>TRUE,  'group'=>null),
            array('column'=>'discount_tw',   'as'=>'coupon_discount',  'locale'=>LOCALE_TW, 'type'=>COMMON,  'input'=>TRUE,  'group'=>null),
            array('column'=>'title_ja',      'as'=>'coupon_title',     'locale'=>LOCALE_JA, 'type'=>COMMON,  'input'=>TRUE,  'group'=>null),
            array('column'=>'title_cn',      'as'=>'coupon_title',     'locale'=>LOCALE_CN, 'type'=>COMMON,  'input'=>TRUE,  'group'=>null),
            array('column'=>'title_tw',      'as'=>'coupon_title',     'locale'=>LOCALE_TW, 'type'=>COMMON,  'input'=>TRUE,  'group'=>null),
            array('column'=>'condition_ja',  'as'=>'coupon_condition', 'locale'=>LOCALE_JA, 'type'=>COMMON,  'input'=>TRUE,  'group'=>null),
            array('column'=>'condition_cn',  'as'=>'coupon_condition', 'locale'=>LOCALE_CN, 'type'=>COMMON,  'input'=>TRUE,  'group'=>null),
            array('column'=>'condition_tw',  'as'=>'coupon_condition', 'locale'=>LOCALE_TW, 'type'=>COMMON,  'input'=>TRUE,  'group'=>null),
            array('column'=>'validate_time', 'as'=>'coupon_condition', 'locale'=>null,      'type'=>COMMON,  'input'=>TRUE,  'group'=>null),
            array('column'=>'validate',      'as'=>'shop_validate', 'locale'=>null,      'type'=>COMMON,  'input'=>FALSE, 'group'=>null)
        );

    static public function get($type = COMMON){
        return parent::get(self::$table_info,$type);
    }

    //aliasあり
    //aliasありの場合、第2引数は配列となる
    static public function getAlias($type = COMMON){
        return parent::getAlias(self::$table_info,array('type'=>$type,'alias'=>A_COUPON));
    }

    static public function getLocale($type = COMMON){
        return parent::getLocale(self::$table_info,$type);
    }

    //aliasありの場合、第2引数は配列となる
    static public function getLocaleAlias($type = COMMON){
        return parent::getLocaleAlias(self::$table_info,array('type'=>$type,'alias'=>A_COUPON));
    }

    static public function getInput(){
        return parent::getInput(self::$table_info);
    }
}
class couponLogTable extends tableManager
{
    static private $table_info = array
        (
            array('column'=>'_id',              'as'=>'coupon_log_id',                  'locale'=>null,      'type'=>MINIMUM, 'input'=>FALSE, 'group'=>null),
            array('column'=>'ctime',            'as'=>'coupon_log_ctime',               'locale'=>null,      'type'=>COMMON,     'input'=>FALSE, 'group'=>null),
            array('column'=>'mtime',            'as'=>'coupon_log_mtime',               'locale'=>null,      'type'=>COMMON,     'input'=>FALSE, 'group'=>null),
            array('column'=>'cid',              'as'=>'coupon_log_cid',                 'locale'=>null,      'type'=>COMMON, 'input'=>FALSE, 'group'=>null),
            array('column'=>'coupon_ctime',     'as'=>'coupon_log_coupon_ctime',        'locale'=>null,      'type'=>COMMON,     'input'=>FALSE, 'group'=>null),
            array('column'=>'coupon_mtime',     'as'=>'coupon_log_coupon_mtime',        'locale'=>null,      'type'=>COMMON,     'input'=>FALSE, 'group'=>null),
            array('column'=>'sid',              'as'=>'coupon_log_sid',                 'locale'=>null,      'type'=>COMMON,  'input'=>TRUE, 'group'=>null),
            array('column'=>'discount_value',   'as'=>'coupon_log_discount_value',      'locale'=>null,      'type'=>COMMON,  'input'=>TRUE,  'group'=>null),
            array('column'=>'discount_ja',      'as'=>'coupon_log_discount_ja',         'locale'=>LOCALE_JA, 'type'=>COMMON,  'input'=>TRUE,  'group'=>null),
            array('column'=>'discount_cn',      'as'=>'coupon_log_discount_cn',         'locale'=>LOCALE_CN, 'type'=>COMMON,  'input'=>TRUE,  'group'=>null),
            array('column'=>'discount_tw',      'as'=>'coupon_log_discount_tw',         'locale'=>LOCALE_TW, 'type'=>COMMON,  'input'=>TRUE,  'group'=>null),
            array('column'=>'title_ja',         'as'=>'coupon_log_title_ja',            'locale'=>LOCALE_JA, 'type'=>COMMON,  'input'=>TRUE,  'group'=>null),
            array('column'=>'title_cn',         'as'=>'coupon_log_title_cn',            'locale'=>LOCALE_CN, 'type'=>COMMON,  'input'=>TRUE,  'group'=>null),
            array('column'=>'title_tw',         'as'=>'coupon_log_title_tw',            'locale'=>LOCALE_TW, 'type'=>COMMON,  'input'=>TRUE,  'group'=>null),
            array('column'=>'condition_ja',     'as'=>'coupon_log_condition_ja',        'locale'=>LOCALE_JA, 'type'=>COMMON,  'input'=>TRUE,  'group'=>null),
            array('column'=>'condition_cn',     'as'=>'coupon_log_condition_cn',        'locale'=>LOCALE_CN, 'type'=>COMMON,  'input'=>TRUE,  'group'=>null),
            array('column'=>'condition_tw',     'as'=>'coupon_log_condition_tw',        'locale'=>LOCALE_TW, 'type'=>COMMON,  'input'=>TRUE,  'group'=>null),
            array('column'=>'validate_time',    'as'=>'coupon_log_validate_time',       'locale'=>null,      'type'=>COMMON,  'input'=>TRUE,  'group'=>null),
            array('column'=>'validate',         'as'=>'coupon_log_validate',            'locale'=>null,      'type'=>COMMON,  'input'=>TRUE,  'group'=>null),
            array('column'=>'method',           'as'=>'coupon_log_method',              'locale'=>null,      'type'=>COMMON,  'input'=>FALSE, 'group'=>null),
        );

    static public function get($type = COMMON){
        return parent::get(self::$table_info,$type);
    }

    //aliasあり
    //aliasありの場合、第2引数は配列となる
    static public function getAlias($type = COMMON){
        return parent::getAlias(self::$table_info,array('type'=>$type,'alias'=>A_COUPON_LOG));
    }

    static public function getLocale($type = COMMON){
        return parent::getLocale(self::$table_info,$type);
    }

    //aliasありの場合、第2引数は配列となる
    static public function getLocaleAlias($type = COMMON){
        return parent::getLocaleAlias(self::$table_info,array('type'=>$type,'alias'=>A_COUPON_LOG));
    }

    static public function getInput(){
        return parent::getInput(self::$table_info);
    }
}
?>