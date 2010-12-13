<?php
require_once('user/prepend.php');

$grid = $con->base->getPath('grid',TRUE);//リダイレクトあり

if(!$grid){
    require_once('fw/errorManager.php');
    errorManager::throwError(E_CMMN_URL_WRONG);
}

//group
require_once('group/logic.php');
$g_logic = new groupLogic();
$group = $g_logic->getRow($grid);

if($group){
    $con->t->assign('group',$group);
}else{
    require_once('fw/errorManager.php');
    errorManager::throwError(E_CMMN_URL_WRONG);
}

//テンプレートファイル存在チェック
if(!is_file(SPECIAL_PATH.$group[0]['col_template_name'].'.tpl')){
    require_once('fw/errorManager.php');
    errorManager::throwError(E_CMMN_URL_WRONG);
}

//localeファイル指定
$con->getLocaleFile('/special/'.$group[0]['col_template_name']);

//現在のクーポンリストを生成
if(isset($group[0]['col_serialize_special_cooupon'])){
    $special_array = unserialize($group[0]['col_serialize_special_cooupon']);
    if(is_array($special_array) && count($special_array) > 0){
        require_once('coupon/logic.php');
        $c_logic = new couponLogic();
        //$c_logic->setIndexColumn(DATABASE_OID_NAME);//index入れ替え
        $coupon = $c_logic->getSpecialCoupon($grid,$special_array);
        $con->t->assign('coupon',$coupon);
    }
}

/*
特集ページのクーポンは任意で選ぶため、プログラム側で制御する必要はなし

//groupクーポン
require_once('coupon/logic.php');
$c_logic = new couponLogic();
$coupon = $c_logic->getGroupCoupon($grid);

if($coupon){
    $con->t->assign('sid',$coupon[0]['col_sid']);
    $con->t->assign('coupon',$coupon);
}
//group shop アイテム
require_once('shop/logic.php');
$item_logic = new shopItemLogic();
$shop_item = $item_logic->getGroupShopItem($grid);
if($shop_item) $con->t->assign('shop_item',utilManager::getShopItemArray($shop_item));

//group
require_once('group/logic.php');
$gr_logic = new groupLogic();
$gr_logic->setIndexColumn(DATABASE_OID_NAME);//index入れ替え
$group = $gr_logic->getResult();//group


*/

//position
commonPosition::makeFirstPosition
(
    KUJAPANURL.'/special/group/grid/'.$grid,
    $group[0]['col_name']
);

//locale 変更
$con->updateLocaleValue('h1',$group[0]['col_name']);

$con->append('special/group/'.$group[0]['col_template_name']);
?>
