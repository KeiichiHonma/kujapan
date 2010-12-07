<?php
require_once('fw/checkManager.php');

class checkLogin extends checkManager
{
    static private $check_list = array
    (
/*        'mail'=>array
        (
            array('type'=>'must','func'=>'checkMust','arg'=>null),
            array('type'=>'validate','func'=>'checkMail','arg'=>null)
        ),*/
        'account'=>array
        (
            array('type'=>'must','func'=>'checkMust','arg'=>null)
        ),
        'password'=>array
        (
            array('type'=>'must','func'=>'checkMust','arg'=>null),
            array('type'=>'length','func'=>'checkLength','arg'=>array('start'=>4,'end'=>12)),
            array('type'=>'validate','func'=>'checkPassword','arg'=>null),
            array('type'=>null,'func'=>'replaceInput','arg'=>'password')
        )
    );

    static public function checkError(){
        parent::checkError(self::$check_list,null,'login');
    }
}

//entry check
class checkEntry extends checkManager
{
    static private $check_list = array
    (
        'given_name'=>array
        (
            array('type'=>'must','func'=>'checkMust','arg'=>null),
            array('type'=>'eigo','func'=>'checkEigo','arg'=>null),
            array('type'=>null,'func'=>'replaceInput','arg'=>'given_name')
        ),
        'mail'=>array
        (
            array('type'=>'must','func'=>'checkMust','arg'=>null),
            array('type'=>'validate','func'=>'checkMail','arg'=>null)
        )
    );
            
    static public function checkError(){
        parent::checkError(self::$check_list,'initialize','entry');
    }
}

//edit check
class checkEdit extends checkManager
{
    static private $check_list = array
    (
        'status'=>array
        (
            array('message'=>'！ステータスは必須です。','func'=>'checkMust','arg'=>null)
        ),
        'given_name'=>array
        (
            array('type'=>null,'func'=>'replaceInput','arg'=>'given_name')
        ),
        'customer_no'=>array
        (
            array('message'=>'！お客様番号は必須です。','func'=>'checkMust','arg'=>null),
            array('type'=>null,'func'=>'replaceInput','arg'=>'customer_no')
        ),
        'account'=>array
        (
            array('message'=>'！ログインアカウントは必須です。','func'=>'checkMust','arg'=>null),
            array('type'=>null,'func'=>'replaceInput','arg'=>'account')
        ),
        'trade_no'=>array
        (
            array('message'=>'！アリペイ番号は必須です。','func'=>'checkMust','arg'=>null),
            array('type'=>null,'func'=>'replaceInput','arg'=>'trade_no')
        ),
        'mail'=>array
        (
            array('message'=>'！メールアドレスが不正です。','func'=>'checkMail','arg'=>null)
        ),
        'validate'=>array
        (
            array('message'=>'！有効/停止は必須です。','func'=>'checkMust','arg'=>null)
        ),

    );

    static public function checkError(){
        //parent::checkSystemError(self::$check_list,'user','edit');
        parent::checkSystemError(self::$check_list);
    }
}
?>