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
$tmp_regist = TRUE;
//使用者未登録状態の場合、tmpRegistの情報も必要
if(strcasecmp($user[0]['col_status'],STATUS_USER_TMP) == 0 || strlen($user[0]['col_given_name']) == 0){
    $tr_logic = new tmpRegistLogic();
    $tmp_regist = $tr_logic->getUserTmpRegist($uid);
    $con->t->assign('republish_type','reset');
}else{
    $con->t->assign('republish_type','continue');
}

if(!$tmp_regist){
    require_once('fw/errorManager.php');
    errorManager::throwError(E_CMMN_USER_EXISTS);
}

$con->t->assign('user',$user);

$page = 'view';
if ( $con->isPost ){
    $check_result = FALSE;
    //お客様番号、アカウント、アリペイID、取引番号この3つが必ずあること
    if(strlen($user[0]['col_customer_no']) > 0 && strlen($user[0]['col_account']) > 0 && strlen($user[0]['col_buyer_id']) > 0 && strlen($user[0]['col_trade_no']) > 0){
        $check_result = TRUE;
    }
    
    if($_POST['operation'] == 'check'){
        $page = $check_result ? 'confirm' : 'view';
    }elseif($_POST['operation'] == 'back'){
        $page = 'view';
    }elseif($_POST['operation'] == 'regist'){
        if($check_result){
            //ユーザー再発行///////////////////////////
            require_once('user/handle.php');
            $user_handle = new userHandle();

            if(strcasecmp($user[0]['col_status'],STATUS_USER_REGIST) == 0 && strlen($user[0]['col_given_name']) > 0){
                //再発行の手法を選択 使用者登録が済んでいる場合はそのまま流用する
                $user_handle->republishContinueRow($uid);//流用して再発行
            }else{
                //再発行の手法を選択 使用者登録が済んでいない場合はユーザー情報及びtmpRegistを初期化
                $user_handle->republishResetRow($uid);//初期化して再発行

                //tmp regist rollback
                $regist_handle = new tmpRegistHandle();
                $regist_handle->rollbackRow($tmp_regist[0]['_id'],$user[0]['col_account'],$user_handle->parameter->password);
            }
            $con->session->set($uid.'_password',$user_handle->parameter->password);
            $con->safeExitRedirect('/system/user/finish/uid/'.$uid,TRUE);
        }else{
            $con->safeExitRedirect('/system/user/',TRUE);
        }

    }
}

//共通処理////////////////////////

$con->append('system/user/'.$page);
?>
