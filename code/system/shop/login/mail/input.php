<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('manager/prepend.php');

require_once('manager/logic.php');
$m_logic = new managerLogic();
$manager = $m_logic->getOneManager($manager_auth->mid);
if(!$manager){
    require_once('fw/errorManager.php');
    errorManager::throwError(E_SYSTEM_MANAGER_EXISTS);
}

$con->t->assign('manager',$manager);

//form情報アサイン
require_once('manager/form.php');
$form = new managerMailForm();
$form->assignForm();

$page = 'input';
if ( $con->isPost ){
    if($_POST['operation'] == 'check'){
        require_once('manager/check.php');
        checkManagerMailEdit::checkError();
        $page = checkManagerMailEdit::safeExit() ? 'confirm' : 'input';
    }elseif($_POST['operation'] == 'back'){
        $page = 'input';
    }elseif($_POST['operation'] == 'regist'){
        require_once('manager/handle.php');
        $manager_handle = new managerHandle();
        $manager_handle->updateMailRow($manager[0]['_id']);
        
        $con->safeExitRedirect('/system/shop/login/',TRUE);
    }
}else{
    $_POST['mail'] = $manager[0]['col_mail'];
}

//position 店舗及びADMINで見るページが違います
systemPosition::makeShopPosition($shop[0]['col_name_ja']);

//共通処理////////////////////////

$con->append('system/shop/login/mail/'.$page);
?>
