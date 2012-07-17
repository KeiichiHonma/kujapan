<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('shop/prepend.php');

//face画像
require_once('file/logic.php');
$file_logic = new filesLogic();
$shop_face = $file_logic->getRow($shop[0]['col_face']);
if($shop_face){
    $shop_face[0]['path'] = $con->base->getFilePath($shop_face[0]['_id'],$shop_face[0]['col_extension']) ;
    $con->t->assign('shop_face',$shop_face);
}

//visual + barcode
$item_logic = new shopItemLogic(TRUE);
$shop_item = $item_logic->getShopItem($shop[0]['_id'],array(SHOP_TYPE_VISUAL,SHOP_TYPE_BARCODE));
if($shop_item) $con->t->assign('shop_item',utilManager::getShopItemArray($shop_item));

//店舗情報
//form情報アサイン
require_once('shop/form.php');
$form = new shopForm();
$form->assignProfileForm();

$_POST['aid'] = $shop[0]['col_aid'];
$_POST['gid'] = $shop[0]['col_gid'];
$_POST['name'] = $shop[0]['col_name'];
$_POST['detail'] = $shop[0]['col_detail'];
$_POST['address'] = $shop[0]['col_address'];
$_POST['map'] = $shop[0]['col_map'];
$_POST['open_hour'] = $shop[0]['col_open_hour'];
$_POST['holiday'] = $shop[0]['col_holiday'];
$_POST['url'] = $shop[0]['col_url'];
$_POST['remarks'] = $shop[0]['col_remarks'];

$_POST['c_title'] = $shop[0]['col_c_title'];
$_POST['c_header'] = $shop[0]['col_c_header'];
$_POST['c_detail'] = $shop[0]['col_c_detail'];
$_POST['c_price'] = $shop[0]['col_c_price'];
$_POST['c_usual_price'] = $shop[0]['col_c_usual_price'];
$_POST['c_discount_rate'] = $shop[0]['col_c_discount_rate'];
$_POST['c_discount_value'] = $shop[0]['col_c_discount_value'];
$_POST['c_condition'] = $shop[0]['col_c_condition'];

//position
systemPosition::makeShopPosition($shop[0]['col_name']);


$con->append();
?>
