<?php
require_once('user/prepend.php');
$bl = $user_auth->validateLogin();//認証は必須ではありません
/*if($bl){
    $con->append('payment/done');
    die();
}*/
$rand = $con->base->getPath('code',FALSE);//パラメータなしはリダイレクト

if($rand === FALSE) $con->base->redirectPage();

require_once('user/logic.php');
$logic = new tmpRegistLogic();
$regist = $logic->getTmpRegist($rand);

$status = REGIST_WRONG;

//$page = 'judge';
//$page = 'finish';
//rand値が存在しない
if($regist === FALSE){
    //$status = REGIST_WRONG;
    require_once('fw/errorManager.php');
    errorManager::throwError(E_CMMN_URL_WRONG);
}else{
    switch ($regist[0]['col_status']){
    
    case REGIST_WAIT://未登録
        //$status = REGIST_WAIT;
        require_once('fw/errorManager.php');
        errorManager::throwError(E_CMMN_URL_WRONG);
    break;

    case REGIST_FINISH://登録済
        $status = REGIST_FINISH;

        require_once('user/logic.php');
        $logic = new userLogic();
        $user = $logic->getUser($regist[0]['col_uid']);
        $con->t->assign('validate_time',$user[0]['col_validate_time']);
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
$con->append();
?>