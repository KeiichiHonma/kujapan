<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('shop/prepend.php');

require_once('coupon/logic.php');//coupon
$c_logic = new couponLogic(TRUE);

$con->t->assign('coupon',$c_logic->getShopCoupon($manager_auth->sid));//couponの全て

//position 店舗及びADMINで見るページが違います
systemPosition::makeShopPosition($shop[0]['col_name_ja']);

$con->append();
?>
