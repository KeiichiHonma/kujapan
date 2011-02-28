<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('shop/prepend.php');


//form情報アサイン
require_once('coupon/form.php');
$form = new couponForm();
$form->assignForm();

$page = 'input';
if ( $con->isPost ){
    if($_POST['operation'] == 'check'){
        //日時を成形
        $_POST['validate_time'] = mktime(23, 59, 59, $_POST['date_Month'],$_POST['date_Day'],$_POST['date_Year']);
        
        require_once('coupon/check.php');
        checkCoupon::checkError();
        $page = checkCoupon::safeExit() ? 'confirm' : 'input';
    }elseif($_POST['operation'] == 'back'){
        $page = 'input';
    }elseif($_POST['operation'] == 'regist'){
        require_once('coupon/check.php');
        checkCoupon::checkError();
        $bl = checkCoupon::safeExit();
        if($bl){
            //クーポン登録///////////////////////////
            require_once('coupon/handle.php');
            $coupon_handle = new couponHandle();
            $cid = $coupon_handle->addRow();
            
            $con->safeExitRedirect('/system/shop/coupon/',TRUE);
        }else{
            $con->safeExitRedirect('/system/',TRUE);
        }

    }
}else{
    //debug//
    if($con->isDebug){
        $_POST['validate_time'] = mktime(23, 59, 59, 5,31,2011);
        $_POST['discount_value'] = '5';
        $_POST['discount_ja'] = '5%';
        $_POST['discount_cn'] = '95折';
        $_POST['discount_tw'] = '95折';
/*        $_POST['aid'] = '2';
        $_POST['gid'] = '1';*/
        $_POST['title_ja'] = '';
        $_POST['title_cn'] = '';
        $_POST['title_tw'] = '';
        $_POST['condition_ja'] = '';
        $_POST['condition_cn'] = '';
        $_POST['condition_tw'] = '';
    }
}

//position 店舗及びADMINで見るページが違います
systemPosition::makeShopPosition($shop[0]['col_name_ja']);

//共通処理////////////////////////

$con->append('system/shop/coupon/entry/'.$page);
?>
