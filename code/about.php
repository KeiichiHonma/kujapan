<?php
require_once('user/prepend.php');
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
$con->append();

?>
