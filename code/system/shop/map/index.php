<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('shop/prepend.php');

//アイテム情報
//map
$item_logic = new shopItemLogic(TRUE);
$shop_item = $item_logic->getShopItem($shop[0]['_id'],array(SHOP_TYPE_MAP_JA,SHOP_TYPE_MAP_CN,SHOP_TYPE_MAP_TW));

if($shop_item) $con->t->assign('shop_item',utilManager::getShopItemArray($shop_item));
//position 店舗及びADMINで見るページが違います
systemPosition::makeShopPosition($shop[0]['col_name_ja']);


$con->append();
?>
