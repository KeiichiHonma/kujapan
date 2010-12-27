<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('manager/prepend.php');



//form情報アサイン
require_once('news/form.php');
$form = new newsForm();
$form->assignForm();

$page = 'input';
if ( $con->isPost ){
    if($_POST['operation'] == 'check'){
        //confirmのPOST先指定
        $confirm_type = $page;
        $con->t->assign('confirm_type',$confirm_type);
        
        //日時を成形
        $_POST['date'] = mktime(0, 0, 0, $_POST['date_Month'],$_POST['date_Day'],$_POST['date_Year']);
        $_POST['from'] = mktime($_POST['from_Hour'], 0, 0, $_POST['from_Month'],$_POST['from_Day'],$_POST['from_Year']);
        $_POST['to'] = mktime($_POST['to_Hour'], 0, 0, $_POST['to_Month'],$_POST['to_Day'],$_POST['to_Year']);
        require_once('news/check.php');
        checkNews::checkError();
        $page = checkNews::safeExit() ? 'confirm' : 'input';

        
    }elseif($_POST['operation'] == 'back'){
        $page = 'input';
    }elseif($_POST['operation'] == 'regist'){
        require_once('news/check.php');
        checkNews::checkError();
        $bl = checkNews::safeExit();
        
        if($bl){
            //お知らせ登録///////////////////////////
            require_once('news/handle.php');
            $news_handle = new newsHandle();
            $nid = $news_handle->addRow();

            $con->safeExitRedirect('/system/news/view/nid/'.$nid,TRUE);
        }else{
            $con->safeExitRedirect('/system/',TRUE);
        }
    }
}else{
    //debug//
    if($con->isDebug){
        $_POST['title_ja'] = 'お知らせ';
        $_POST['title_cn'] = 'お知らせ';
        $_POST['title_tw'] = 'お知らせ';
        $_POST['detail_ja'] = 'お知らせ';
        $_POST['detail_cn'] = 'お知らせ';
        $_POST['detail_tw'] = 'お知らせ';
    }
}
//共通処理////////////////////////

$con->append('system/news/entry/'.$page);
?>
