<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('user/prepend.php');

/*このページに関してはシンプルにユーザーを作成する
但しセキュリティは最高に設定
リファラー、IP制限、できることはすべて*/

if ($_SERVER['HTTP_REFERER'] == KUJAPANURLSSL.'/payment/alipay'){
    //アカウント+パスワード発行
    //IP制限が必要

    //以下をアリペイからもらう
    $trade_status = 0;
    $trade_no = a10000;

    //ユーザー仮登録///////////////////////////
    require_once('user/handle.php');
    $user_handle = new userHandle();
    $uid = $user_handle->addRow($trade_status,$trade_no);
    $password = $user_handle->parameter->password;
    
    //アカウント更新.uidがないとお客様番号を生成できない
    require_once('user/handle.php');
    $user_handle = new userHandle();
    $user_handle->updateAccountRow($uid);
    $account = $user_handle->parameter->account;

    //tmp regist
    $regist_handle = new tmpRegistHandle();
    $regist_handle->addRow($uid,$account,$password);

    //$con->safeExitRedirect('/payment/input/code/'.$regist_handle->parameter->rand);
    $con->safeExitRedirect('/payment/finish/code/'.$regist_handle->parameter->rand,TRUE);//SSL
}
$con->safeExitRedirect('/');//不正
?>
