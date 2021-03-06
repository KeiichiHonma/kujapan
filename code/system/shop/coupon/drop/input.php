<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('shop/prepend.php');
$cid = $con->base->getPath('cid',TRUE);//リダイレクトあり

//権限チェック
//アクセス権
require_once('fw/access.php');
$accessApp = new applicationAccess();
$accessApp->isShopCoupon($cid);

//form情報アサイン
require_once('coupon/form.php');
$form = new couponForm();
$form->assignForm();

//クーポン情報
$c_logic = new couponLogic(TRUE);
$coupon = $c_logic->getOneCoupon($cid,ALL);//ログの記録でctime系も必要なためALL指定
if(!$coupon){
    require_once('fw/errorManager.php');
    errorManager::throwError(E_SYSTEM_COUPON_EXISTS);
}
$con->t->assign('cid',$coupon[0]['_id']);
$con->t->assign('coupon',$coupon);

$page = 'input';
if ( $con->isPost ){
    if($_POST['operation'] == 'check'){
        require_once('coupon/check.php');
        checkCoupon::checkError();
        $page = checkCoupon::safeExit() ? 'confirm' : 'input';
    }elseif($_POST['operation'] == 'back'){
        $page = 'input';
    }elseif($_POST['operation'] == 'regist'){
        require_once('coupon/check.php');
        checkCoupon::checkError();
        $bl = checkCoupon::safeExit();
        if($bl){
            //クーポン削除///////////////////////////
            require_once('coupon/handle.php');
            $coupon_handle = new couponHandle();
            $cid = $coupon_handle->deleteRow($cid);

            //クーポンログ登録///////////////////////////
            //削除の場合は無条件でログへ記録
            $coupon_log_handle = new couponLogHandle();
            $coupon_log_handle->addRow($coupon,COUPON_LOG_DROP);

            $con->safeExitRedirect('/system/shop/coupon/',TRUE);
        }else{
            $con->safeExitRedirect('/system/',TRUE);
        }

    }
}else{
    $_POST['aid'] = $coupon[0]['col_aid'];
    $_POST['gid'] = $coupon[0]['col_gid'];
    $_POST['discount_value'] = $coupon[0]['col_discount_value'];
    utilManager::setLocalePostPram('discount',$coupon[0]);
    utilManager::setLocalePostPram('title',$coupon[0]);
    utilManager::setLocalePostPram('detail',$coupon[0]);
    utilManager::setLocalePostPram('condition',$coupon[0]);
    $_POST['validate_time'] = $coupon[0]['col_validate_time'];
}

//position 店舗及びADMINで見るページが違います
systemPosition::makeShopPosition($shop[0]['col_name']);

//共通処理////////////////////////

$con->append('system/shop/coupon/drop/'.$page);
?>
