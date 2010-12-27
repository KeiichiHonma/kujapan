<?php
require_once('locale/tw/common.php');//共通翻訳ファイル
$page_locale = array(
    //seo
    'keyword' => '東京,日本,旅遊,購物,優惠券,打折,折扣券,客服服務',
    'description' => '客服服務。日遊酷棒是可以以99元的價格任您選擇日本的家電賣場，百貨店，化妝品店可以享受大幅折扣的優惠券的網站。',
    'title' => '客服服務｜日遊酷棒',
    'h1' => '客服服務',
    
    'contact_column_name'=>'日游酷棒客服中心',//コンタクトセンター
    'contact_column_telephone'=>'邮箱地址',//メールアドレス
    'contact_column_opening'=>'服務時間',//営業時間
    'contact_opening_time'=>'周一至周五09:00-17:30',//平日午前9時から17時30分
    'contact_column_detail'=>'說明',//営業時間
    'contact_detail'=>'『日遊酷棒』客服時間調整公告<br />我們會在以下時間暫停客服電子郵件的服務。<br />元旦：2010年12月29日～1月4日<br />春節：2011年2月2日～2月8日
',
);
$locale = array_merge($common_locale,$page_locale);
?>
