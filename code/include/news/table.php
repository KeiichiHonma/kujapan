<?php
require_once('fw/tableManager.php');
class newsTable extends tableManager
{
    static private $table_info = array
        (
            array('column'=>'_id',          'as'=>'news_id',    'locale'=>null, 'type'=>MINIMUM,'input'=>FALSE),
            array('column'=>'ctime',        'as'=>null,         'locale'=>null,    'type'=>COMMON, 'input'=>FALSE),
            array('column'=>'mtime',        'as'=>null,         'locale'=>null,    'type'=>COMMON, 'input'=>FALSE),
            array('column'=>'target',       'as'=>null,         'locale'=>null,    'type'=>COMMON, 'input'=>TRUE),
            array('column'=>'from',         'as'=>null,         'locale'=>null,    'type'=>COMMON, 'input'=>TRUE),
            array('column'=>'to',           'as'=>null,         'locale'=>null,    'type'=>COMMON, 'input'=>TRUE),
            array('column'=>'date',         'as'=>null,         'locale'=>null,   'type'=>COMMON, 'input'=>TRUE),
            array('column'=>'title_ja',     'as'=>'col_title',  'locale'=>LOCALE_JA,    'type'=>COMMON, 'input'=>TRUE),
            array('column'=>'title_cn',     'as'=>'col_title',  'locale'=>LOCALE_CN,    'type'=>COMMON, 'input'=>TRUE),
            array('column'=>'title_tw',     'as'=>'col_title',  'locale'=>LOCALE_TW,    'type'=>COMMON, 'input'=>TRUE),
            array('column'=>'detail_ja',    'as'=>'col_detail', 'locale'=>LOCALE_JA,    'type'=>COMMON, 'input'=>TRUE),
            array('column'=>'detail_cn',    'as'=>'col_detail', 'locale'=>LOCALE_CN,    'type'=>COMMON, 'input'=>TRUE),
            array('column'=>'detail_tw',    'as'=>'col_detail', 'locale'=>LOCALE_TW,    'type'=>COMMON, 'input'=>TRUE),
            array('column'=>'url_ja',       'as'=>'col_url',    'locale'=>LOCALE_JA,    'type'=>COMMON, 'input'=>TRUE),
            array('column'=>'url_cn',       'as'=>'col_url',    'locale'=>LOCALE_CN,    'type'=>COMMON, 'input'=>TRUE),
            array('column'=>'url_tw',       'as'=>'col_url',    'locale'=>LOCALE_TW,    'type'=>COMMON, 'input'=>TRUE),
            array('column'=>'link',         'as'=>null,         'locale'=>null,    'type'=>COMMON, 'input'=>TRUE)
        );
    
    static public function get($type = COMMON){
        return parent::get(self::$table_info,$type);
    }

    //aliasあり
    //aliasありの場合、第2引数は配列となる
    static public function getAlias($type = COMMON){
        return parent::getAlias(self::$table_info,array('type'=>$type,'alias'=>A_NEWS));
    }

    static public function getLocale($type = COMMON){
        return parent::getLocale(self::$table_info,$type);
    }

    //aliasありの場合、第2引数は配列となる
    static public function getLocaleAlias($type = COMMON){
        return parent::getLocaleAlias(self::$table_info,array('type'=>$type,'alias'=>A_NEWS));
    }

    static public function getInput(){
        return parent::getInput(self::$table_info);
    }

}
?>