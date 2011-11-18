<?php
//table
//user
define('T_USER',                  'kujapan.tab_kujapan_user');
define('A_USER',                  'u');
//partner
define('T_PARTNER',                  'kujapan.tab_kujapan_partner');
define('A_PARTNER',                  'p');
//member
define('T_MANAGER',               'kujapan.tab_kujapan_manager');
define('A_MANAGER',               'm');
//shop
define('T_SHOP',               'kujapan.tab_kujapan_shop');
define('A_SHOP',               's');
//shop
define('T_SHOP_ITEM',          'kujapan.tab_kujapan_shop_item');
define('A_SHOP_ITEM',          'si');

//autoLogin
define('T_AUTO',                  'kujapan.tab_kujapan_auto_login');
define('A_AUTO',                  'au');
//tmpRegist
define('T_REGIST',                'kujapan.tab_kujapan_tmp_regist');
define('A_REGIST',                'r');
//area
define('T_AREA',                  'kujapan.tab_kujapan_area');
define('A_AREA',                  'a');
//genre
define('T_GENRE',                 'kujapan.tab_kujapan_genre');
define('A_GENRE',                 'g');
//feature
define('T_FEATURE',               'kujapan.tab_kujapan_feature');
define('A_FEATURE',               'fe');
//group
define('T_GROUP',                 'kujapan.tab_kujapan_group');
define('A_GROUP',                 'gr');
//group_relation
define('T_GROUP_RELATION',        'kujapan.tab_kujapan_group_relation');
define('A_GROUP_RELATION',        'grr');

//coupon
define('T_COUPON',                'kujapan.tab_kujapan_coupon');
define('A_COUPON',                'c');

//coupon
define('T_COUPON_LOG',                'kujapan.tab_kujapan_coupon_log');
define('A_COUPON_LOG',                'cl');

//goodscore
define('T_COUPONSCORE',           'kujapan.tab_kujapan_score');
define('A_COUPONSCORE',           'cs');
//news
define('T_NEWS',                  'kujapan.tab_kujapan_news');
define('A_NEWS',                  'n');
//file
define('T_FILES',                 'kujapan.tab_kujapan_files');
define('A_FILES',                 'f');

//inquiry
define('T_INQUIRY',               'kujapan.tab_kujapan_inquiry');
define('A_INQUIRY',               'iq');

define('MINIMUM',        0);//最小カラム
define('COMMON',         1);//通常含めるカラム
define('DETAIL',         2);//詳細に含めるカラム
define('ALL',            3);//通常含めないカラム
require_once('fw/utilManager.php');
class tableManager
{
    static private $tmp_column;
    static private $tmp_as;
    static private $tmp_check;
    static private $tmp_alias;
    static private $tmp_locale;
    static protected $columns = null;
    
    static protected function get($table_info,$type){
        self::$columns = null;//init
        array_walk_recursive($table_info,array('tableManager','callbackTypeColumn'),$type);
        return self::$columns;
    }

    static protected function getAlias($table_info,$type_alias){
        self::$columns = null;//init
        array_walk_recursive($table_info,array('tableManager','callbackAliasColumn'),$type_alias);
        return self::$columns;
    }

    static protected function getLocale($table_info,$type){
        self::$columns = null;//init
        array_walk_recursive($table_info,array('tableManager','callbackLocaleTypeColumn'),$type);
        return self::$columns;
    }

    static protected function getLocaleAlias($table_info,$type_alias){
        self::$columns = null;//init
        array_walk_recursive($table_info,array('tableManager','callbackLocaleAliasColumn'),$type_alias);
        return self::$columns;
    }

    static protected function getInput($table_info){
        self::$columns = null;//init
        array_walk_recursive($table_info,array('tableManager','callbackInputColumn'));
        return self::$columns;
    }

    static protected function getGroup($table_info,$group){
        self::$columns = null;//init
        array_walk_recursive($table_info,array('tableManager','callbackGroupColumn'),$group);
        return self::$columns;
    }

