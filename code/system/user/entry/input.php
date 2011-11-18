<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('manager/prepend.php');

//商品名を決める

$page = 'input';
if ( $con->isPost ){
    if($_POST['operation'] == 'check'){
        require_once('user/check.php');
        checkSystemEntry::checkError();
        $page = checkSystemEntry::safeExit() ? 'confirm' : 'input';
    }elseif($_POST['operation'] == 'back'){
        $page = 'input';
    }elseif($_POST['operation'] == 'regist'){
        require_once('user/check.php');
        checkSystemEntry::checkError();
        $bl = checkSystemEntry::safeExit();
        if($bl){
            //GETパラメータを生成する
            $_GET['trade_no'] = $_POST['trade_no'];//alipay画面で調査可能
            $_GET['out_trade_no'] = $_POST['out_trade_no'];//alipay画面で調査可能
            $_GET['total_fee'] = 99;
            $_GET['subject'] = $con->locale['alipay_product_title'];
            $_GET['seller_email'] = 'alipay@kujapan.com';
            $_GET['seller_id'] = 2088501340570641;
            $_GET['buyer_email'] = $_POST['buyer_email'];//alipay画面で調査可能
            $_GET['buyer_id'] = $_POST['buyer_id'];//alipay画面で調査可能
            $_GET['trade_status'] = 'TRADE_SUCCESS';
            $_GET['notify_id'] = 'system';
            $_GET['notify_time'] = 0;
            $_GET['notify_type'] = 0;
            $_GET['is_success'] = 'T';
            $_GET['body'] = $con->locale['alipay_product_detail'];
            $_GET['extra_common'] = '';

            require_once('fw/utilManager.php');
            utilManager::makeAlipayParam();

            require_once('user/handle.php');
            $user_handle = new userHandle();

            //ユーザー仮登録///////////////////////////
            require_once('user/handle.php');
            $user_handle = new userHandle();
            $uid = $user_handle->addRow(utilManager::$alipay_param);
            $buy_time = $user_handle->parameter->buy_time;
            $password = $user_handle->parameter->password;
            
            //チェック判断
            if(!$uid){
                print 'error1';
                die();
            }

            //意図的にnew
            $user_handle = new userHandle();
            $user_handle->updateAccountRow($uid);

            $account = $user_handle->parameter->account;
            $customer_no = $user_handle->parameter->customer_no;

            //tmp regist
            $regist_handle = new tmpRegistHandle();
            $reid = $regist_handle->addRow($uid,$customer_no,$account,$password);

            //チェック判断
            if(!$reid){
                print 'error2';
                die();
            }
            $con->safeExitRedirect('/system/user/entry/finish/uid/'.$uid,TRUE);

        }else{
            $con->safeExitRedirect('/system/user/',TRUE);
        }

    }
}else{
    //debug//
    if($con->isDebug){
        $_POST['trade_no']     = 2010121454711094;//alipay画面で調査可能
        $_POST['out_trade_no'] = 20101214101250;//alipay画面で調査可能
        $_POST['buyer_email']  = 'honma@zeus.corp.813.co.jp';//alipay画面で調査可能
        $_POST['buyer_id']     = 2088502583884942;//alipay画面で調査可能
    }
}

//共通処理////////////////////////

$con->append('system/user/entry/'.$page);
?>
