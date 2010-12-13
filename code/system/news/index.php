<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('manager/prepend.php');

require_once('news/parameter.php');
$parameter = new newsParameter();
$con->t->assign('target_list',$parameter->target);

//お知らせ取得
require_once('news/logic.php');
$logic = new newsLogic(TRUE);
$con->base->makeLimitTo();
$news = $logic->getAllNewsForsystem($con->base->sp_limit['from'],$con->base->sp_limit['to']);//公開、未公開にかかわらず全て
$con->base->assignSp($logic->rows,'/system/news/index');

if($news){
    $time = time();
    foreach ($news as $key => $value){
        if($value['col_from'] <= $time){
            $news[$key]['isPublic'] = TRUE;
        }else{
            $news[$key]['isPublic'] = FALSE;
        }
        if($value['col_to'] <= $time){
            $news[$key]['isDelete'] = TRUE;
        }else{
            $news[$key]['isDelete'] = FALSE;
        }
    }

    $con->t->assign('news',$news);
}
$con->append();
?>
