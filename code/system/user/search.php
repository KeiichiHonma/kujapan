<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('manager/prepend.php');

if(strlen(trim($_GET['keyword'])) > 0){
    require_once('user/logic.php');//manager
    $u_logic = new userSystemLogic();
    $con->base->makeLimitTo();
    $user = $u_logic->getSearch($_GET['keyword'],$con->base->sp_limit['from'],$con->base->sp_limit['to']);
    //ページ送り
    $con->base->assignSp($u_logic->rows,'/system/user/search');
    $con->t->assign('user',$user);
    $con->t->assign('keyword',$u_logic->keyword);
}

$con->append();
?>
