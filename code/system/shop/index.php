<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('shop/prepend.php');

require_once('coupon/logic.php');//coupon
$c_logic = new couponLogic();//意図的にシステム拒否

$c_count = $c_logic->getCouponCount();

//店舗アイテム
require_once('shop/logic.php');
$item_logic = new shopItemLogic();
$item_gallery_count = $item_logic->getGalleryCount();
$item_product_count = $item_logic->getProductCount();

//logoの存在チェック
$logo_s = file_exists($_SERVER['DOCUMENT_ROOT'].LOGO_PATH.$shop[0]['_id'].'s.gif');//リトルサイズ
$logo_m = file_exists($_SERVER['DOCUMENT_ROOT'].LOGO_PATH.$shop[0]['_id'].'m.gif');//ミドルサイズ

//face画像
require_once('file/logic.php');
$file_logic = new filesLogic();
$shop_face = $file_logic->getRow($shop[0]['col_face']);

//visual + map
//$shop_visual = $item_logic->getShopItem($shop[0]['_id'],);
$shop_item = $item_logic->getShopItem($shop[0]['_id'],array(SHOP_TYPE_VISUAL,SHOP_TYPE_MAP_JA,SHOP_TYPE_MAP_CN,SHOP_TYPE_MAP_TW));

//有効ボタン表示可否
if(
    strlen($shop[0]['col_name_ja']) > 0 && strlen($shop[0]['col_name_cn']) > 0 && strlen($shop[0]['col_name_tw']) > 0 && 
    strlen($shop[0]['col_detail_ja']) > 0 && strlen($shop[0]['col_detail_cn']) > 0 && strlen($shop[0]['col_detail_tw']) > 0 && 
    strlen($shop[0]['col_address_ja']) > 0 && strlen($shop[0]['col_address_cn']) > 0 && strlen($shop[0]['col_address_tw']) > 0 && 
    strlen($shop[0]['col_open_hour_ja']) > 0 && strlen($shop[0]['col_open_hour_cn']) > 0 && strlen($shop[0]['col_open_hour_tw']) > 0 && 
    strlen($shop[0]['col_holiday_ja']) > 0 && strlen($shop[0]['col_holiday_cn']) > 0 && strlen($shop[0]['col_holiday_tw']) > 0 && 
    $c_count > 0 && 
    $item_gallery_count > 0 && 
    $item_product_count > 0 &&
    $logo_s != FALSE && 
    $logo_m != FALSE && 
    $shop_face != FALSE && 
    $shop_item != FALSE
  )
{
    $con->t->assign('isDisplay',TRUE);
}else{
    $con->t->assign('isDisplay',FALSE);
}
//position 店舗及びADMINで見るページが違います
systemPosition::makeShopPosition($shop[0]['col_name_ja']);
$con->append();
?>
