<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('manager/prepend.php');

require_once('group/logic.php');//coupon
$g_logic = new groupLogic(TRUE);

$con->t->assign('group',$g_logic->getGroup());

$con->append();
?>
