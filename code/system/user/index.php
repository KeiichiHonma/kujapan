<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('manager/prepend.php');
//require_once('./locale.php');

require_once('user/logic.php');//manager
$u_logic = new userSystemLogic();
//$u_logic->setIndexColumn(DATABASE_OID_NAME);//index入れ替え
$con->base->makeLimitTo();
$user = $u_logic->getUser($con->base->sp_limit['from'],$con->base->sp_limit['to']);
//ページ送り
$con->base->assignSp($u_logic->rows,'/system/user/index');
$con->t->assign('user',$user);
$con->append();
?>
