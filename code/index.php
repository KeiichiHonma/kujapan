<?php
require_once('user/prepend.php');
require_once('coupon/logic.php');
$c_logic = new couponLogic();

//logo
$logos = array
(
//43,//セシルマクビー
1,//ドクターシーラボ
8,//DHC
22,//Ed Hardy
13,//ONODEN
3,//LAOX ヴィーナスフォート店
5,//BRAND OFF 銀座店
14,//坂善
21,//Folli Follie
'venus_fort_logo',
'matsuzakaya_logo',
'109_logo',
31,//Folli Follie
/*64,//XgirlstoreCATSTREET*/
);
$con->t->assign('logos',$logos);

//index coupon
$cids = array
(
20,//直輸入インポートブランド 秋冬新作衣料品 10%OFF
4,//ブランドバッグ、時計、宝石300,000円以上お買い上げで30,000円お値引（一部除外品あり）
19,//購入金額から10% OFF
3,//最高5%OFF、さらに10,001円（税抜）以上ご購入のお客様は免税！
1,//銀座本店で全品初回20%OFF
15,//店内全品５％OFF
);

$index_coupon = $c_logic->getIndexCoupon($cids);

$con->t->assign('index_coupon',$index_coupon);


//ジャンルで最大の値引きクーポン
/*$genre_max_coupon = $c_logic->getMaxDiscountGenreCoupon();
$con->t->assign('genre_max_coupon',$genre_max_coupon);*/

//エリアで最大の値引きクーポン
/*$area_max_coupon = $c_logic->getMaxDiscountAreaCoupon();
$con->t->assign('area_max_coupon',$area_max_coupon);*/

$con->append();

?>
