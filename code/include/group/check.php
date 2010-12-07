<?php
require_once('fw/checkManager.php');

//entryは存在しない

class checkGroup extends checkManager
{
    static private $check_list = array
    (
        'name_ja'=>array
        (
            array('message'=>'！グループ名（日本語）は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！グループ名（日本語）は全角で40字(半角80字)以内で入力してください。','func'=>'checkLength','arg'=>array('start'=>1,'end'=>80)),
            array('message'=>null,'func'=>'replaceInput','arg'=>'name_ja')
        ),
        'name_cn'=>array
        (
            array('message'=>'！グループ名（簡体字）は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！グループ名（簡体字）は全角で40字(半角80字)以内で入力してください。','func'=>'checkLength','arg'=>array('start'=>1,'end'=>80)),
            array('message'=>null,'func'=>'replaceInput','arg'=>'name_cn')
        ),
        'name_tw'=>array
        (
            array('message'=>'！グループ名（繁体字）は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！グループ名（繁体字）は全角で40字(半角80字)以内で入力してください。','func'=>'checkLength','arg'=>array('start'=>1,'end'=>80)),
            array('message'=>null,'func'=>'replaceInput','arg'=>'name_tw')
        ),
        'template_name'=>array
        (
            array('message'=>'！テンプレート名は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！テンプレート名は全角で40字(半角80字)以内で入力してください。','func'=>'checkLength','arg'=>array('start'=>1,'end'=>80)),
            array('message'=>null,'func'=>'replaceInput','arg'=>'template_name')
        )
    );

    static public function checkError(){
        parent::checkSystemError(self::$check_list);
    }
}
?>