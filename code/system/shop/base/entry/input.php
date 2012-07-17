<?php
//--[ 前処理 ]--------------------------------------------------------------
//require_once('shop/prepend.php');
require_once('manager/prepend.php');

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
        $_POST['aid'] = 0;
        $_POST['gid'] = 0;

        require_once('shop/handle.php');
        $shop_handle = new shopHandle();
        $shop_handle->addProfileRow($sid);
        
        $con->safeExitRedirect('/system/shop/base/index/sid/'.$sid,TRUE);
    }
}else{
    $_POST['name'] = 'name';
    $_POST['detail'] = 'detail';
    $_POST['address'] = 'address';
    $_POST['map'] = 'map';
    $_POST['open_hour'] = 'open_hour';
    $_POST['holiday'] = 'holiday';
    $_POST['url'] = 'url';
    $_POST['remarks'] = 'remarks';

    $_POST['c_title'] = 'c_title';
    $_POST['c_header'] = 'c_header';
    $_POST['c_detail'] = 'c_detail';
    $_POST['c_price'] = 'c_price';
    $_POST['c_usual_price'] = 'c_usual_price';
    $_POST['c_discount_rate'] = 'c_discount_rate';
    $_POST['c_discount_value'] = 'c_discount_value';
    $_POST['c_condition'] = 'c_condition';
}

//position 店舗及びADMINで見るページが違います
systemPosition::makeShopPosition($shop[0]['col_name']);

//共通処理////////////////////////

$con->append('system/shop/base/entry/'.$page);
?>
