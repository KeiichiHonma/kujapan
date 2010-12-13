<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('user/prepend.php');
//nid
$nid = $con->base->getPath('nid',TRUE);//リダイレクトあり

//情報取得//////////////////
require_once('news/logic.php');
$logic = new newsLogic();
$news = $logic->getOneNews($nid);
$con->t->assign('news',$news);

commonPosition::makeFirstPosition
(
    KUJAPANURL.'/news/nid/'.$news[0]['_id'],
    $news[0]['col_title']
);

//locale 変更 [news_replace]で置換 渋谷/原宿/表参道
$con->updateLocaleValue('keyword',str_replace('[news_replace]',$news[0]['col_title'],$con->locale[keyword]));
$con->updateLocaleValue('description',str_replace('[news_replace]',$news[0]['col_title'],$con->locale[description]));
$con->updateLocaleValue('title',str_replace('[news_replace]',$news[0]['col_title'],$con->locale[title]));
$con->updateLocaleValue('h1',str_replace('[news_replace]',$news[0]['col_title'],$con->locale[h1]));

$con->append();
?>
