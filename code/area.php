<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('user/prepend.php');

$aid = $con->base->getPath('aid',TRUE);//リダイレクトあり
if(!array_key_exists($aid,$con->area->area_info)){
    require_once('fw/errorManager.php');
    errorManager::throwError(E_CMMN_URL_WRONG);
}

//area店舗
require_once('coupon/logic.php');
$c_logic = new couponLogic();
$con->base->makeLimitTo();
$coupon = $c_logic->getAreaCoupon($aid,$con->base->sp_limit['from'],$con->base->sp_limit['to']);
$con->t->assign('aid',$aid);
if($coupon){
    $con->t->assign('sid',$coupon[0]['col_sid']);
    $con->t->assign('coupon',$coupon);
    //ページ送り
    $con->base->assignSp($c_logic->rows,'/area/aid/'.$aid);
}

//areaでユニークな値
$con->t->assign('list_title',$con->area->area_info[$aid]['col_name']);
$con->t->assign('ref','area');

//position
commonPosition::makeFirstPosition
(
    KUJAPANURL.'/area/aid/'.$aid,
    $con->area->area_info[$aid]['col_name'].$con->locale['title_tail']
);

//locale 変更 [area_replace]で置換 渋谷/原宿/表参道
$area_string = str_replace('/',',',$con->area->area_info[$aid]['col_detail']);

$con->updateLocaleValue('keyword',str_replace('[area_replace]',$area_string,$con->locale[keyword]));
$con->updateLocaleValue('description',str_replace('[area_replace]',$area_string,$con->locale[description]));
$con->updateLocaleValue('title',str_replace('[area_replace]',$area_string,$con->locale[title]));
$con->updateLocaleValue('h1',str_replace('[area_replace]',$area_string,$con->locale[h1]));

$con->append('list');
?>
