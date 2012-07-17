<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('shop/prepend.php');
$sid = $con->base->getPath('sid',TRUE);//リダイレクトあり

//form情報アサイン
require_once('shop/form.php');
$form = new shopForm();
$form->assignProfileForm();

$page = 'input';
if ( $con->isPost ){
    if($_POST['operation'] == 'check'){
        require_once('shop/check.php');
        checkShop::checkError();
        $page = checkShop::safeExit() ? 'confirm' : 'input';

    }elseif($_POST['operation'] == 'back'){
        $page = 'input';
    }elseif($_POST['operation'] == 'regist'){
        require_once('shop/handle.php');
        $shop_handle = new shopHandle();
        $shop_handle->updateProfileRow();
        
        $con->safeExitRedirect('/system/shop/base/index/sid/'.$sid,TRUE);
    }
}else{
    
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
}

//position 店舗及びADMINで見るページが違います
systemPosition::makeShopPosition($shop[0]['col_name']);

//共通処理////////////////////////

$con->append('system/shop/base/edit/'.$page);
?>
