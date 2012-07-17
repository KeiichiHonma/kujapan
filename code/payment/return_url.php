<?php
require_once('fw/container.php');
$con = new container();//dbアクセスします

if(!isset($_GET['uid']) || !is_numeric($_GET['uid'])){
    require_once('fw/errorManager.php');
    errorManager::throwError(E_CMMN_USER_EXISTS);
}

require_once("alipay/alipay_notify.php");
require_once("alipay/alipay_config.php");

//构造通知函数信息
$alipay = new alipay_notify($partner,$key,$sign_type,$_input_charset,$transport);
//计算得出通知验证结果
$verify_result = $alipay->return_verify();

if($verify_result) {//验证成功

    $dingdan           = $_GET['out_trade_no'];    //获取订单号
    $total_fee         = $_GET['total_fee'];        //获取总价格

    if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
        require_once('./make.php');
    }
    else {
        //緊急エラー送信///////////////////////////
        require_once('fw/mailManager.php');
        $mailManager = new mailManager();
        $mailManager->sendHalt(LOCALE.":ERROR: verify_result TRUE\n".'trade_status='.$_GET['trade_status']);
        
        header("Location: ".'http://'.$_SERVER['SERVER_NAME'].'/payment/error');
        die();
    }
}
else {
    //echo "fail";
    //緊急エラー送信///////////////////////////
    require_once('fw/mailManager.php');
    $mailManager = new mailManager();
    $mailManager->sendHalt(LOCALE.":ERROR: return_verify_result FALSE\n");
    
    header("Location: ".'http://'.$_SERVER['SERVER_NAME'].'/payment/error');
    die();
}
?>