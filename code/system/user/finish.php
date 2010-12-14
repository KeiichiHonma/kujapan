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
$con->t->assign('user',$user);



//再発行の手法を選択 使用者登録が済んでいる場合はそのまま流用する
if(strcasecmp($user[0]['col_status'],STATUS_USER_REGIST) == 0 && strlen($user[0]['col_given_name']) > 0){
    $con->t->assign('republish_type','continue');
}else{
    $con->t->assign('republish_type','reset');
}
$con->t->assign('password',$con->session->get($uid.'_password'));
$con->session->delete($uid.'_password');
$con->append();
?>
