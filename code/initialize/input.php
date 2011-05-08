<?php
require_once('user/prepend.php');
if($bl){
    $con->append('payment/done');
    die();
}
$rand = $con->base->getPath('code',FALSE);//パラメータなしはリダイレクト

if($rand === FALSE) $con->base->redirectPage();

require_once('user/logic.php');
$logic = new tmpRegistLogic();
$regist = $logic->getTmpRegist($rand);

$status = REGIST_WRONG;

//$page = 'judge';
$page = 'input';
//rand値が存在しない
if($regist === FALSE){
    //$status = REGIST_WRONG;
    require_once('fw/errorManager.php');
    errorManager::throwError(E_CMMN_URL_WRONG);
}else{
    switch ($regist[0]['col_status']){
    
    case REGIST_WAIT://未登録
        //ログイン用アカウント名+パスワード
        //$con->t->assign('account',$regist[0]['col_account']);
        //$con->t->assign('password',$regist[0]['col_password']);

        if ( $con->isPost ){
            if($_POST['operation'] == 'check'){
                require_once('user/check.php');
                checkEntry::checkError();
                $page = checkEntry::safeExit() ? 'confirm' : 'input';
            }elseif($_POST['operation'] == 'back'){
                $page = 'input';
            }elseif($_POST['operation'] == 'regist'){
                require_once('user/check.php');
                checkEntry::checkError();
                $bl = checkEntry::safeExit();
                if($bl){
                    //ユーザー有効化///////////////////////////
                    require_once('user/handle.php');
                    $user_handle = new userHandle();
                    $user_handle->updateValidateRow($regist[0]['col_uid']);

                    require_once('user/handle.php');
                    $regist_handle = new tmpRegistHandle();
                    
                    //ステータス更新
                    $reid = $regist_handle->updateStatusFinishRow($regist[0]['_id']);
                    $con->safeExit();
                    $status = REGIST_WAIT;

                    //ログイン
                    //$user_auth->login($regist[0]['col_account'],$regist[0]['col_password'],0);
                    $user_auth->loginEnforce($regist[0]['col_uid']);

                    $con->safeExitRedirect('/initialize/finish/code/'.$rand);
                }else{
                    $con->safeExitRedirect('/initialize/input');//不正
                }
            }
        }else{
            //debug//
            if($con->isDebug){
                $_POST['given_name'] = 'you';
                $_POST['mail'] = 'honma@zeus.corp.813.co.jp';
            }
        }

    break;

    case REGIST_FINISH://登録済
        //$status = REGIST_FINISH;
        require_once('fw/errorManager.php');
        errorManager::throwError(E_CMMN_URL_WRONG);
    break;

    default://不正
        //$status = REGIST_WRONG;
        require_once('fw/errorManager.php');
        errorManager::throwError(E_CMMN_URL_WRONG);
    break;
    }
    
}
$con->t->assign('rand',$rand);
$con->t->assign('status',$status);
$con->append('initialize/'.$page);
?>