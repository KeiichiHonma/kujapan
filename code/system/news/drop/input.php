<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('manager/prepend.php');


//form情報アサイン
require_once('news/form.php');
$form = new newsForm();
$form->assignForm();

require_once('news/parameter.php');
$parameter = new newsParameter();
$con->t->assign('target_list',$parameter->target);

//nid
$nid = $con->base->getPath('nid',TRUE);//リダイレクトあり
$con->t->assign('nid',$nid);

//情報取得//////////////////
require_once('news/logic.php');
$logic = new newsLogic(TRUE);
$news = $logic->getOneNews($nid);

$page = 'input';
if ( $con->isPost ){
    if($_POST['operation'] == 'check'){
        $page = 'confirm';//削除なので無チェック
    }elseif($_POST['operation'] == 'back'){
        $page = 'input';
    }elseif($_POST['operation'] == 'regist'){
        if(is_numeric($_POST['nid'])){
            //お知らせ登録///////////////////////////
            require_once('news/handle.php');
            $news_handle = new newsHandle();
            $news_handle->deleteRow($_POST['nid']);
        }
        $con->safeExitRedirect('/system/news/',TRUE);
    }
}else{
    //set
    $_POST['from'] = $news[0]['col_from'];
    $_POST['to'] = $news[0]['col_to'];
    $_POST['date'] = $news[0]['col_date'];
    $_POST['target'] = $news[0]['col_target'];
    $_POST['title'] = $news[0]['col_title'];
    $_POST['detail'] = $news[0]['col_detail'];
    $_POST['url'] = $news[0]['col_url'];
    $_POST['link'] = $news[0]['col_link'];
}
$con->t->assign('news',$news);

//共通処理////////////////////////

$con->append('system/news/drop/'.$page);
?>
