<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('manager/prepend.php');
//require_once('./locale.php');

if(strlen(trim($_GET['sid'])) > 0 && strlen(trim($_GET['customer_no'])) > 0 && strlen(trim($_GET['last_no'])) > 0){
    //国チェック
    if(ereg("^n", trim($_GET['customer_no']))){
        $server = 'net';
    }elseif(ereg("^c", trim($_GET['customer_no']))){
        $server = 'com';
    }else{
        //不正
        $error = TRUE;
        $con->t->assign('error',$error);
    }
    
    if(!$error){
        $con->t->assign('server',$server);
        $print_time = utilManager::decodePrintCouponTime(trim($_GET['last_no']));
        
        require_once('coupon/logic.php');
        $c_logic = new couponLogic();
        $c_logic->setIndexColumn(DATABASE_OID_NAME);//index入れ替え
        $coupon = $c_logic->getShopCouponForLog(trim($_GET['sid']));
        //log
        $cl_logic = new couponLogLogic();
        $cl_logic->setIndexColumn('col_cid');//index入れ替え
        $coupon_log = $cl_logic->getShopCouponLog(trim($_GET['sid']),$print_time);
        
        //比較
        $display_coupon = array();
        $current_coupon = array();
        $alert_list = array();
        foreach ($coupon as $cid => $value){
            if($coupon_log && array_key_exists($cid,$coupon_log)){
                $display_coupon[$cid] = $coupon_log[$cid];//昔のクーポン
                $current_coupon[$cid] = $value;//現在のクーポン
                
                //どこか異なっているのかチェック
                
                if(strcasecmp($value['col_title_ja'],$coupon_log[$cid]['col_title_ja']) != 0) $alert_list[$cid]['title_ja'] = TRUE;
                if(strcasecmp($value['col_title_cn'],$coupon_log[$cid]['col_title_cn']) != 0) $alert_list[$cid]['title_cn'] = TRUE;
                if(strcasecmp($value['col_title_tw'],$coupon_log[$cid]['col_title_tw']) != 0) $alert_list[$cid]['title_tw'] = TRUE;
                if(strcasecmp($value['col_condition_ja'],$coupon_log[$cid]['col_condition_ja']) != 0) $alert_list[$cid]['condition_ja'] = TRUE;
                if(strcasecmp($value['col_condition_cn'],$coupon_log[$cid]['col_condition_cn']) != 0) $alert_list[$cid]['condition_cn'] = TRUE;
                if(strcasecmp($value['col_condition_tw'],$coupon_log[$cid]['col_condition_tw']) != 0) $alert_list[$cid]['condition_tw'] = TRUE;
                if(strcasecmp($value['col_validate_time'],$coupon_log[$cid]['col_validate_time']) != 0) $alert_list[$cid]['validate_time'] = TRUE;

            }else{
                $display_coupon[$cid] = $value;//ログがないため、現在のクーポン
            }
        }
        $con->t->assign('print_time',$print_time);//印刷日時
        $con->t->assign('display_coupon',$display_coupon);//ユーザーが見ているクーポン
        $con->t->assign('current_coupon',$current_coupon);//現在見えているページと差分がある場合
        $con->t->assign('alert_list',$alert_list);//ユーザーが見ているクーポン
    }

}

$con->append();
?>
