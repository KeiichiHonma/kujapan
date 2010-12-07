<?php

//--[ 前処理 ]--------------------------------------------------------------
require_once('user/prepend.php');
$con->session->set(SESSION_POSITION,$_SERVER['REQUEST_URI']);
$user_auth->validateLogin();//認証は必須ではありません
//logo
$logos = array
(
43,//セシルマクビー
1,//ドクターシーラボ
8,//DHC
22,//Ed Hardy
13,//ONODEN
3,//LAOX ヴィーナスフォート店
5,//BRAND OFF 銀座店
14,//坂善
21,//Folli Follie
'venus_fort_logo',
31//Folli Follie
);
$con->t->assign('logos',$logos);
$con->append();

?>
