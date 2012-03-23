<?php
require_once('user/prepend.php');

if($bl){
    $con->append('payment/done');
    die();
}

//購入停止モード
if($con->ini['common']['isBuyStop'] == 1){
    //ilunaはOK
    if($con->ini['common']['isStage'] == 1){//ステージングサーバモード
        $ip = '192.168.0.52';
    }
    
    if($con->ini['common']['isDebug'] == 0){//本番
        $ip = '210.189.109.177';
    }
    
    if(!isset($_SERVER['REMOTE_ADDR']) || !isset($ip) || strcasecmp($_SERVER['REMOTE_ADDR'],$ip) != 0){
        header( "HTTP/1.1 302 Moved Temporarily" );
        header("Location: ".KUJAPANURL.'/payment/buystop');
        die();
    }
}

$con->append();
?>
