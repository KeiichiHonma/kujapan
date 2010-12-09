<?php
require_once('locale/tw/common.php');//共通翻訳ファイル
require_once('locale/tw/contact.php');//規約ファイル
//エラー画面でcontactの翻訳が必要なので、特殊
$page2_locale = array(
    //seo
    'keyword' => '东京,日本,旅游,购物,优惠券,打折,折扣券,結算處理中發生了錯誤',
    'description' => '結算處理中發生了錯誤。日游酷棒是可以以99元的价格无限量获取在日本的家电卖场,百货店,化妆品店可以享受大幅折扣的优惠券的网站。',
    'title' => '結算處理中發生了錯誤｜日游酷棒',
    'h1' => '結算處理中發生了錯誤',
    
    'error_title' => '結算處理中發生了錯誤。',//決済処理中にエラーが発生しました。
    'error_message' => '結算處理中發生了錯誤。<br />給您添麻煩了，請聯繫日遊酷棒客服中心。',//決済処理中にエラーが発生しました。お客様コンタクトセンターまでご連絡くださいませ。
);
$locale = array_merge($common_locale,$page2_locale);
$locale = array_merge($page_locale,$locale);
?>
