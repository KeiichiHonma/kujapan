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

$con->t->assign('user',$user);
$con->t->assign('tmp_regist',$tmp_regist);

$con->append();
?>
