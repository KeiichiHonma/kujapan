<?php
require_once('fw/prepend.php');
require_once('user/auth.php');

$user_auth = new userAuth();
commonPosition::makeSitePosition();
$con->readyPostCsrf();

if ( $con->isPost ){
    if($_POST['auth'] == 'login'){
        if(!isset($_POST['auto_login'])) $_POST['auto_login'] = 0;
        $user_auth->login($_POST['account'],$_POST['password'],$_POST['auto_login']);
        
    }elseif($_POST['auth'] == 'logout'){
        $user_auth->logout();
    }
}else{
    //debug//
    if($con->isDebug){
        //$_POST['account'] = 'k2IQ8NS';
    }
}

?>