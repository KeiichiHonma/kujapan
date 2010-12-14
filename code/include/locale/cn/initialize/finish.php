<?php
require_once('locale/cn/common.php');//共通翻訳ファイル
$page_locale = array(
    //seo
    'keyword' => '东京,日本,旅游,购物,优惠券,打折,折扣券,注册完毕',
    'description' => '注册完毕。日游酷棒是可以以99元的价格任您选择日本的家电卖场,百货店,化妆品店可以享受大幅折扣的优惠券的网站。',
    'title' => '注册完毕｜日游酷棒',
    'h1' => '注册完毕',
    
    //message
    'initialize_finish_message' => '现在可以开始发行顾客的优惠券',//使用者のクーポン券発行準備が整いました。
    
    //initialize_alert
    'initialize_alert1' => '优惠券只能在登录账户的有效期内发行',//ログインアカウントの有効期限内でのみ、クーポン券の発行ができます。
    /*2,3,4は共通のアラート文言*/
    
    'initialize_finish_action' => '马上打印优惠券',//早速クーポンをプリントアウトする
);
$locale = array_merge($common_locale,$page_locale);
?>
