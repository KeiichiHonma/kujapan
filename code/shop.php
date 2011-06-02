<?php
require_once('user/prepend.php');

$sid = $con->base->getPath('sid',TRUE);
$ref = $con->base->getPath('ref',FALSE);

//店舗情報
require_once('shop/logic.php');
$s_logic = new shopLogic();
$shop = $s_logic->getOneShop($sid);

if($shop){
    $con->t->assign('aid',$shop[0]['col_aid']);
    $con->t->assign('gid',$shop[0]['col_gid']);
    $con->t->assign('sid',$shop[0]['col_sid']);
    $con->t->assign('shop',$shop);

    require_once('feature/logic.php');//area
    $feature_logic = new featureLogic();//smartyプラグインへ
}else{
    require_once('fw/errorManager.php');
    errorManager::throwError(E_CMMN_SHOP_EXISTS);
}

//クーポン情報
require_once('coupon/logic.php');
$c_logic = new couponLogic();
$coupon = $c_logic->getShopCoupon($sid);

if($coupon){
    $con->t->assign('coupon',$coupon);
}else{
    require_once('fw/errorManager.php');
    errorManager::throwError(E_CMMN_SHOP_EXISTS);
}

//店舗アイテム
require_once('shop/logic.php');
$item_logic = new shopItemLogic();
$shop_item_tmp = $item_logic->getAllShopItem($coupon[0]['col_sid']);
if($shop_item_tmp){
    //各タイプ別に整える
    $photos = array();
    $texts = array();
    $etc = array();
    
    foreach ($shop_item_tmp as $key => $value){
        if($value['col_type'] == SHOP_TYPE_GALLERY || $value['col_type'] == SHOP_TYPE_PRODUCT){
            $photos[$value['col_type']][] = array('file_id'=>$value['file_id'],'col_extension'=>$value['col_extension'],'col_width'=>$value['col_width'],'col_height'=>$value['col_height'],'col_alt'=>$value['col_alt']);
            $texts[$value['col_type']][] = array('shop_item_title'=>$value['shop_item_title'],'shop_item_detail'=>$value['shop_item_detail']);
        }else{
            $etc[$value['col_type']] = $value;
        }

    }
    
    //2個一変換
    if(isset($photos[SHOP_TYPE_GALLERY])){
        $con->t->assign('shop_item_gallery_photo',array_chunk($photos[SHOP_TYPE_GALLERY],2));
        $con->t->assign('shop_item_gallery_text',array_chunk($texts[SHOP_TYPE_GALLERY],2));
    }
    if(isset($photos[SHOP_TYPE_PRODUCT])){
    $con->t->assign('shop_item_product_photo',array_chunk($photos[SHOP_TYPE_PRODUCT],2));
    $con->t->assign('shop_item_product_text',array_chunk($texts[SHOP_TYPE_PRODUCT],2));
    }
    
    //map
    //$con->t->assign('shop_item_etc',$etc);
    
    //visual
    $con->t->assign('shop_item_visual',$etc[SHOP_TYPE_VISUAL]);
    
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
    
    //$con->t->assign('map_select',$map_select);
    $con->t->assign('shop_item_map',$etc[$map_select]);
}

//position
if(strcasecmp($ref,'area') == 0){
    $key = 'area';
    $oid = $shop[0]['col_aid'];
    commonPosition::makeFirstPosition
    (
        KUJAPANURL.'/area/aid/'.$shop[0]['col_aid'],
        $con->area->area_info[$shop[0]['col_aid']]['col_name']
    );
}elseif(strcasecmp($ref,'genre') == 0){
    $key = 'genre';
    $oid = $shop[0]['col_gid'];
    commonPosition::makeFirstPosition
    (
        KUJAPANURL.'/genre/gid/'.$shop[0]['col_gid'],
        $con->genre->genre_info[$shop[0]['col_gid']]['col_name']
    );
}else{
    $key = 'area';
    $oid = $shop[0]['col_aid'];
    commonPosition::makeFirstPosition
    (
        KUJAPANURL.'/area/aid/'.$shop[0]['col_aid'],
        $con->area->area_info[$shop[0]['col_aid']]['col_name']
    );
}


commonPosition::makeSecondPosition
(
    KUJAPANURL.'/shop/sid/'.$shop[0]['shop_id'].'/'.$key.'/'.$oid,
    $shop[0]['shop_name']
);

//locale 変更 [shop_replace]で置換 渋谷/原宿/表参道
$con->updateLocaleValue('keyword',str_replace('[shop_replace]',$shop[0]['shop_name'],$con->locale[keyword]));
$con->updateLocaleValue('description',str_replace('[shop_replace]',$shop[0]['shop_name'],$con->locale[description]));
$con->updateLocaleValue('title',str_replace('[shop_replace]',$shop[0]['shop_name'],$con->locale[title]));
$con->updateLocaleValue('h1',str_replace('[shop_replace]',$shop[0]['shop_name'],$con->locale[h1]));

$con->append();

?>
