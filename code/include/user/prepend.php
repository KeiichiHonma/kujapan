<?php
require_once('fw/prepend.php');

commonPosition::makeSitePosition();
$con->readyPostCsrf();

//お知らせ
require_once('news/logic.php');
$n_logic = new newsLogic();
if($bl){
    $news = $n_logic->getUserNews();
}else{
    $news = $n_logic->getBuyBeforeNews();
}

$con->t->assign('news',$news);
?>