<?php
//require専用ページ


/*//使用しない アリペイのIP範囲がわからない
//ipアドレス制限
$access_ip = $_SERVER['REMOTE_ADDR'];
if (permitIP($access_ip)) $allow = TRUE;*/

/*
■alipayから送られてくるパラメータ
必ずリターンする——特殊パラメーター
sign  : 暗号化の結果。全てのリターンされてきた暗号化しなければならないパラメーターで、個々のパラメーターを「パラメーター名=パラメーター値」で文字列とした形式。aからzの順番でソートした後、&で連結した文字列。またこの文字列を暗号化した後に得られる32桁の暗号化の結果である。（「署名の仕組み」を参照） 
sign_type  : これはパラメーターサイン暗号化使用方式に影響する。
必ずリターンする——有用パラメーター
exterface  : リクエスト対応時のパラメーターservice、この値はcreate_direct_pay_by_user 
trade_no  : ex)201012079230619 アリペイの唯一の注文番号。通知リターン時以外は受取ることができる。通常、アリペイのサイトにログインした後、取引管理の中で8桁の日時から始まる「取引番号」を問い合わせられる。
out_trade_no  : 業者サイトに対応する注文システムの中の唯一の注文番号で、アリペイの取引番号ではない。業者サイト内で唯一性を保証しなければならない。リクエスト時に対応するパラメーターで、元のまま通知されてくる。
total_fee  : この注文の総額（0.01～100000000.00）。リクエスト時に対応するパラメーターで、元のまま通知されてくる。リクエスト時に設定したのがprice、quantityあるいはtotal_feeであれ、リターンの時は全て総額total_feeにリターン。
subject  : この注文の名称、タイトル、キーワードなど。アリペイの取引明細の中で第一列目にあり、財務の帳簿合わせに最も重要である。リクエスト時に対応するパラメーターで、元のまま通知されてくる。
seller_email  : 代金受取側のアリペイアカウント。リクエスト対応時のseller_emailパラメーター、元のまま通知されてくる。
seller_id  : 売り手のアリペイアカウントに対応する唯一のID番号。2088から始まる16桁の数字。
buyer_email  : 代金支払側のアリペイアカウント。代金支払側が支払いをする時に使用するアリペイアカウント。 
buyer_id  : 買い手のアリペイアカウントに対応する唯一のID番号。2088から始まる16桁の数字。
trade_status  : 取引の現状で、この取引が現在どのような状態かを表す。完了の状態の値は二つのみで、「TRADE_FINISHED」（高級オンライン決済機能を未開設時の取引完了状態）と「TRADE_SUCCESS」（高級オンライン決済機能を開設時の取引完了状態）。両方とも取引完了を表す。
必ずリターンする——その他のパラメーター
notify_id  : チェックID。業者が提出した情報の合法性をチェックに用いる。一分間のみ有効。
notify_time  : 業者にリターンを送信した時間。
notify_type  : リターンの送信タイプ。通常は取引状態と同時にリターン。 
payment_type  : リクエスト対応時のpayment_typeパラメーター、元のままリターンされる。
is_success  : 支払いが完了したかを表示する。完了すれば“T”がリターンされる。完了できていなければ“F”がリターンされてくる。Fの状況は基本的にはないのでこのパラメーターは特に重視しなくてもよい。
リクエスト時に設定すれば必ずリターンされるパラメーター
body  : この注文の備考、説明、明細など。リクエスト時に対応するbodyパラメーターで、元のままリターンされてくる。
extra_common  : リクエスト対応時のextra_commonパラメーターで、元のままリターンされてくる。

$_GET['trade_no'] アリペイ取引番号
$_GET['out_trade_no'] 販売元の取引番号
$_GET['total_fee'] 金額
$_GET['subject'] 商品名
$_GET['seller_email'] 販売元のメールアドレス
$_GET['seller_id'] 販売元のID
$_GET['buyer_email'] 購入者のメールアドレス
$_GET['buyer_id'] 売り手のアリペイアカウントに対応する唯一のID番号。2088から始まる16桁の数字。
$_GET['trade_status'] 取引のステータス
TRADE_FINISHED
TRADE_SUCCESS

$_GET['notify_id'] 
$_GET['notify_time'] 
$_GET['notify_type'] 
$_GET['payment_type'] 
$_GET['is_success'] 

$_GET['body'] 
$_GET['extra_common']

//必須な項目は以下とする////////////////////////////
$_GET['trade_no'] アリペイ取引番号
$_GET['total_fee'] 金額
$_GET['buyer_id'] 売り手のアリペイアカウントに対応する唯一のID番号。2088から始まる16桁の数字。

*/

