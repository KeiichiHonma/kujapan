<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('manager/prepend.php');
$grid = $con->base->getPath('grid',TRUE);//リダイレクトあり

//form情報アサイン
require_once('group/form.php');
$form = new groupForm();
$form->assignForm();

//クーポン情報
require_once('group/logic.php');//group
$g_logic = new groupLogic(TRUE);
$group = $g_logic->getRow($grid);
if(!$group){
    require_once('fw/errorManager.php');
    errorManager::throwError(E_SYSTEM_GROUP_EXISTS);
}
$con->t->assign('grid',$group[0]['_id']);
$con->t->assign('group',$group);

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
            $grid = $group_handle->updateRow($grid);
            
            $con->safeExitRedirect('/system/group/',TRUE);
        }else{
            $con->safeExitRedirect('/system/',TRUE);
        }

    }
}else{
    utilManager::setLocalePostPram('name',$group[0]);
    $_POST['template_name'] = $group[0]['col_template_name'];
}
//共通処理////////////////////////

$con->append('system/group/edit/'.$page);
?>
