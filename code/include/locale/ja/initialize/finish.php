<?php
require_once('locale/ja/common.php');//共通翻訳ファイル
$page_locale = array(
    //seo
    'keyword' => '東京,日本,旅行,買い物,クーポン,割引,割引券,登録完了',
    'description' => '登録完了。日遊酷棒は日本旅行時の買い物で使える大幅お値引クーポンが99元で取り放題のサイトです。',
    'title' => '登録完了 | 日遊酷棒',
    'h1' => '登録完了',
    
    //message
    'initialize_finish_message' => '使用者のクーポン券発行準備が整いました。',//使用者のクーポン券発行準備が整いました。
    
    //initialize_alert
    'initialize_alert1' => 'ログインアカウントの有効期限内でのみ、クーポン券の発行ができます。',//ログインアカウントの有効期限内でのみ、クーポン券の発行ができます。
    /*2,3,4は共通のアラート文言*/
    
    'initialize_finish_action' => '早速クーポンをプリントアウトする',//早速クーポンをプリントアウトする
);
$locale = array_merge($common_locale,$page_locale);
?>
