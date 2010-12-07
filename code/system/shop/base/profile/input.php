<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('shop/prepend.php');

//form情報アサイン
require_once('shop/form.php');
$form = new shopForm();
$form->assignProfileForm();

$page = 'input';
if ( $con->isPost ){
    if($_POST['operation'] == 'check'){
        require_once('shop/check.php');
        checkShop::checkError();
        $page = checkShop::safeExit() ? 'confirm' : 'input';

    }elseif($_POST['operation'] == 'back'){
        $page = 'input';
    }elseif($_POST['operation'] == 'regist'){
        require_once('shop/handle.php');
        $shop_handle = new shopHandle();
        $shop_handle->updateProfileRow();
        
        $con->safeExitRedirect('/system/shop/base/',TRUE);
    }
}else{
    $_POST['aid'] = $shop[0]['col_aid'];
    $_POST['gid'] = $shop[0]['col_gid'];
    utilManager::setLocalePostPram('name',$shop[0]);
    utilManager::setLocalePostPram('detail',$shop[0]);
    utilManager::setLocalePostPram('address',$shop[0]);
    $_POST['google_map'] = $shop[0]['col_google_map'];
    utilManager::setLocalePostPram('open_hour',$shop[0]);
    utilManager::setLocalePostPram('holiday',$shop[0]);
    utilManager::setLocalePostPram('comment',$shop[0]);
    $_POST['url'] = $shop[0]['col_url'];
    utilManager::setLocalePostPram('remark',$shop[0]);
    
    
/*    $_POST['name_ja'] = $shop[0]['col_name_ja'];
    $_POST['name_cn'] = $shop[0]['col_name_cn'];
    $_POST['name_tw'] = $shop[0]['col_name_tw'];

    $_POST['catch_phrase_ja'] = $shop[0]['col_catch_phrase_ja'];
    $_POST['catch_phrase_cn'] = $shop[0]['col_catch_phrase_cn'];
    $_POST['catch_phrase_tw'] = $shop[0]['col_catch_phrase_tw'];

    $_POST['address_ja'] = $shop[0]['col_address_ja'];
    $_POST['address_cn'] = $shop[0]['col_address_cn'];
    $_POST['address_tw'] = $shop[0]['col_address_tw'];
    $_POST['google_map'] = $shop[0]['col_google_map'];

    $_POST['open_hour_ja'] = $shop[0]['col_open_hour_ja'];
    $_POST['open_hour_cn'] = $shop[0]['col_open_hour_cn'];
    $_POST['open_hour_tw'] = $shop[0]['col_open_hour_tw'];

    $_POST['holiday_ja'] = $shop[0]['col_holiday_ja'];
    $_POST['holiday_cn'] = $shop[0]['col_holiday_cn'];
    $_POST['holiday_tw'] = $shop[0]['col_holiday_tw'];

    $_POST['comment_ja'] = $shop[0]['col_comment_ja'];
    $_POST['comment_cn'] = $shop[0]['col_comment_cn'];
    $_POST['comment_tw'] = $shop[0]['col_comment_tw'];

    $_POST['url'] = $shop[0]['col_url'];

    $_POST['remark_ja'] = $shop[0]['col_remark_ja'];
    $_POST['remark_cn'] = $shop[0]['col_remark_cn'];
    $_POST['remark_tw'] = $shop[0]['col_remark_tw'];*/
    
    //テスト用 debug//
/*    if($con->isDebug){
        $_POST['name_ja'] = 'ビックカメラ新宿店';
        $_POST['name_cn'] = 'Bic Camera新宿店';
        $_POST['name_tw'] = 'Bic Camera新宿店';
        
        $_POST['catch_phrase_ja'] = 'キャッチフレーズ';
        $_POST['catch_phrase_cn'] = '广告标语';
        $_POST['catch_phrase_tw'] = '廣告標語';

        $_POST['address_ja'] = '東京都新宿区西新宿1丁目5-1';
        $_POST['address_cn'] = '东京都新宿区西新宿1丁目5-1';
        $_POST['address_tw'] = '東京都新宿區西新宿1丁目5-1';
        $_POST['google_map'] = '東京都新宿区西新宿1丁目5-1';
        
        $_POST['open_hour_ja'] = '営業時間';
        $_POST['open_hour_cn'] = '营业时间';
        $_POST['open_hour_tw'] = '營業時間';

        $_POST['holiday_ja'] = '定休日';
        $_POST['holiday_cn'] = '定期休息日';
        $_POST['holiday_tw'] = '定期休息日';

        $_POST['comment_ja'] = '担当者コメント';
        $_POST['comment_cn'] = '担当者评语';
        $_POST['comment_tw'] = '擔當者評語';

        $_POST['url'] = 'http://www.excite.co.jp/world/chinese/';

        $_POST['remark_ja'] = '備考';
        $_POST['remark_cn'] = '备考';
        $_POST['remark_tw'] = '備考';
    }*/
}

//position 店舗及びADMINで見るページが違います
systemPosition::makeShopPosition($shop[0]['col_name_ja']);

//共通処理////////////////////////

$con->append('system/shop/base/profile/'.$page);
?>
