<?php
require_once('locale/ja/common.php');//共通翻訳ファイル
$page_locale = array(
    //seo
    'keyword' => '東京,日本,旅行,買い物,クーポン,割引,割引券,使用者登録',
    'description' => '使用者登録。日遊酷棒は日本旅行時の買い物で使える大幅お値引クーポンが99元で取り放題のサイトです。',
    'title' => '使用者登録 | 日遊酷棒',
    'h1' => '使用者登録',
    
    //message
    'initialize_message' => 'クーポン券を使用する方の情報を登録します。',//クーポン券を使用する方の情報を登録します。
    'input_given_name' => '英語の姓名',//英語の姓名
    'input_must' => '※必須',//必須
    'input_given_name_remark' => '※パスポートに記載されたの英語の名字と名前',//パスポートに記載されたの英語の名字と名前

    'input_given_name_message1' => '・パスポートに記載されている英語の名前を入力してください。',//パスポートに記載されている英語の名前を入力してください。
    'input_given_name_message2' => '・ご入力されたお名前はクーポン券に記載され、ご使用になる店舗にてパスポートと照合されます。',//ご入力されたお名前はクーポン券に記載され、ご使用になる店舗にてパスポートと照合されます。
    'input_given_name_message3' => '・一度入力すると変更することはできませんのでご注意下さい。',//一度入力すると変更することはできませんのでご注意下さい。
    
    'input_mail' => '邮箱',
    'input_mail_message1' => '・お客様からご連絡頂いた場合にメールでご返信する場合があるため、メールアドレスの登録を推奨しております。<br />また、お得なクーポン券の掲載情報もお送りいたします。',//お客様からご連絡頂いた場合にメールでご返信する場合があるため、メールアドレスの登録を推奨しております。<br />また、お得なクーポン券の掲載情報もお送りいたします。
);
$locale = array_merge($common_locale,$page_locale);
?>