//直接来た場合は$conがないはず
if(!isset($con)){
    header("Location: ".'http://'.$_SERVER['SERVER_NAME'].'/payment/error');
    die();
}

if($con->isDebug){

}else{
    //本番サイトで99元以外を認めるのはテストアカウントのみ
    if($_GET['total_fee'] != 99 && $_GET['buyer_id'] != '2088502583884942'){
        //緊急エラー送信///////////////////////////
        require_once('fw/mailManager.php');
        $mailManager = new mailManager();
        $mailManager->sendHalt(LOCALE.":ERROR: make page total_fee deny FALSE\n");
        
        $con->safeExitRedirect('/payment/error');//エラー画面
    }

}

require_once('fw/utilManager.php');
utilManager::makeAlipayParam();

//チェック判断
if(!utilManager::$isCheck){
    //緊急エラー送信///////////////////////////
    require_once('fw/mailManager.php');
    $mailManager = new mailManager();
    $mailManager->sendHalt(LOCALE.":ERROR: make page get_param FALSE\n");
    
    $con->safeExitRedirect('/payment/error');//エラー画面
}

//アカウント+パスワード発行
//IP制限が必要

//ユーザー仮登録///////////////////////////
require_once('user/handle.php');
$user_handle = new userHandle();
$uid = $user_handle->addRow(utilManager::$alipay_param);

//チェック判断
if(!$uid){
    //緊急エラー送信///////////////////////////
    require_once('fw/mailManager.php');
    $mailManager = new mailManager();
    $mailManager->sendHalt(LOCALE.":ERROR: make page user_id FALSE\n");
    
    $con->safeExitRedirect('/payment/error');//エラー画面
}

$buy_time = $user_handle->parameter->buy_time;
$password = $user_handle->parameter->password;


//中止、お客様番号は取引番号を使用する

//アカウント更新.uidがないとお客様番号を生成できない

//意図的にnew
$user_handle = new userHandle();
$user_handle->updateAccountRow($uid);

$account = $user_handle->parameter->account;
$customer_no = $user_handle->parameter->customer_no;

//tmp regist
$regist_handle = new tmpRegistHandle();
$reid = $regist_handle->addRow($uid,$customer_no,$account,$password);

//チェック判断
if(!$reid){
    //緊急エラー送信///////////////////////////
    require_once('fw/mailManager.php');
    $mailManager = new mailManager();
    $mailManager->sendHalt(LOCALE.":ERROR: make page tmp_regist FALSE\n");

    $con->safeExitRedirect('/payment/error');//エラー画面
}

//メール送信
if(strlen(utilManager::$alipay_param['buyer_email']['param']) > 0){
    $email_pattern = '([a-zA-Z0-9!#$%&\'*+\\-/=^_`{|}~]+([a-zA-Z0-9!#$%&\'*+\\-/=^_`{|}~\\.]+)*@[a-zA-Z0-9!#$%&\'*+\\-/=^_`{|}~]+(\\.[a-zA-Z0-9!#$%&\'*+\\-/=^_`{|}~]+)*)';
    if (preg_match($email_pattern,utilManager::$alipay_param['buyer_email']['param'])) {
        require_once('fw/mailManager.php');
        $mailManager = new mailManager();
        $mailManager->sendRegistUser(utilManager::$alipay_param['buyer_email']['param'],$buy_time,$customer_no,$account,$password);
        $mailManager->sendRegistAdmin(utilManager::$alipay_param,$buy_time,$customer_no,$account);
    }
}

$con->safeExitRedirect('/payment/finish/code/'.$regist_handle->parameter->rand,TRUE);//SSL

function permitIP($access_ip){
    $permit_ip = "210.161.126.144/28";
    list($ip, $mask_bit) = explode("/", $permit_ip);
    $ip_long = ip2long($ip) >> (32 - $mask_bit);
    $p_ip_long = ip2long($access_ip) >> (32 - $mask_bit);
    if ($p_ip_long == $ip_long) {
        return true;
    }else {
        return false;
    }
}
?>