    //任意指定
    static protected function getSpecial($table_info,$assign_columns){
        self::$columns = null;//init
        array_walk_recursive($table_info,array('tableManager','callbackSpecialColumn'),$assign_columns);
        return self::$columns;
    }

    //callback
    static private function callbackTypeColumn($item, $key,$type)
    {
        if($key == 'column') self::$tmp_column = $item;
        //指定type値以下の場合のみ取得カラムとなる
        if($key == 'type' && $item <= $type) self::$columns[] = utilManager::checkPrefix(self::$tmp_column);
    }
    //aliasあり
    static private function callbackAliasColumn($item, $key,$type_alias)
    {
        if($key == 'column') self::$tmp_column = $item;
        if($key == 'as') self::$tmp_as = $item;
        if($key == 'locale') self::$tmp_locale = $item;
        //指定type値以下の場合のみ取得カラムとなる
        if($key == 'type' && $item <= $type_alias['type']){
            //ロケール指定がなければASでセレクト
            if(is_null(self::$tmp_locale)){
                self::$columns[] = utilManager::checkPrefix(self::$tmp_column,self::$tmp_as,$type_alias['alias']);
            //ロケール指定があればASは無視じゃなかったら
            }else{
                self::$columns[] = utilManager::checkPrefix(self::$tmp_column,null,$type_alias['alias']);
            }
            
        }
    }

    static private function callbackLocaleTypeColumn($item, $key,$type)
    {
        if($key == 'column') self::$tmp_column = $item;
        if($key == 'as') self::$tmp_as = $item;//locale指定ではasが必須
        if($key == 'locale') self::$tmp_locale = $item;
        //指定type値以下,指定locale,localeがnullの場合のみ取得カラムとなる
        
        if($key == 'type' && $item <= $type){
            if(strcasecmp(self::$tmp_locale,LOCALE) == 0){
                //as
                self::$columns[] = utilManager::checkPrefix(self::$tmp_column,self::$tmp_as);
            }elseif(is_null(self::$tmp_locale)){
                self::$columns[] = utilManager::checkPrefix(self::$tmp_column);
            }
            //elseはあえてつくらない
        }
    }
    //aliasあり
    static private function callbackLocaleAliasColumn($item, $key,$type_alias)
    {
        if($key == 'column') self::$tmp_column = $item;
        if($key == 'as') self::$tmp_as = $item;
        if($key == 'locale') self::$tmp_locale = $item;
        //指定type値以下の場合のみ取得カラムとなる
        if($key == 'type' && $item <= $type_alias['type']  && (strcasecmp(self::$tmp_locale,LOCALE) == 0 || is_null(self::$tmp_locale))) self::$columns[] = utilManager::checkPrefix(self::$tmp_column,self::$tmp_as,$type_alias['alias']);
    }

    static private function callbackInputColumn($item, $key)
    {
        if($key == 'column') self::$tmp_column = $item;
        if($key == 'input' && $item == TRUE) self::$columns[] = self::$tmp_column;//prefixはつけない
    }

    //member edit での個別取得で必要
    static private function callbackGroupColumn($item,$key,$group)
    {
        if($key == 'column') self::$tmp_column = $item;
        if($key == 'group' && $item == $group) self::$columns[] = self::$tmp_column;//prefixはつけない
    }

    static private function callbackSpecialColumn($item, $key,$assign_columns)
    {
        if($key == 'column'){
            self::$tmp_check = null;//チェックリスト初期化
            self::$tmp_column = null;
            //指定したカラム配列と合致する場合のみ取得カラムとなる
            if(array_search($item,$assign_columns) !== FALSE) self::$tmp_column = $item;
        }
        if(is_numeric($key)) self::$tmp_check[] = $item;
        if(!is_null(self::$tmp_column)) self::$columns[self::$tmp_column] = self::$tmp_check;
    }
}
?>