<?php
require_once('user/prepend.php');

$sid = $con->base->getPath('sid',TRUE);

//店舗情報
require_once('shop/logic.php');
$s_logic = new shopLogic();
$shop = $s_logic->getOneShop($sid);
if($shop){
    $con->t->assign('shop',$shop);
}else{
    require_once('fw/errorManager.php');
    errorManager::throwError(E_CMMN_SHOP_EXISTS);
}

//店舗アイテム
require_once('shop/logic.php');
$item_logic = new shopItemLogic();
$slide_item = $item_logic->getAllShopItem($sid);
$con->t->assign('slide_item',$slide_item);

//position

//locale 変更 [shop_replace]で置換 渋谷/原宿/表参道
$con->updateLocaleValue('keyword',str_replace('[shop_replace]',$shop[0]['shop_name'],$con->locale[keyword]));
$con->updateLocaleValue('description',str_replace('[shop_replace]',$shop[0]['shop_name'],$con->locale[description]));
$con->updateLocaleValue('title',str_replace('[shop_replace]',$shop[0]['shop_name'],$con->locale[title]));
$con->updateLocaleValue('h1',str_replace('[shop_replace]',$shop[0]['shop_name'],$con->locale[h1]));

$con->append();

?>
