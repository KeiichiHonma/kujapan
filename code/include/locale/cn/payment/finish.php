<?php
require_once('locale/cn/common.php');//共通翻訳ファイル
require_once('locale/cn/maintenance.php');//メンテナンスファイル
$page2_locale = array(
    //seo
    'keyword' => '东京,日本,旅游,购物,优惠券,打折,折扣券,购买记录',
    'description' => '谢谢惠顾，欢迎再次光临！',
    'title' => '谢谢惠顾，欢迎再次光临！｜日游酷棒',
    'h1' => '谢谢惠顾，欢迎再次光临！',
);
$locale = array_merge($common_locale,$page2_locale);
$locale = array_merge($page_locale,$locale);
?>
