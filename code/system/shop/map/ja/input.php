<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('shop/prepend.php');

$page = 'input';
if ( $con->isPost ){
    $_POST['alt_'.LOCALE_JA] = $shop[0]['col_name_'.LOCALE_JA].'の日本語地図画像';
    $_POST['alt_'.LOCALE_CN] = $shop[0]['col_name_'.LOCALE_CN].'の日本語地図画像';
    $_POST['alt_'.LOCALE_TW] = $shop[0]['col_name_'.LOCALE_TW].'の日本語地図画像';
    
    require_once('shop/file.php');
    $shop_file = new shopItemFile(SHOP_TYPE_MAP_JA);
    if($shop_file->is_result) $con->safeExitRedirect('/system/shop/map/',TRUE);
}else{
    //アイテム情報
    $item_logic = new shopItemLogic(TRUE);
    $shop_item = $item_logic->getShopItem($shop[0]['_id'],SHOP_TYPE_MAP_JA);
    if($shop_item){
        $con->t->assign('siid',$shop_item[0]['shop_item_id']);
        $con->t->assign('shop_item',$shop_item);
    }
}

//position 店舗及びADMINで見るページが違います
systemPosition::makeShopPosition($shop[0]['col_name_ja']);

//共通処理////////////////////////

$con->append('system/shop/map/ja/'.$page);
?>
