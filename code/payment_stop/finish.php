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

//rand値が存在しない
if($regist === FALSE){
    //$status = REGIST_WRONG;
    require_once('fw/errorManager.php');
    errorManager::throwError(E_CMMN_URL_WRONG);
}else{
    switch ($regist[0]['col_status']){
        case REGIST_WAIT://未登録
            //表示用アカウント名+パスワード
            $con->t->assign('customer_no',$regist[0]['col_customer_no']);
            $con->t->assign('buy_time',$regist[0]['col_ctime']);
            $con->t->assign('login_account',$regist[0]['col_account']);
            $con->t->assign('login_password',$regist[0]['col_password']);
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
//$con->append('payment/'.$page);
$con->append();

?>
