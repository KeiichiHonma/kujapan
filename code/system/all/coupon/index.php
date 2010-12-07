<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('manager/prepend.php');

require_once('coupon/logic.php');
$c_logic = new couponLogic(TRUE);
$con->base->changeSpValue(30);
$con->base->makeLimitTo();
$coupon = $c_logic->getCoupon($con->base->sp_limit['from'],$con->base->sp_limit['to']);
//ページ送り
$con->base->assignSp($c_logic->rows,'/system/all/coupon/index');

$con->t->assign('coupon',$coupon);//managerの全て

$con->append();
?>
