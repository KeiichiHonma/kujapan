<?php
require_once('manager/prepend.php');
require_once('shop/logic.php');
$s_logic = new shopLogic(TRUE);

$sid = $con->base->getPath('sid',FALSE);
$shop = $s_logic->getOneShopForSystem($sid);
if(!$shop){
    require_once('fw/errorManager.php');
    errorManager::throwError(E_CMMN_SHOP_EXISTS);
}
$con->t->assign('shop',$shop);
$con->t->assign('sid',$shop[0]['_id']);
?>