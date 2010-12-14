<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('manager/prepend.php');
$uid = $con->base->getPath('uid',TRUE);//リダイレクトあり

require_once('user/logic.php');
$u_logic = new userSystemLogic();
$user = $u_logic->getOneUser($uid);

if(!$user){
    require_once('fw/errorManager.php');
    errorManager::throwError(E_CMMN_USER_EXISTS);
}
$tmp_regist = TRUE;
//使用者未登録状態の場合、tmpRegistの情報も必要
if(strcasecmp($_POST['status'],STATUS_USER_TMP) == 0){
    $tr_logic = new tmpRegistLogic();
    $tmp_regist = $tr_logic->getUserTmpRegist($uid);
}

if(!$tmp_regist){
    require_once('fw/errorManager.php');
    errorManager::throwError(E_CMMN_USER_EXISTS);
}

$con->t->assign('user',$user);

$page = 'input';
if ( $con->isPost ){
    if($_POST['operation'] == 'check'){
        //日時を成形
        $_POST['validate_time'] = mktime(23, 59, 59, $_POST['date_Month'],$_POST['date_Day'],$_POST['date_Year']);

        require_once('user/check.php');
        checkEdit::checkError();
        $page = checkEdit::safeExit() ? 'confirm' : 'input';
    }elseif($_POST['operation'] == 'back'){
        $page = 'input';
    }elseif($_POST['operation'] == 'regist'){
        require_once('user/check.php');
        checkEdit::checkError();
        $bl = checkEdit::safeExit();
        if($bl){
            require_once('user/handle.php');
            $user_handle = new userHandle();

            if(strcasecmp($_POST['status'],STATUS_USER_TMP) == 0){
                //未登録状態のため強制で書き換える
                $_POST['given_name'] = '';
                $_POST['validate_time'] = 0;
                $uid = $user_handle->updateResetRow($uid);
                
                //statusが未登録だったら、tmpRegistまでさかのぼって未登録、パスワード記録状態にもどさないとNG。正常に使用者登録できないと思う
                //tmp regist rollback
                $regist_handle = new tmpRegistHandle();
                $regist_handle->rollbackRow($tmp_regist[0]['_id'],$user[0]['col_account'],$user_handle->parameter->password);
                $con->safeExitRedirect('/system/user/edit/finish/uid/'.$uid,TRUE);
            }else{
                //自由に変更
                $uid = $user_handle->updateRow($uid);
                $con->safeExitRedirect('/system/user/view/uid/'.$uid,TRUE);
            }
            
            
        }else{
            $con->safeExitRedirect('/system/user/',TRUE);
        }

    }
}else{
    $_POST['status'] = $user[0]['col_status'];
    $_POST['given_name'] = $user[0]['col_given_name'];
    $_POST['buyer_email'] = $user[0]['col_buyer_email'];
    $_POST['customer_no'] = $user[0]['col_customer_no'];
    $_POST['account'] = $user[0]['col_account'];
    $_POST['buyer_id'] = $user[0]['col_buyer_id'];
    $_POST['trade_no'] = $user[0]['col_trade_no'];
    $_POST['validate'] = $user[0]['col_validate'];
    $_POST['validate_time'] = $user[0]['col_validate_time'];
    
}

//共通処理////////////////////////

$con->append('system/user/edit/'.$page);
?>
