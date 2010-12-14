<?php
require_once('locale/cn/common.php');//共通翻訳ファイル
require_once('locale/cn/rule.php');//規約ファイル
//ruleの翻訳が必要なので、特殊
$page2_locale = array(
    //seo
    'keyword' => '东京,日本,旅游,购物,优惠券,打折,折扣券,支付前的注意事项',
    'description' => '支付前的注意事项。日游酷棒是可以以99元的价格任您选择日本的家电卖场,百货店,化妆品店可以享受大幅折扣的优惠券的网站。',
    'title' => '支付前的注意事项｜日游酷棒',
    'h1' => '支付前的注意事项',
);
$locale = array_merge($common_locale,$page2_locale);
$locale = array_merge($page_locale,$locale);
?>
