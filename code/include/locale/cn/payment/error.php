<?php
require_once('locale/cn/common.php');//共通翻訳ファイル
require_once('locale/cn/contact.php');//規約ファイル
//エラー画面でcontactの翻訳が必要なので、特殊
$page2_locale = array(
    //seo
    'keyword' => '东京,日本,旅游,购物,优惠券,打折,折扣券,结算处理中发生了错误',
    'description' => '结算处理中发生了错误。日游酷棒是可以以99元的价格任您选择日本的家电卖场,百货店,化妆品店可以享受大幅折扣的优惠券的网站。',
    'title' => '结算处理中发生了错误｜日游酷棒',
    'h1' => '结算处理中发生了错误',
    
    'error_title' => '结算处理中发生了错误。',//決済処理中にエラーが発生しました。
    'error_message' => '结算处理中发生了错误。<br />给您添麻烦了，请联系日游酷棒热线中心。',//決済処理中にエラーが発生しました。お客様コンタクトセンターまでご連絡くださいませ。
);
$locale = array_merge($common_locale,$page2_locale);
$locale = array_merge($page_locale,$locale);
?>
