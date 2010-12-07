<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('shop/prepend.php');

require_once('group/logic.php');
$gr_logic = new groupLogic(TRUE);
$gr_logic->setIndexColumn(DATABASE_OID_NAME);//index入れ替え
$group = $gr_logic->getResult();//group

//所属グループ
$compamny_group = $gr_logic->getShopGroup($shop[0]['_id']);

$old_grid = array();
if($compamny_group !== FALSE){
    foreach ($compamny_group as $key => $value){
        $old_grid[] = $value['col_grid'];//現在のグループリストを生成
        unset($group[$value['col_grid']]);//既に所属しているグループは一覧から除去
    }
}
$con->t->assign('group',$group);
$con->t->assign('compamny_group',$compamny_group);

$page = 'input';
if ( $con->isPost ){

    if($_POST['operation'] == 'regist'){
        //require_once('coupon/check.php');
        //checkCoupon::checkError();
        //$bl = checkCoupon::safeExit();
        $bl = TRUE;
        if($bl){
            //所属グループ変更///////////////////////////
            require_once('group/handle.php');
            $group_relation_handle = new groupRelationHandle();
            $group_relation_handle->assignGroup($old_grid,$_POST['new_grid']);
            
            $con->safeExitRedirect('/system/shop/group/',TRUE);
        }else{
            $con->safeExitRedirect('/system/',TRUE);
        }

    }
}else{
    //$_POST['aid'] = $coupon[0]['col_aid'];
    //$_POST['gid'] = $coupon[0]['col_gid'];
    //utilManager::setLocalePostPram('title',$coupon[0]);
    //utilManager::setLocalePostPram('detail',$coupon[0]);
    //utilManager::setLocalePostPram('condition',$coupon[0]);
}

//position 店舗及びADMINで見るページが違います
systemPosition::makeShopPosition($shop[0]['col_name_ja']);

//共通処理////////////////////////

$con->append('system/shop/group/assign/'.$page);
?>
