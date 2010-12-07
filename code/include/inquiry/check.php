<?php
require_once('fw/checkManager.php');

//check
class checkInquiry extends checkManager
{
    static private $check_list = array
    (
        'company'=>array
        (
            array('message'=>'！会社名は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>null,'func'=>'replaceInput','arg'=>'given_name')
        ),
        'division'=>array
        (
            array('message'=>'！部署名は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>null,'func'=>'replaceInput','arg'=>'given_name')
        ),
        'name'=>array
        (
            array('message'=>'！氏名は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>null,'func'=>'replaceInput','arg'=>'given_name')
        ),
        'kana'=>array
        (
            array('message'=>'！氏名（フリガナ）は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！カタカナ表記で入力してください。','func'=>'checkKana','arg'=>null),
            
            array('message'=>null,'func'=>'replaceInput','arg'=>'kana')
        ),
        'mail'=>array
        (
            array('message'=>'！メールアドレスは必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！メールアドレスが不正です。','func'=>'checkMail','arg'=>null)
        ),
        'telephone1'=>array
        (
            array('message'=>'！電話番号（左）は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！電話番号（左）が不正です。','func'=>'checkInt','arg'=>null)
        ),
        'telephone2'=>array
        (
            array('message'=>'！電話番号（真中）は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！電話番号（真中）が不正です。','func'=>'checkInt','arg'=>null)
        ),
        'telephone3'=>array
        (
            array('message'=>'！電話番号（右）は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！電話番号（右）が不正です。','func'=>'checkInt','arg'=>null)
        ),
/*        'postcode1'=>array
        (
            array('message'=>'！郵便番号（左）は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！郵便番号が不正です。','func'=>'checkInt','arg'=>null)
        ),
        'postcode2'=>array
        (
            array('message'=>'！郵便番号（右）は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！郵便番号が不正です。','func'=>'checkInt','arg'=>null)
        ),*/
        'address'=>array
        (
            array('message'=>'！住所は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>null,'func'=>'replaceInput','arg'=>'address')
        )
    );
            
    static public function checkError(){
        parent::checkSystemError(self::$check_list);
    }
}
?>