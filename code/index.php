<?php
require_once('user/prepend.php');
require_once('shop/logic.php');
$s_logic = new shopLogic();
//logo
$logos = array
(
43,//セシルマクビー
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

//index shop
$sids = array
(
5,//ブランドオフ銀座
68,//ソフマップ秋葉原
71,//ワンズ心斎橋
);

$index_shop = $s_logic->getIndexShop($sids);

$con->t->assign('index_shop',$index_shop);

$con->append();

?>
