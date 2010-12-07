<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('shop/prepend.php');

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

}

//position 店舗及びADMINで見るページが違います
systemPosition::makeShopPosition($shop[0]['col_name_ja']);

//共通処理////////////////////////

$con->append('system/shop/product/entry/'.$page);
?>
