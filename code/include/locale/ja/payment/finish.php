<?php
require_once('locale/ja/common.php');//共通翻訳ファイル
require_once('locale/ja/maintenance.php');//メンテナンスファイル
$page2_locale = array(
    //seo
    'keyword' => '東京,日本,旅行,買い物,クーポン,割引,割引券,購入明細',
    'description' => '購入明細。日遊酷棒は日本旅行時の買い物で使える大幅お値引クーポンが99元で取り放題のサイトです。',
    'title' => '購入明細 | 日遊酷棒',
    'h1' => '購入明細',
    
    //message
    'finish_message' => 'ご購入ありがとうございました。 ',//ご購入ありがとうございました。 

    //payment_alert
    'payment_alert1' => '请必ずこのページを印刷の上、お客様控えとして保存いただきますようお願いいたします。',//必ずこのページを印刷の上、お客様控えとして保存いただきますようお願いいたします。
    'payment_alert2' => 'ログインアカウントおよびログインパスワードを控えずに進むと、<br />後日、クーポン券の発行を行うことができなくなりますので、ご注意ください。',//ログインアカウントおよびログインパスワードを控えずに進むと、<br />後日、クーポン券の発行を行うことができなくなりますので、ご注意ください。
    'payment_alert3' => 'ご注文番号はお問い合わせの際に必ず必要となります。',//ご注文番号はお問い合わせの際に必ず必要となります。
    'payment_alert4' => 'ご不明点がある場合、下記にお問い合わせ下さい。<br />4000-161716(平日午前9時から17時30分)',//ご不明点がある場合、下記にお問い合わせ下さい。<br />4000-161716（平日：9:00 - 17:00 土日休）
    
    'payment_maintenance_message' => '現在、『日游酷棒』サイトのメンテンスを実施しております。<br />ご購入処理は正常に終了しておりますので、メンテナンス終了後、本画面に表示されているログインアカウント、ログインパスワードを使用してクーポン券を印刷していただきますようお願い申し上げます。<br />皆様にはご迷惑をおかけしますことを深くお詫び申し上げます。',//現在、『日游酷棒』サイトのメンテンスを実施しております。<br />ご購入処理は正常に終了しておりますので、メンテナンス終了後、本画面に表示されているログインアカウント、ログインパスワードを使用してクーポン券を印刷していただきますようお願い申し上げます。<br />皆様にはご迷惑をおかけしますことを深くお詫び申し上げます。
);
$locale = array_merge($common_locale,$page2_locale);
$locale = array_merge($page_locale,$locale);
?>
