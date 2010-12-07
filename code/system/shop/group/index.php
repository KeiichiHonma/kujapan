<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('shop/prepend.php');

require_once('group/logic.php');
$gr_logic = new groupLogic(TRUE);

$con->t->assign('shop_group',$gr_logic->getShopGroup($shop[0]['_id']));//groupの全て

//position 店舗及びADMINで見るページが違います
systemPosition::makeShopPosition($shop[0]['col_name_ja']);

$con->append();
?>
