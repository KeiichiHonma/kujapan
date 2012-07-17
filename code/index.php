<?php
require_once('user/prepend.php');
require_once('shop/logic.php');
$s_logic = new shopLogic();

$shop = $s_logic->getShop();
$con->t->assign('shop',$shop);

$con->append();

?>
