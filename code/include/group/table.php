<?php
require_once('fw/tableManager.php');
class groupTable extends tableManager
{
    static private $table_info = array
        (
            array('column'=>'_id',           'as'=>'group_id',      'locale'=>null,      'type'=>COMMON, 'input'=>FALSE),
            array('column'=>'ctime',         'as'=>null,            'locale'=>null,      'type'=>ALL,    'input'=>FALSE,),
            array('column'=>'mtime',         'as'=>null,            'locale'=>null,      'type'=>ALL,    'input'=>FALSE,),
            array('column'=>'name_ja',       'as'=>'col_name',      'locale'=>LOCALE_JA, 'type'=>COMMON, 'input'=>TRUE),
            array('column'=>'name_cn',       'as'=>'col_name',      'locale'=>LOCALE_CN, 'type'=>COMMON, 'input'=>TRUE),
            array('column'=>'name_tw',       'as'=>'col_name',      'locale'=>LOCALE_TW, 'type'=>COMMON, 'input'=>TRUE),
            array('column'=>'serialize_special_cooupon',         'as'=>null,            'locale'=>null,      'type'=>COMMON,    'input'=>FALSE,),
            array('column'=>'template_name', 'as'=>'template_name', 'locale'=>null,      'type'=>COMMON, 'input'=>TRUE)
        );

    static public function get($type = COMMON){
        return parent::get(self::$table_info,$type);
    }

    //aliasありの場合、第2引数は配列となる
    static public function getAlias($type = COMMON){
        return parent::getAlias(self::$table_info,array('type'=>$type,'alias'=>A_GROUP));
    }

    static public function getLocale($type = COMMON){
        return parent::getLocale(self::$table_info,$type);
    }

    //aliasありの場合、第2引数は配列となる
    static public function getLocaleAlias($type = COMMON){
        return parent::getLocaleAlias(self::$table_info,array('type'=>$type,'alias'=>A_GROUP));
    }

    static public function getInput(){
        return parent::getInput(self::$table_info);
    }
}

class groupRelationTable extends tableManager
{
    static private $table_info = array
        (
            array('column'=>'_id',      'as'=>'group_relation_id', 'type'=>COMMON,    'input'=>FALSE, 'group'=>null),
            array('column'=>'grid',     'as'=>null,                'type'=>COMMON,    'input'=>FALSE, 'group'=>null),
            array('column'=>'sid',     'as'=>null,                'type'=>COMMON,    'input'=>FALSE, 'group'=>null)
        );
    
    static public function get($type = COMMON){
        return parent::get(self::$table_info,$type);
    }

    //aliasあり
    //aliasありの場合、第2引数は配列となる
    static public function getAlias($type = COMMON){
        return parent::getAlias(self::$table_info,array('type'=>$type,'alias'=>A_GROUP_RELATION));
    }
}
?>