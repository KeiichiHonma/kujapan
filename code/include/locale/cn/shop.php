<?php
require_once('locale/cn/common.php');//共通翻訳ファイル
$page_locale = array(
    //seo
    'keyword' => '东京,日本,旅游,购物,优惠券,打折,折扣券,[shop_replace]',
    'description' => '[shop_replace]的优惠券信息',
    'title' => '可以在[shop_replace]使用的超值优惠券｜日游酷棒',
    //html
    'h1' => '可以在[shop_replace]使用的超值优惠券'
);
$locale = array_merge($common_locale,$page_locale);
?>
