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
        $_POST['title_ja'] = '5%OFF（セール品は併用不可です）';
        $_POST['title_cn'] = '95折（特价品不享受此优惠）';
        $_POST['title_tw'] = '95折（特價品不享受此優惠）';
        $_POST['condition_ja'] = 'クーポンとパスポートと旅行券を提示';
        $_POST['condition_cn'] = '出示优惠券和护照';
        $_POST['condition_tw'] = '出示優惠券和護照';
    }
}

//position 店舗及びADMINで見るページが違います
systemPosition::makeShopPosition($shop[0]['col_name_ja']);

//共通処理////////////////////////

$con->append('system/shop/coupon/entry/'.$page);
?>
