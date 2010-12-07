<?php
require_once('fw/tableManager.php');
class genreTable extends tableManager
{
    static private $table_info = array
        (
            array('column'=>'_id',       'as'=>'genre_id',     'locale'=>null,      'type'=>COMMON, 'input'=>FALSE),
            array('column'=>'name_ja',   'as'=>'col_name',     'locale'=>LOCALE_JA, 'type'=>COMMON, 'input'=>FALSE),
            array('column'=>'name_cn',   'as'=>'col_name',     'locale'=>LOCALE_CN, 'type'=>COMMON, 'input'=>FALSE),
            array('column'=>'name_tw',   'as'=>'col_name',     'locale'=>LOCALE_TW, 'type'=>COMMON, 'input'=>FALSE),
            array('column'=>'detail_ja', 'as'=>'col_detail',   'locale'=>LOCALE_JA, 'type'=>COMMON, 'input'=>FALSE),
            array('column'=>'detail_cn', 'as'=>'col_detail',   'locale'=>LOCALE_CN, 'type'=>COMMON, 'input'=>FALSE),
            array('column'=>'detail_tw', 'as'=>'col_detail',   'locale'=>LOCALE_TW, 'type'=>COMMON, 'input'=>FALSE),
        );

    static public function get($type = COMMON){
        return parent::get(self::$table_info,$type);
    }

    //aliasありの場合、第2引数は配列となる
    static public function getAlias($type = COMMON){
        return parent::getLocaleAlias(self::$table_info,array('type'=>$type,'alias'=>A_GENRE));
    }

    static public function getLocale($type = COMMON){
        return parent::getLocale(self::$table_info,$type);
    }

    //aliasありの場合、第2引数は配列となる
    static public function getLocaleAlias($type = COMMON){
        return parent::getLocaleAlias(self::$table_info,array('type'=>$type,'alias'=>A_GENRE));
    }
}
?>