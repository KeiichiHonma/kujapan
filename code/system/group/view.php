<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('manager/prepend.php');
$grid = $con->base->getPath('grid',TRUE);//リダイレクトあり

//form情報アサイン
require_once('group/form.php');
$form = new groupForm();
$form->assignForm();

require_once('group/logic.php');//group
$g_logic = new groupLogic(TRUE);
$group = $g_logic->getRow($grid);

if(!$group){
    require_once('fw/errorManager.php');
    errorManager::throwError(E_SYSTEM_GROUP_EXISTS);
}

$con->t->assign('grid',$group[0]['_id']);

//特集ページに表示するクーポン
if(isset($group[0]['col_serialize_special_cooupon'])){
    $special_array = unserialize($group[0]['col_serialize_special_cooupon']);
    if(is_array($special_array) && count($special_array) > 0){
        require_once('coupon/logic.php');
        $c_logic = new couponLogic();
        $coupon = $c_logic->getSpecialCoupon($grid,$special_array);
        $con->t->assign('coupon',$coupon);
    }
}

utilManager::setLocalePostPram('name',$group[0]);
$_POST['template_name'] = $group[0]['col_template_name'];

$con->append();
?>
