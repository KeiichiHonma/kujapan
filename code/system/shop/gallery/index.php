<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('shop/prepend.php');

//スクールアイテム情報
$item_logic = new shopItemLogic(TRUE);
$shop_item = $item_logic->getShopItem($sid,SHOP_TYPE_GALLERY);
if($shop_item){
    $con->t->assign('shop_item',$shop_item);
}


//position 店舗及びADMINで見るページが違います
systemPosition::makeShopPosition($shop[0]['col_name']);

//共通処理////////////////////////

$con->append();
?>
