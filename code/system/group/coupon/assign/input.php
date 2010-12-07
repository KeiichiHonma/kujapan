<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('manager/prepend.php');
$grid = $con->base->getPath('grid',TRUE);//リダイレクトあり

require_once('group/logic.php');//group
$g_logic = new groupLogic(TRUE);
$group = $g_logic->getRow($grid);

if(!$group){
    require_once('fw/errorManager.php');
    errorManager::throwError(E_SYSTEM_GROUP_EXISTS);
}

$con->t->assign('grid',$group[0]['_id']);

require_once('coupon/logic.php');
$old_coupon = FALSE;
//現在のクーポンリストを生成
if(isset($group[0]['col_serialize_special_cooupon'])){
    $special_array = unserialize($group[0]['col_serialize_special_cooupon']);
    if(is_array($special_array) && count($special_array) > 0){
        
        $c_logic = new couponLogic();
        //$c_logic->setIndexColumn(DATABASE_OID_NAME);//index入れ替え
        $old_coupon = $c_logic->getSpecialCoupon($grid,$special_array);
        //$con->t->assign('coupon',$coupon);
    }
}

//表示可能なクーポンリストを生成
$c_logic = new couponLogic();
$c_logic->setIndexColumn('coupon_id');//index入れ替え
$group_coupon = $c_logic->getGroupCoupon($grid);
if(!$group_coupon){
    require_once('fw/errorManager.php');
    errorManager::throwError(E_SYSTEM_COUPON_EXISTS);
}

//$con->t->assign('coupon',$coupon);



if($old_coupon !== FALSE){
    foreach ($old_coupon as $key => $value){
        if(array_key_exists($value['coupon_id'],$group_coupon)){
            unset($group_coupon[$value['coupon_id']]);//既に所属しているクーポンは一覧から除去
        }
        $index = array_search($value['coupon_id'],$special_array);
        if($index !== FALSE){
            unset($special_array[$index]);
        }
    }
}

$con->t->assign('group_coupon',$group_coupon);
$con->t->assign('old_coupon',$old_coupon);
//error

if(count($special_array) > 0){
    $con->t->assign('error_cid',$special_array);
}


$page = 'input';
if ( $con->isPost && count($_POST['new_cid']) > 0 && is_array($_POST['new_cid'])){


    if($_POST['operation'] == 'regist'){
        $bl = TRUE;
        if($bl){
            require_once('group/handle.php');
            $group_handle = new groupHandle();
            $group_handle->assignCoupon($grid,$_POST['new_cid']);
            
            $con->safeExitRedirect('/system/group/view/grid/'.$grid,TRUE);
        }else{
            $con->safeExitRedirect('/system/',TRUE);
        }

    }
}else{

}

//共通処理////////////////////////

$con->append('system/group/coupon/assign/'.$page);
?>
