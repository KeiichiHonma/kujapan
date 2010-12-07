<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('shop/prepend.php');

//マネージャー情報
require_once('manager/logic.php');
$m_logic = new managerLogic();
$manager_info = $m_logic->getOneManager($shop[0]['col_mid'],ALL);
$con->t->assign('manager_info',$manager_info);

//position 店舗及びADMINで見るページが違います
systemPosition::makeShopPosition($shop[0]['col_name_ja']);


$con->append();
?>
