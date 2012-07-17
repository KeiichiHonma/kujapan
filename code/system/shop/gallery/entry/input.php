<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('shop/prepend.php');
$sid = $con->base->getPath('sid',TRUE);//リダイレクトあり

$page = 'input';
if ( $con->isPost ){
    require_once('shop/file.php');
    $shop_file = new shopItemFile(SHOP_TYPE_GALLERY);
    if($shop_file->is_result) $con->safeExitRedirect('/system/shop/gallery/index/sid/'.$sid,TRUE);
}else{

}

//position 店舗及びADMINで見るページが違います
systemPosition::makeShopPosition($shop[0]['col_name']);

//共通処理////////////////////////

$con->append('system/shop/gallery/entry/'.$page);
?>
