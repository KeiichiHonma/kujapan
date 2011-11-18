<?php
require_once('fw/tableManager.php');
class userTable extends tableManager
{
    static private $table_info = array
        (
            array('column'=>'_id',               'as'=>'user_id',   'type'=>MINIMUM,  'input'=>FALSE, 'group'=>null),
            array('column'=>'ctime',             'as'=>null,        'type'=>COMMON,    'input'=>FALSE, 'group'=>null),
            array('column'=>'mtime',             'as'=>null,        'type'=>COMMON,    'input'=>FALSE, 'group'=>null),
            array('column'=>'account',           'as'=>null,        'type'=>COMMON, 'input'=>FALSE, 'group'=>null),
            array('column'=>'password',          'as'=>null,        'type'=>COMMON, 'input'=>FALSE, 'group'=>null),
            array('column'=>'salt',              'as'=>null,        'type'=>ALL,    'input'=>FALSE, 'group'=>null),
            array('column'=>'given_name',        'as'=>null,        'type'=>COMMON, 'input'=>TRUE,  'group'=>'customer'),
            array('column'=>'customer_no',       'as'=>null,        'type'=>COMMON, 'input'=>TRUE,  'group'=>null),

            array('column'=>'coupon',            'as'=>null,        'type'=>COMMON, 'input'=>FALSE, 'group'=>null),
            array('column'=>'status',            'as'=>null,        'type'=>COMMON, 'input'=>FALSE, 'group'=>null),

            array('column'=>'trade_no',          'as'=>null,        'type'=>COMMON, 'input'=>FALSE, 'group'=>null),
            array('column'=>'out_trade_no',      'as'=>null,        'type'=>ALL,    'input'=>FALSE, 'group'=>null),
            array('column'=>'total_fee',         'as'=>null,        'type'=>COMMON, 'input'=>FALSE, 'group'=>null),
            array('column'=>'subject',           'as'=>null,        'type'=>ALL,    'input'=>FALSE, 'group'=>null),
            array('column'=>'seller_email',      'as'=>null,        'type'=>ALL,    'input'=>FALSE, 'group'=>null),
            array('column'=>'seller_id',         'as'=>null,        'type'=>ALL,    'input'=>FALSE, 'group'=>null),
            array('column'=>'buyer_email',       'as'=>null,        'type'=>COMMON, 'input'=>FALSE, 'group'=>null),
            array('column'=>'buyer_id',          'as'=>null,        'type'=>COMMON, 'input'=>FALSE, 'group'=>null),
            array('column'=>'trade_status',      'as'=>null,        'type'=>COMMON, 'input'=>FALSE, 'group'=>null),
            array('column'=>'notify_id',         'as'=>null,        'type'=>ALL,    'input'=>FALSE, 'group'=>null),
            array('column'=>'notify_time',       'as'=>null,        'type'=>ALL,    'input'=>FALSE, 'group'=>null),
            array('column'=>'notify_type',       'as'=>null,        'type'=>ALL,    'input'=>FALSE, 'group'=>null),
            array('column'=>'is_success',        'as'=>null,        'type'=>ALL,    'input'=>FALSE, 'group'=>null),
            array('column'=>'body',              'as'=>null,        'type'=>ALL,    'input'=>FALSE, 'group'=>null),
            array('column'=>'extra_common',      'as'=>null,        'type'=>ALL,    'input'=>FALSE, 'group'=>null),
            
            array('column'=>'pid',               'as'=>null,        'type'=>COMMON,    'input'=>FALSE, 'group'=>null),
            
            array('column'=>'last_login',        'as'=>null,        'type'=>COMMON, 'input'=>FALSE, 'group'=>null),
            array('column'=>'validate_time',     'as'=>null,        'type'=>COMMON, 'input'=>FALSE, 'group'=>null),
            array('column'=>'validate',          'as'=>null,        'type'=>COMMON, 'input'=>FALSE, 'group'=>null)
        );
    
    static public function get($type = COMMON){
        return parent::get(self::$table_info,$type);
    }

    //aliasあり
    //aliasありの場合、第2引数は配列となる
    static public function getAlias($type = COMMON){
        return parent::getAlias(self::$table_info,array('type'=>$type,'alias'=>A_USER));
    }

    static public function getInput(){
        return parent::getInput(self::$table_info);
    }
    
    static public function getCustomer(){
        return parent::getGroup(self::$table_info,'customer');
    }

}

class autoLoginTable extends tableManager
{
    static private $table_info = array
        (
            array('column'=>'_id',      'as'=>'autoLogin_id', 'type'=>COMMON, 'input'=>FALSE),
            array('column'=>'ctime',    'as'=>null,           'type'=>ALL,    'input'=>FALSE),
            array('column'=>'mtime',    'as'=>null,           'type'=>ALL,    'input'=>FALSE),
            array('column'=>'uid',      'as'=>null,           'type'=>COMMON, 'input'=>TRUE),
            array('column'=>'passport', 'as'=>null,           'type'=>COMMON, 'input'=>TRUE)
        );
    
    static public function get($type = COMMON){
        return parent::get(self::$table_info,$type);
    }

    //aliasあり
    //aliasありの場合、第2引数は配列となる
    static public function getAlias($type = COMMON){
        return parent::getAlias(self::$table_info,array('type'=>$type,'alias'=>A_AUTO));
    }

    static public function getInput(){
        return parent::getInput(self::$table_info);
    }
}

class tmpRegistTable extends tableManager
{
    static private $table_info = array
        (
            array('column'=>'_id',        'as'=>'tmpRegist_id', 'type'=>COMMON, 'input'=>FALSE),
            array('column'=>'ctime',      'as'=>null,           'type'=>COMMON,    'input'=>FALSE),
            array('column'=>'mtime',      'as'=>null,           'type'=>ALL,    'input'=>FALSE),
            array('column'=>'uid',        'as'=>null,           'type'=>COMMON, 'input'=>TRUE),
            array('column'=>'account',    'as'=>null,           'type'=>COMMON, 'input'=>FALSE),
            array('column'=>'password',   'as'=>null,           'type'=>COMMON, 'input'=>FALSE),
            array('column'=>'customer_no','as'=>null,           'type'=>COMMON, 'input'=>TRUE),
            array('column'=>'pid',        'as'=>null,           'type'=>COMMON, 'input'=>TRUE),
            array('column'=>'rand',       'as'=>null,           'type'=>COMMON, 'input'=>TRUE),
            array('column'=>'status',     'as'=>null,           'type'=>COMMON, 'input'=>TRUE)
        );
    
    static public function get($type = COMMON){
        return parent::get(self::$table_info,$type);
    }

    //aliasあり
    //aliasありの場合、第2引数は配列となる
    static public function getAlias($type = COMMON){
        return parent::getAlias(self::$table_info,array('type'=>$type,'alias'=>A_REGIST));
    }

    static public function getInput(){
        return parent::getInput(self::$table_info);
    }
}
?>