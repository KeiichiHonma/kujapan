<?php
require_once('locale/ja/common.php');//共通翻訳ファイル
$page_locale = array(
    //seo
    'keyword' => '東京,日本,旅行,買い物,クーポン,割引,割引券,お問い合わせ',
    'description' => 'お問い合わせ。日遊酷棒は日本旅行時の買い物で使える大幅お値引クーポンが99元で取り放題のサイトです。',
    'title' => 'お問い合わせ | 日遊酷棒',
    'h1' => 'お問い合わせ',
    
    'contact_column_name'=>'お客様ホットライン',//お客様ホットライン
    'contact_column_telephone'=>'電話番号',//電話番号
    'contact_column_opening'=>'営業時間',//営業時間
    'contact_opening_time'=>'平日午前9時から17時30分',//平日午前9時から17時30分
    'contact_column_detail'=>'説明',//説明
    'contact_detail'=>'「市话费」つまり「市内通話費用」はかけた側の負担になります。もし市外からの電話だった場合、市外通話費用はこちらの負担になります。',//営業時間
);
$locale = array_merge($common_locale,$page_locale);
?>
