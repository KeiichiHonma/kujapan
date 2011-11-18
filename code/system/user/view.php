<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('manager/prepend.php');
$uid = $con->base->getPath('uid',TRUE);//リダイレクトあり

//partner
require_once('partner/logic.php');
$p_logic = new partnerLogic();

$con->t->assign('partner',$p_logic->partner_info);

require_once('user/logic.php');
$u_logic = new userSystemLogic();
$user = $u_logic->getOneUser($uid);
if(!$user){
    require_once('fw/errorManager.php');
    errorManager::throwError(E_CMMN_USER_EXISTS);
}

$con->t->assign('user',$user);
$con->t->assign('pid',$user[0]['col_pid']);

$con->append();
?>
