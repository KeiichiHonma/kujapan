<?php
require_once('locale/tw/common.php');//共通翻訳ファイル
$page_locale = array(
    //seo
    'keyword' => '東京,日本,旅遊,購物,優惠券,打折,折扣券,[shop_replace]',
    'description' => '[shop_replace]的優惠券信息',
    'title' => '可以在[shop_replace]使用的超值優惠券｜日遊酷棒',
    //html
    'h1' => '可以在[shop_replace]使用的超值優惠券'
);
$locale = array_merge($common_locale,$page_locale);
?>
