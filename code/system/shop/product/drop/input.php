<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('shop/prepend.php');
$siid = $con->base->getPath('siid',TRUE);//リダイレクトあり

//権限チェック
//アクセス権
require_once('fw/access.php');
$accessApp = new applicationAccess();
$accessApp->isShopItem($siid);

//form情報アサイン
require_once('shop/form.php');
$form = new shopItemForm(SHOP_TYPE_PRODUCT);
$form->assignForm();

//スクールアイテム情報
$item_logic = new shopItemLogic(TRUE);
$shop_item = $item_logic->getOneShopItem($siid,SHOP_TYPE_PRODUCT);
if(!$shop_item){
    require_once('fw/errorManager.php');
    errorManager::throwError(E_SHOP_ITEM_EXISTS);
}

$con->t->assign('siid',$shop_item[0]['shop_item_id']);
$con->t->assign('shop_item',$shop_item);

$page = 'input';
if ( $con->isPost ){
    require_once('shop/file.php');
    $shop_file = new shopItemFile(SHOP_TYPE_PRODUCT);
    if($shop_file->is_result) $con->safeExitRedirect('/system/shop/product/',TRUE);
}else{
    utilManager::setLocalePostPram('title',$shop_item[0]);
    utilManager::setLocalePostPram('detail',$shop_item[0]);
}

//position 店舗及びADMINで見るページが違います
systemPosition::makeShopPosition($shop[0]['col_name_ja']);

//共通処理////////////////////////

$con->append('system/shop/product/drop/'.$page);
?>
