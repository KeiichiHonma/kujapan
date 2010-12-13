<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('user/prepend.php');

$gid = $con->base->getPath('gid',TRUE);//リダイレクトあり
if(!array_key_exists($gid,$con->genre->genre_info)){
    require_once('fw/errorManager.php');
    errorManager::throwError(E_CMMN_URL_WRONG);
}

//genre店舗
require_once('coupon/logic.php');
$c_logic = new couponLogic();
$con->base->makeLimitTo();
$coupon = $c_logic->getGenreCoupon($gid,$con->base->sp_limit['from'],$con->base->sp_limit['to']);
$con->t->assign('gid',$gid);
if($coupon){
    $con->t->assign('sid',$coupon[0]['col_sid']);
    $con->t->assign('coupon',$coupon);
    //ページ送り
    $con->base->assignSp($c_logic->rows,'/genre/gid/'.$gid);
}

//ジャンルでユニークな値
$con->t->assign('list_title',$con->genre->genre_info[$gid]['col_name']);
$con->t->assign('ref','genre');

//position
commonPosition::makeFirstPosition
(
    KUJAPANURL.'/genre/gid/'.$gid,
    $con->genre->genre_info[$gid]['col_name'].$con->locale['title_tail']
);

//locale 変更 [genre_replace]で置換 渋谷/原宿/表参道
$genre_string = str_replace('/',',',$con->genre->genre_info[$gid]['col_detail']);

$con->updateLocaleValue('keyword',str_replace('[genre_replace]',$genre_string,$con->locale[keyword]));
$con->updateLocaleValue('description',str_replace('[genre_replace]',$genre_string,$con->locale[description]));
$con->updateLocaleValue('title',str_replace('[genre_replace]',$genre_string,$con->locale[title]));
$con->updateLocaleValue('h1',str_replace('[genre_replace]',$genre_string,$con->locale[h1]));

$con->append('list');
?>
