<?php
require_once('user/prepend.php');

//form情報アサイン
require_once('inquiry/form.php');
$form = new inquiryForm();
$form->assignForm();

$con->t->assign('trigger',$form->trigger);
$page = 'input';
if ( $con->isPost ){
    if($_POST['operation'] == 'check'){
        require_once('inquiry/check.php');
        checkInquiry::checkError();
        $page = checkInquiry::safeExit() ? 'confirm' : 'input';
    }elseif($_POST['operation'] == 'back'){
        $page = 'input';
    }elseif($_POST['operation'] == 'regist'){
        require_once('inquiry/check.php');
        checkInquiry::checkError();
        $bl = checkInquiry::safeExit();
        if($bl){
            //お問い合わせ///////////////////////////
            require_once('inquiry/handle.php');
            $inquiry_handle = new inquiryHandle();
            $inquiry_handle->addRow();

            require_once('fw/mailManager.php');
            $mailManager = new mailManager();

            //for company
            $mailManager->sendInquiry();

            //for iluna
            $mailManager->sendInquiry(TRUE);

            $con->safeExitRedirect('/inquiry/finish',TRUE);
        }else{
            $con->safeExitRedirect('/inquiry/input',TRUE);
        }

    }
}else{
    //debug//
    if($con->isDebug){
        $_POST['company'] = 'ハチワン';
        $_POST['division'] = '開発部';
        $_POST['name'] = '本間圭一';
        $_POST['kana'] = 'ホンマケイイチ';
        $_POST['url'] = 'http://god.corp.813.co.jp/cgi-bin/cbgrn/grn.cgi/bulletin/view?cid=1&aid=37&__dummy=1#follow';
        $_POST['telephone1'] = '03';
        $_POST['telephone2'] = '1234';
        $_POST['telephone3'] = '5678';
        $_POST['fax1'] = '03';
        $_POST['fax2'] = '2345';
        $_POST['fax3'] = '6789';
        $_POST['postcode1'] = '111';
        $_POST['postcode2'] = '0053';
        $_POST['address'] = 'ああああああ';
        $_POST['mail'] = 'honma@zeus.corp.813.co.jp';
        $_POST['detail'] = 'ｓｄｆ';
    }
}
//共通処理////////////////////////

$con->append('inquiry/'.$page);



?>
