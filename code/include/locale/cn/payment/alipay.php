<?php
require_once('locale/cn/common.php');//共通翻訳ファイル
$page_locale = array(
    //seo
    'keyword' => 'キーワード',
    'description' => 'ディスクリプション',
    'title' => 'タイトルの内容',
    //html
    'h1' => '中文的H1标记',
    
    //form
    'regist_message' => 'thanks',
);
$locale = array_merge($common_locale,$page_locale);
?>
