<?php
require_once('locale/ja/common.php');//共通翻訳ファイル
require_once('locale/ja/contact.php');//規約ファイル
//エラー画面でcontactの翻訳が必要なので、特殊
$page2_locale = array(
    //seo
    'keyword' => '东京,日本,旅游,购物,优惠券,打折,折扣券,支付前的注意事项',
    'description' => '支付前的注意事项。日游酷棒是可以以99元的价格无限量获取在日本的家电卖场,百货店,化妆品店可以享受大幅折扣的优惠券的网站。',
    'title' => '支付前的注意事项｜日游酷棒',
    'h1' => '支付前的注意事项',
    
    'error_title' => '決済処理中にエラーが発生しました。',//決済処理中にエラーが発生しました。
    'error_message' => '決済処理中にエラーが発生しました。<br />お手数おかけしますが、お客様コンタクトセンターまでご連絡くださいませ。',//決済処理中にエラーが発生しました。お客様コンタクトセンターまでご連絡くださいませ。
);
$locale = array_merge($common_locale,$page2_locale);
$locale = array_merge($page_locale,$locale);
?>
