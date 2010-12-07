<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('manager/prepend.php');

require_once('shop/logic.php');
$s_logic = new shopLogic(TRUE);
$con->base->changeSpValue(30);
$con->base->makeLimitTo();
$shop = $s_logic->getShop($con->base->sp_limit['from'],$con->base->sp_limit['to']);
//ページ送り
$con->base->assignSp($s_logic->rows,'/system/all/shop/index');

$con->t->assign('shop',$shop);//managerの全て

$con->append();
?>
