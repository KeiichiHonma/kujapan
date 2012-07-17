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
$con->t->assign('siid',$shop_item[0]['shop_item_id']);
$con->t->assign('shop_item',$shop_item);

$page = 'input';
if ( $con->isPost ){
    //if(isset($_POST['title'])) $_POST['alt'] = $_POST['title'];
    require_once('shop/file.php');
    $shop_file = new shopItemFile(SHOP_TYPE_GALLERY);
    if($shop_file->is_result) $con->safeExitRedirect('/system/shop/gallery/index/sid/'.$sid,TRUE);
}

//position 店舗及びADMINで見るページが違います
systemPosition::makeShopPosition($shop[0]['col_name']);

//共通処理////////////////////////

$con->append('system/shop/gallery/edit/'.$page);
?>
