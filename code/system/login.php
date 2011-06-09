<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('manager/prepend.php');

//debug


if ( $con->isPost ){
    $manager_auth->login($_POST['mail'],$_POST['password']);
}else{
    //debug//
    if($con->isDebug){
        $_POST['mail'] = 'im@iluna.co.jp';
    }
    
}
//共通処理////////////////////////


// display it
$con->append();
?>
