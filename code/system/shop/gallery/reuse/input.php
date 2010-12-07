<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('shop/prepend.php');
$siid = $con->base->getPath('siid',TRUE);//リダイレクトあり

//アイテム情報
$item_logic = new shopItemLogic(TRUE);
$shop_item = $item_logic->getOneShopItem($siid,SHOP_TYPE_GALLERY);
if(!$shop_item){
    require_once('fw/errorManager.php');
    errorManager::throwError(E_SHOP_ITEM_EXISTS);
}
//form情報アサイン
require_once('shop/form.php');
$form = new shopItemForm(SHOP_TYPE_GALLERY);
$form->assignForm();

$page = 'input';
if ( $con->isPost ){
    require_once('shop/file.php');
    $shop_file = new shopItemFile(SHOP_TYPE_GALLERY);
    if($shop_file->is_result) $con->safeExitRedirect('/system/shop/gallery/',TRUE);
}else{
    utilManager::setLocalePostPram('detail',$shop_item[0]);
}

//position 店舗及びADMINで見るページが違います
systemPosition::makeShopPosition($shop[0]['col_name_ja']);

//共通処理////////////////////////

$con->append('system/shop/gallery/entry/'.$page);
?>
