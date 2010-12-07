<?php
require_once('locale/ja/common.php');//共通翻訳ファイル
$page_locale = array(
    //seo
    'keyword' => 'キーワード',
    'description' => 'ディスクリプション',
    'title' => 'タイトルの内容',
    //html
    'h1' => '日本語のH1タグ'
);
$locale = array_merge($common_locale,$page_locale);
?>
