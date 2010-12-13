<?php
require_once('locale/ja/common.php');//共通翻訳ファイル
require_once('locale/ja/rule.php');//規約ファイル
$page2_locale = array(
    //seo
    'keyword' => '東京,日本,旅行,買い物,クーポン,割引,割引券,決済前の注意事項',
    'description' => '決済前の注意事項。日遊酷棒は日本旅行時の買い物で使える大幅お値引クーポンが99元で取り放題のサイトです。',
    'title' => '決済前の注意事項 | 日遊酷棒',
    'h1' => '決済前の注意事項',
);
$locale = array_merge($common_locale,$page2_locale);
$locale = array_merge($page_locale,$locale);
?>
