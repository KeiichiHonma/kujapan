<?php
require_once('locale/ja/common.php');//共通翻訳ファイル
$page_locale = array(
    //seo
    'keyword' => '東京,日本,旅行,買い物,クーポン,割引,割引券,[genre_replace]',
    'description' => '[genre_replace]などが日本での買い物時に大幅に値引されるクーポンが99元で取り放題のサイトです。',
    'title' => '[genre_replace]など日本、東京での買い物で使える大幅お値引クーポンの一覧 | 日遊酷棒',
    //html
    'h1' => '日本、東京での[genre_replace]などの買い物',
    //img
);
$locale = array_merge($common_locale,$page_locale);
?>
