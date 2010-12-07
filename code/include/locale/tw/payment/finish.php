<?php
require_once('locale/tw/common.php');//共通翻訳ファイル
$page_locale = array(
    //seo
    'keyword' => '東京,日本,旅遊,購物,優惠券,打折,折扣券,購買明細',
    'description' => '購買明細.日遊酷棒是可以以99元的價格無限量獲取在日本的家電賣場，百貨店，化妝品店可以享受大幅折扣的優惠券的網站。',
    'title' => '購買明細｜日遊酷棒',
    'h1' => '購買明細',
    
    //message
    'finish_message' => '感謝您的購買',//ご購入ありがとうございました. 

    //payment_alert
    'payment_alert1' => '請務必列印本頁作爲顧客方存根保存',//必ずこのページを印刷の上,お客様控えとして保存いただきますようお願いいたします.
    'payment_alert2' => '請務必保管好登陸賬戶和密碼，一旦遺失今後將無法獲得優惠券。',//ログインアカウントおよびログインパスワードを控えずに進むと,<br />後日,クーポン券の発行を行うことができなくなりますので,ご注意ください.
    'payment_alert3' => '咨詢我公司時需要使用本客戶編號',//お客様番号はお問い合わせの際に必ず必要となります.
    'payment_alert4' => '有任何不清楚的地方請致電以下號碼咨詢<br />日游酷棒客服中心:info@iluna.co.jp',//ご不明点がある場合,下記にお問い合わせ下さい.<br />お客様センター: info@iluna.co.jp
);
$locale = array_merge($common_locale,$page_locale);
?>
