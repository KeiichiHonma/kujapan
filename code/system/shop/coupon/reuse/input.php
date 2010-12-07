<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('shop/prepend.php');
$cid = $con->base->getPath('cid',TRUE);//リダイレクトあり

require_once('coupon/logic.php');//coupon
$c_logic = new couponLogic(TRUE);
$coupon = $c_logic->getOneCoupon($cid);
if(!$coupon){
    require_once('fw/errorManager.php');
    errorManager::throwError(E_SYSTEM_COUPON_EXISTS);
}

//form情報アサイン
require_once('coupon/form.php');
$form = new couponForm();
$form->assignForm();

$page = 'input';
if ( $con->isPost ){
    if($_POST['operation'] == 'check'){
        //日時を成形
        $_POST['validate_time'] = mktime(23, 59, 59, $_POST['date_Month'],$_POST['date_Day'],$_POST['date_Year']);
        
        require_once('coupon/check.php');
        checkCoupon::checkError();
        $page = checkCoupon::safeExit() ? 'confirm' : 'input';
    }elseif($_POST['operation'] == 'back'){
        $page = 'input';
        $_POST['validate_time'] = mktime(23, 59, 59, $_POST['date_Month'],$_POST['date_Day'],$_POST['date_Year']);
    }elseif($_POST['operation'] == 'regist'){
        require_once('coupon/check.php');
        checkCoupon::checkError();
        $bl = checkCoupon::safeExit();
        if($bl){
            //クーポン登録///////////////////////////
            require_once('coupon/handle.php');
            $coupon_handle = new couponHandle();
            $cid = $coupon_handle->addRow();
            
            $con->safeExitRedirect('/system/shop/coupon/',TRUE);
        }else{
            $con->safeExitRedirect('/system/',TRUE);
        }

    }
}else{
    $_POST['validate_time'] = $coupon[0]['col_validate_time'];
    $_POST['discount_value'] = $coupon[0]['col_discount_value'];
    utilManager::setLocalePostPram('discount',$coupon[0]);
    utilManager::setLocalePostPram('title',$coupon[0]);
    utilManager::setLocalePostPram('detail',$coupon[0]);
    utilManager::setLocalePostPram('condition',$coupon[0]);
/*    $_POST['discount_ja'] = $coupon[0]['col_discount_ja'];
    $_POST['discount_cn'] = $coupon[0]['col_discount_cn'];
    $_POST['discount_tw'] = $coupon[0]['col_discount_tw'];
    $_POST['title_ja'] = $coupon[0]['col_title_ja'];
    $_POST['title_cn'] = $coupon[0]['col_title_cn'];
    $_POST['title_tw'] = $coupon[0]['col_title_tw'];
    $_POST['detail_ja'] =$coupon[0]['col_detail_ja'];
    $_POST['detail_cn'] = $coupon[0]['col_detail_cn'];
    $_POST['detail_tw'] = $coupon[0]['col_detail_tw'];
    $_POST['condition_ja'] = $coupon[0]['col_condition_ja'];
    $_POST['condition_cn'] = $coupon[0]['col_condition_cn'];
    $_POST['condition_tw'] = $coupon[0]['col_condition_tw'];*/
}

//position 店舗及びADMINで見るページが違います
systemPosition::makeShopPosition($shop[0]['col_name_ja']);

//共通処理////////////////////////

$con->append('system/shop/coupon/entry/'.$page);
?>
