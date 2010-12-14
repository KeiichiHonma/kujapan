<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('manager/prepend.php');
$uid = $con->base->getPath('uid',TRUE);//リダイレクトあり
require_once('user/logic.php');//manager
$u_logic = new userSystemLogic();
$user = $u_logic->getOneUser($uid);
if(!$user){
    require_once('fw/errorManager.php');
    errorManager::throwError(E_CMMN_USER_EXISTS);
}

$tr_logic = new tmpRegistLogic();
$tmp_regist = $tr_logic->getUserTmpRegist($uid);
if(!$tmp_regist){
    require_once('fw/errorManager.php');
    errorManager::throwError(E_CMMN_USER_EXISTS);
}

//メール送信
if(strlen($user[0]['col_buyer_email']) > 0){
    require_once('fw/mailManager.php');
    $mailManager = new mailManager();
    $mailManager->sendRegistUser($user[0]['col_buyer_email'],$user[0]['col_ctime'],$user[0]['col_customer_no'],$user[0]['col_account'],$tmp_regist[0]['col_password']);
}

$con->safeExitRedirect('/system/user/entry/finish/uid/'.$uid,TRUE);
?>
