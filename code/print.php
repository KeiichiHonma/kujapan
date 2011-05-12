<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('user/prepend.php');
if(!$bl){
    $con->base->redirectPage('payment/bridge');
}

$sid = $con->base->getPath('sid',TRUE);
//認証は必須
if(!$user_auth->validateLogin()){
    $con->base->redirectPage('attetion');//購入を促す画面
}

//店舗情報
require_once('shop/logic.php');
$s_logic = new shopLogic();
$shop = $s_logic->getOneShop($sid);

if($shop){
    $con->t->assign('aid',$shop[0]['col_aid']);
    $con->t->assign('gid',$shop[0]['col_gid']);
    $con->t->assign('sid',$shop[0]['col_sid']);
    $con->t->assign('shop',$shop);
}else{
    require_once('fw/errorManager.php');
    errorManager::throwError(E_CMMN_SHOP_EXISTS);
}

//クーポン情報
require_once('coupon/logic.php');
$c_logic = new couponLogic();
$coupon = $c_logic->getShopCouponForPrint($sid);

if($coupon){
    //日本語と現地語に分ける
    foreach ($coupon as $key => $value){
        $coupon[$key]['coupon_title'] = $value['col_title_'.LOCALE];
        $coupon[$key]['coupon_condition'] = $value['col_condition_'.LOCALE];
    }

    
    $con->t->assign('coupon',$coupon);
}else{
    
}

//店舗アイテム
require_once('shop/logic.php');
$item_logic = new shopItemLogic();
$shop_item_tmp = $item_logic->getAllShopItem($coupon[0]['col_sid']);
if($shop_item_tmp){
    $shop_item = utilManager::getShopItemArray($shop_item_tmp);

    //map選択
    switch (LOCALE){
    case LOCALE_JA:
        $map_select = SHOP_TYPE_MAP_JA;
    break;
    case LOCALE_TW:
        $map_select = SHOP_TYPE_MAP_TW;
    break;
    default:
        $map_select = SHOP_TYPE_MAP_CN;
    break;
    }
    
    //地図幅調整
    $shop_item[$map_select]['col_width'] = 638;
    $shop_item[$map_select]['col_height'] = 638*$shop_item[$map_select]['col_height']/$shop_item[$map_select]['col_width'];
    $con->t->assign('shop_item_map',$shop_item[$map_select]);
    
    //バーコード
    if(isset($shop_item[SHOP_TYPE_BARCODE])){
        $con->t->assign('shop_item_barcode',$shop_item[SHOP_TYPE_BARCODE]);
    }
}

/*
管理番号
format sid + loop(cid) + お客様番号 + 印刷日時 - ハチワン起業日時
sid =1
cid = 5 6
客様番号 = 101325
印刷日時
2010/11/5
1288882800

ハチワン起業日時
2008/7/14
2008/7/14
1215961200

1288882800 - 1215961200 = 72921600;

1-101325-72921600
*/
$control_no = $sid.'-'.$user_auth->customer_no.'-'.utilManager::encodePrintCouponTime();

$con->t->assign('control_no',$control_no);

//locale 変更 [shop_replace]で置換 渋谷/原宿/表参道
$con->updateLocaleValue('keyword',str_replace('[shop_replace]',$shop[0]['shop_name'],$con->locale[keyword]));
$con->updateLocaleValue('description',str_replace('[shop_replace]',$shop[0]['shop_name'],$con->locale[description]));
$con->updateLocaleValue('title',str_replace('[shop_replace]',$shop[0]['shop_name'],$con->locale[title]));
$con->updateLocaleValue('h1',str_replace('[shop_replace]',$shop[0]['shop_name'],$con->locale[h1]));

$con->append();

?>
