<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('user/prepend.php');
$bl = $user_auth->validateLogin();//認証は必須ではありません
if($bl){
    $con->append('payment/done');
    die();
}
$con->append();
?>
