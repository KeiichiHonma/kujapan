<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('shop/prepend.php');

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

}

//position 店舗及びADMINで見るページが違います
systemPosition::makeShopPosition($shop[0]['col_name_ja']);

//共通処理////////////////////////

$con->append('system/shop/gallery/entry/'.$page);
?>
