<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('manager/prepend.php');


//form情報アサイン
require_once('group/form.php');
$form = new groupForm();
$form->assignForm();

$page = 'input';
if ( $con->isPost ){
    if($_POST['operation'] == 'check'){

        require_once('group/check.php');
        checkGroup::checkError();
        $page = checkGroup::safeExit() ? 'confirm' : 'input';
    }elseif($_POST['operation'] == 'back'){
        $page = 'input';
    }elseif($_POST['operation'] == 'regist'){
        require_once('group/check.php');
        checkGroup::checkError();
        $bl = checkGroup::safeExit();
        if($bl){
            //クーポン登録///////////////////////////
            require_once('group/handle.php');
            $group_handle = new groupHandle();
            $cid = $group_handle->addRow();
            
            $con->safeExitRedirect('/system/group/',TRUE);
        }else{
            $con->safeExitRedirect('/system/',TRUE);
        }

    }
}else{
    //debug//
    if($con->isDebug){
        $_POST['name_ja'] = 'グループ名';
        $_POST['name_cn'] = 'グループ名';
        $_POST['name_tw'] = 'グループ名';
        $_POST['template_name'] = 'テンプレート';
    }
}
//共通処理////////////////////////

$con->append('system/group/entry/'.$page);
?>
