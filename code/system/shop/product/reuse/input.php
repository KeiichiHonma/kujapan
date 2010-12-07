<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('shop/prepend.php');
$siid = $con->base->getPath('siid',TRUE);//リダイレクトあり

//スクールアイテム情報
$item_logic = new shopItemLogic(TRUE);
$shop_item = $item_logic->getOneShopItem($siid,SHOP_TYPE_PRODUCT);

if(!$shop_item){
    require_once('fw/errorManager.php');
    errorManager::throwError(E_SHOP_ITEM_EXISTS);
}

//form情報アサイン
require_once('shop/form.php');
$form = new shopItemForm(SHOP_TYPE_PRODUCT);
$form->assignForm();

$page = 'input';
if ( $con->isPost ){
    $_POST['alt_'.LOCALE_JA] = $_POST['title_'.LOCALE_JA];
    $_POST['alt_'.LOCALE_CN] = $_POST['title_'.LOCALE_CN];
    $_POST['alt_'.LOCALE_TW] = $_POST['title_'.LOCALE_TW];
    
    require_once('shop/file.php');
    $shop_file = new shopItemFile(SHOP_TYPE_PRODUCT);
    if($shop_file->is_result) $con->safeExitRedirect('/system/shop/product/',TRUE);
}else{
    utilManager::setLocalePostPram('detail',$shop_item[0]);
}

//position 店舗及びADMINで見るページが違います
systemPosition::makeShopPosition($shop[0]['col_name_ja']);

//共通処理////////////////////////

$con->append('system/shop/product/entry/'.$page);
?>
