<?php
require_once('locale/tw/common.php');//共通翻訳ファイル
$page_locale = array(
    //seo
    'keyword' => '東京,日本,旅遊,購物,優惠券,打折,折扣券,已登錄',
    'description' => '已登錄。日遊酷棒是可以以99元的價格任您選擇日本的家電賣場，百貨店，化妝品店可以享受大幅折扣的優惠券的網站。',
    'title' => '已登錄｜日遊酷棒',
    'h1' => '已登錄',
    
    //message
    'initialize_finish_message' => '現在可以開始發行顧客的優惠券',//使用者のクーポン券発行準備が整いました.
    
    //initialize_alert
    'initialize_alert1' => '優惠券只能在登錄賬戶的有效期內發行',//ログインアカウントの有効期限内でのみ,クーポン券の発行ができます.
    /*2,3,4は共通のアラート文言*/
    
    'initialize_finish_action' => '馬上列印優惠券',//早速クーポンをプリントアウトする
);
$locale = array_merge($common_locale,$page_locale);
?>
