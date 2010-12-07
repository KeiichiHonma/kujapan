<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('shop/prepend.php');
$cid = $con->base->getPath('cid',TRUE);//リダイレクトあり

//form情報アサイン
require_once('coupon/form.php');
$form = new couponForm();
$form->assignForm();

require_once('coupon/logic.php');//coupon
$c_logic = new couponLogic(TRUE);
$coupon = $c_logic->getOneCoupon($cid);
if(!$coupon){
    require_once('fw/errorManager.php');
    errorManager::throwError(E_SYSTEM_COUPON_EXISTS);
}
$con->t->assign('cid',$coupon[0]['_id']);

//$con->t->assign('coupon',$c_logic->getOneCoupon($cid));//couponの全て
$_POST['aid'] = $coupon[0]['col_aid'];
$_POST['gid'] = $coupon[0]['col_gid'];
$_POST['discount_value'] = $coupon[0]['col_discount_value'];
utilManager::setLocalePostPram('discount',$coupon[0]);
utilManager::setLocalePostPram('title',$coupon[0]);
utilManager::setLocalePostPram('detail',$coupon[0]);
utilManager::setLocalePostPram('condition',$coupon[0]);
$_POST['validate_time'] = $coupon[0]['col_validate_time'];

//position 店舗及びADMINで見るページが違います
systemPosition::makeShopPosition($shop[0]['col_name_ja']);

$con->append();
?>
