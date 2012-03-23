<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('user/prepend.php');

$query = array
(
'body'=>$con->locale['alipay_product_detail'],
'return_url'=>'http://cn.kujapan.apollon.corp.813.co.jp/make.php',
'buyer_email'=>'honma@zeus.corp.813.co.jp',
//'buyer_email'=>'15210306686',
'buyer_id'=>'2088502583884942',
'exterface'=>'create_direct_pay_by_user',
'is_success'=>'T',
'notify_id'=>'RqPnCoPT3K9%252Fvwbh3I%252BFiWmI0RjHI3raClMKc1vXOO%252Blo%252BrYSe7q%252BVPh0zK2IRgVVjt6',
'notify_time'=>'2010-12-08 15:01:35',
'notify_type'=>'trade_status_sync',
'out_trade_no'=>'20101208031252',
'payment_type'=>'1',
'seller_email'=>'alipay@kujapan.com',
'seller_id'=>'2088501340570641',
'subject'=>$con->locale['alipay_product_title'],
'total_fee'=>'99',
'trade_no'=>'2010120805222794',
'trade_status'=>'TRADE_SUCCESS',
'sign'=>'d18d473b1dd7c2122704cdd0234188a8',
'sign_type'=>'MD5'

);
$con->t->assign('test_alipay_param',http_build_query($query));
$con->append();
?>
