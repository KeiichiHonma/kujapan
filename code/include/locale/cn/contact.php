<?php
require_once('locale/cn/common.php');//共通翻訳ファイル
$page_locale = array(
    //seo
    'keyword' => '东京,日本,旅游,购物,优惠券,打折,折扣券,客服服务',
    'description' => '客服服务。日游酷棒是可以以99元的价格任您选择日本的家电卖场,百货店,化妆品店可以享受大幅折扣的优惠券的网站。',
    'title' => '客服服务｜日游酷棒',
    'h1' => '客服服务',
    
    'contact_column_name'=>'日游酷棒热线中心',//お客様ホットライン
    'contact_column_telephone'=>'热线电话',//電話番号
    'contact_column_opening'=>'热线服务时间带',//営業時間
    'contact_opening_time'=>'周一至周五09:00-17:30
    ',//平日午前9時から17時30分
    'contact_column_detail'=>'说明',//営業時間
    'contact_detail'=>'仅支付市话费且支持手机拨打，香港、澳门及台湾地区除外<br />『日游酷棒』客服时间调整公告<br />我们会在以下时间暂停客服电话和电子邮件的服务。<br />元旦：2010年12月29日～1月4日<br />春节：2011年2月2日～2月8日',//営業時間
);
$locale = array_merge($common_locale,$page_locale);
?>
