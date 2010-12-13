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
require_once('user/prepend.php');
$con->session->set(SESSION_POSITION,$_SERVER['REQUEST_URI']);
$bl = $user_auth->validateLogin();//認証は必須ではありません

//お知らせ
require_once('news/logic.php');
$n_logic = new newsLogic();
if($bl){
    $news = $n_logic->getUserNews();
}else{
    $news = $n_logic->getBuyBeforeNews();
}

$con->t->assign('news',$news);
?>