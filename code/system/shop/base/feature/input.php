<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('shop/prepend.php');

//form情報アサイン
require_once('shop/form.php');
$form = new shopForm();
$form->assignFeatureForm();

$page = 'input';
if ( $con->isPost ){

    if($_POST['operation'] == 'check'){
        require_once('shop/check.php');
        checkShop::checkFeatureError();
        $page = checkShop::safeExit() ? 'confirm' : 'input';

    }elseif($_POST['operation'] == 'back'){
        $page = 'input';
    }elseif($_POST['operation'] == 'regist'){
        require_once('shop/handle.php');
        $shop_handle = new shopHandle();
        $shop_handle->updateSettingRow($shop[0]['col_setting'],'feature',$_POST['feature']);
        
        $con->safeExitRedirect('/system/shop/base/',TRUE);
    }
}else{
    //feature unserialize
    $serialize = unserialize($shop[0]['col_setting']);
    $feature = isset($serialize['feature']) ? $serialize['feature'] : array();
    $_POST['feature'] = $feature;
}

//position 店舗及びADMINで見るページが違います
systemPosition::makeShopPosition($shop[0]['col_name_ja']);

//共通処理////////////////////////

$con->append('system/shop/base/feature/'.$page);
?>
