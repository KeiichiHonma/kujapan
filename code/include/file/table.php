<?php
require_once('fw/tableManager.php');
class filesTable extends tableManager
{
    static private $table_info = array
        (
            array('column'=>'_id',           'as'=>'file_id',     'type'=>COMMON,'input'=>FALSE),
            array('column'=>'ctime',         'as'=>null,          'type'=>DETAIL, 'input'=>FALSE),
            array('column'=>'mtime',         'as'=>null,          'type'=>DETAIL, 'input'=>FALSE),
            array('column'=>'name',          'as'=>null,          'type'=>DETAIL, 'input'=>FALSE),
            array('column'=>'size',          'as'=>null,          'type'=>DETAIL, 'input'=>FALSE),
            array('column'=>'mime',          'as'=>null,          'type'=>DETAIL, 'input'=>FALSE),
            array('column'=>'extension',     'as'=>null,          'type'=>COMMON, 'input'=>FALSE),
            array('column'=>'width',         'as'=>null,          'type'=>COMMON, 'input'=>FALSE),
            array('column'=>'height',        'as'=>null,          'type'=>COMMON, 'input'=>FALSE),
            array('column'=>'alt_ja',        'as'=>null,          'type'=>COMMON, 'input'=>FALSE),
            array('column'=>'alt_cn',        'as'=>null,          'type'=>COMMON, 'input'=>FALSE),
            array('column'=>'alt_tw',        'as'=>null,          'type'=>COMMON, 'input'=>FALSE)
        );
    
    static public function get($type = COMMON){
        return parent::get(self::$table_info,$type);
    }

    //aliasあり
    //aliasありの場合、第2引数は配列となる
    static public function getAlias($type = COMMON){
        return parent::getAlias(self::$table_info,array('type'=>$type,'alias'=>A_FILES));
    }

    static public function getInput(){
        return parent::getInput(self::$table_info);
    }
}
?>