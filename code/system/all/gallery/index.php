<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('manager/prepend.php');

require_once('shop/logic.php');
$item_logic = new shopItemLogic(TRUE);
$con->base->changeSpValue(30);
$con->base->makeLimitTo();
$gallery = $item_logic->getItem($con->base->sp_limit['from'],$con->base->sp_limit['to'],SHOP_TYPE_GALLERY);

//ページ送り
$con->base->assignSp($item_logic->rows,'/system/all/gallery/index');
if($gallery){
    $con->t->assign('gallery',$gallery);
}

$con->append();
?>
