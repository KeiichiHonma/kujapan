<?php

//--[ 前処理 ]--------------------------------------------------------------
require_once('user/prepend.php');
$con->session->set(SESSION_POSITION,$_SERVER['REQUEST_URI']);
$user_auth->validateLogin();//認証は必須ではありません

$con->append();

?>
