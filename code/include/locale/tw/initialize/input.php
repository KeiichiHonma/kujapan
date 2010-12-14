<?php
require_once('locale/tw/common.php');//共通翻訳ファイル
$page_locale = array(
    //seo
    'keyword' => '東京,日本,旅遊,購物,優惠券,打折,折扣券,使用者登錄',
    'description' => '使用者登錄。日遊酷棒是可以以99元的價格任您選擇日本的家電賣場，百貨店，化妝品店可以享受大幅折扣的優惠券的網站。',
    'title' => '使用者登錄｜日遊酷棒',
    'h1' => '使用者登錄',
    
    //message
    'initialize_message' => '登記使用優惠券的顧客的信息',//クーポン券を使用する方の情報を登録します.
    'input_given_name' => '姓名拼音',//英語の姓名 英語姓名?
    'input_must' => '※必須',//必須
    'input_given_name_remark' => '※護照上的姓名拼音',//パスポートに記載されたの英語の名字と名前 在護照上記載的英語姓氏和名字?

    'input_given_name_message1' => '・請填寫護照上的姓名拼音',//パスポートに記載されている英語の名前を入力してください.
    'input_given_name_message2' => '・您輸入的姓名會印在優惠券上，您使用優惠券時店方會核對其與護照上的姓名是否一致',//ご入力されたお名前はクーポン券に記載され,ご使用になる店舗にてパスポートと照合されます.
    'input_given_name_message3' => '・請注意，一旦輸入之後就無法更改',//一度入力すると変更することはできませんのでご注意下さい.
    
    'input_mail' => '郵箱地址',
    'input_mail_message1' => '・我們可能會通過郵件的形式回答您的問題所以最好輸入您的郵箱地址<br />同時我們也會將發放優惠券的信息通過郵件形式發送',//お客様からご連絡頂いた場合にメールでご返信する場合があるため,メールアドレスの登録を推奨しております.<br />また,お得なクーポン券の掲載情報もお送りいたします.
);
$locale = array_merge($common_locale,$page_locale);
?>
