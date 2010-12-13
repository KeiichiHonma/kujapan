<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('manager/prepend.php');


require_once('news/parameter.php');
$parameter = new newsParameter();
$con->t->assign('target_list',$parameter->target);

//nid
$nid = $con->base->getPath('nid',TRUE);//リダイレクトあり

//情報取得//////////////////
require_once('news/logic.php');
$logic = new newsLogic(TRUE);
$news = $logic->getOneNews($nid);
$con->t->assign('news',$news);

$con->append();
?>
