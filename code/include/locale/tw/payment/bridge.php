<?php
require_once('locale/tw/common.php');//共通翻訳ファイル
require_once('locale/tw/rule.php');//規約ファイル
$page2_locale = array(
    //seo
    'keyword' => '東京,日本,旅遊,購物,優惠券,打折,折扣券,支付前的注意事項',
    'description' => '支付前的注意事項。日遊酷棒是可以以99元的價格任您選擇日本的家電賣場，百貨店，化妝品店可以享受大幅折扣的優惠券的網站。',
    'title' => '支付前的注意事項｜日遊酷棒',
    'h1' => '支付前的注意事項',
);
$locale = array_merge($common_locale,$page2_locale);
$locale = array_merge($page_locale,$locale);
?>
