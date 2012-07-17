<?php
require_once('user/prepend.php');
$sid = $con->base->getPath('sid',TRUE);

//店舗情報
require_once('shop/logic.php');
$s_logic = new shopLogic();
$shop = $s_logic->getOneShop($sid);
if($shop){
    $con->t->assign('shop',$shop);
}else{
    require_once('fw/errorManager.php');
    errorManager::throwError(E_CMMN_SHOP_EXISTS);
}

$page = 'input';
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
            //ユーザー追加///////////////////////////
            require_once('user/handle.php');
            $user_handle = new userHandle();
            $uid = $user_handle->addRow($_POST['mail'],$_POST['sid']);

            //購入画面URLメール送信
            require_once('fw/mailManager.php');
            $mailManager = new mailManager();
            $mailManager->sendRegistUser($_POST['mail'],$uid);
            $mailManager->sendRegistAdmin($_POST['mail'],$uid);
            
            $con->safeExitRedirect('/mail/finish');
        }else{
            $con->safeExitRedirect('/mail/input/sid/'.$sid);//不正
        }
    }
}else{
    //debug//
    if($con->isDebug){
        $_POST['mail'] = 'honma@zeus.corp.813.co.jp';
    }
}
$con->append('mail/'.$page);
?>