<?php
if($con->isSystem){
    require_once('fw/error_code.php');
}else{
    require_once('locale/'.LOCALE.'/error_code.php');
}

class errorManager
{
    public $error = array();
    
    static public function throwError($error_code){
        global $con;
        
        $err['msg'] = constant($error_code);
        // Smartyへのアサイン
        $con->t->assign('errorlist', $err);

        // display it
        $con->t->assign('locale',$con->locale);
        $con->t->display('error.tpl');
        die();
    }
}
?>