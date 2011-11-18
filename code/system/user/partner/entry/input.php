<?php
require_once('manager/prepend.php');

require_once('user/form.php');
$form = new partnerForm();
$form->assignForm();

$page = 'input';
if ( $con->isPost ){

    //GETパラメータを生成する
    $_GET['trade_no'] = 0;//番号なし
    $_GET['out_trade_no'] = 0;//番号なし
    $_GET['total_fee'] = 99;
    $_GET['subject'] = $con->locale['alipay_product_title'];
    $_GET['seller_email'] = 'alipay@kujapan.com';
    $_GET['seller_id'] = 2088501340570641;
    $_GET['buyer_email'] = 'info@kujapan.com';
    $_GET['buyer_id'] = 0;//番号なし
    $_GET['trade_status'] = 'TRADE_SUCCESS';
    $_GET['notify_id'] = 'system';
    $_GET['notify_time'] = 0;
    $_GET['notify_type'] = 0;
    $_GET['is_success'] = 'T';
    $_GET['body'] = $con->locale['alipay_product_detail'];
    $_GET['extra_common'] = '';
    
    //追加項目
    $pid = $_POST['pid'];
    //$_POST['number'] = 5;
    
    for ($i=0;$i<$_POST['number'];$i++){
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

        //意図的にnew ここでアカウント名等更新している
        $user_handle = new userHandle();
        $isFree = TRUE;
        $user_handle->updateAccountRow($uid,$pid,$isFree);

        $account = $user_handle->parameter->account;
        $customer_no = $user_handle->parameter->customer_no;

        //tmp regist
        $regist_handle = new tmpRegistHandle();
        $reid = $regist_handle->addRow($uid,$customer_no,$account,$password,$pid);

        //チェック判断
        if(!$reid){
            print 'error2';
            die();
        }
    }
    


    $con->safeExitRedirect('/system/user/partner/entry/finish/pid/'.$pid.'/number/'.$_POST['number'],TRUE);

}

$con->append('system/user/partner/entry/'.$page);
?>
