<?php
/*
array(6) {
  ["aliorder"]=>
  string(4) "test"
  ["alimoney"]=>
  string(2) "99"
  ["alibody"]=>
  string(5) "test2"
  ["pay_bank"]=>
  string(9) "directPay"
  ["nextstep_x"]=>
  string(2) "68"
  ["nextstep_y"]=>
  string(2) "22"
}

array(6) {
  ["aliorder"]=>
  string(4) "test"
  ["alimoney"]=>
  string(2) "99"
  ["alibody"]=>
  string(5) "test2"
  ["pay_bank"]=>
  string(4) "SPDB"
  ["nextstep_x"]=>
  string(3) "101"
  ["nextstep_y"]=>
  string(2) "23"
}

*/

//require_once('user/prepend.php');
require_once('fw/container.php');
$con = new container();

$uid = $con->base->getPath('uid',TRUE);

//ユーザー情報と商品情報取得
require_once('user/logic.php');
$u_logic = new userLogic();
$user = $u_logic->getUser($uid);

if($user){
    $con->t->assign('user',$user);
}else{
    require_once('fw/errorManager.php');
    errorManager::throwError(E_CMMN_USER_EXISTS);
}

require_once('shop/logic.php');
$s_logic = new shopLogic();
$shop = $s_logic->getOneShop($user[0]['col_sid']);
if($shop){
    $con->t->assign('shop',$shop);
}else{
    require_once('fw/errorManager.php');
    errorManager::throwError(E_CMMN_SHOP_EXISTS);
}


//$_POST['aliorder'] = $con->locale['alipay_product_title'];
$_POST['aliorder'] = $shop[0]['col_c_title'];

//$_POST['alibody'] = $con->locale['alipay_product_detail'];
$_POST['alibody'] = $shop[0]['col_c_detail'];



if($con->isDebug){
    $_POST['alimoney'] = 0.1;
}else{
    //$_POST['alimoney'] = 99;
    //$_POST['alimoney'] = $shop[0]['col_c_price'];
    $_POST['alimoney'] = 0.1;
}

require_once("alipay/alipay_config.php");

//return 改変
$return_url        = 'https://'.$_SERVER['SERVER_NAME']."/payment/return_url.php?uid=".$uid;

require_once("alipay/alipay_service.php");


$out_trade_no = date(Ymdhms);        //请与贵网站订单系统中的唯一订单号匹配
$subject      = $_POST['aliorder'];    //订单名称，显示在支付宝收银台里的“商品名称”里，显示在支付宝的交易管理的“商品名称”的列表里。
$body         = $_POST['alibody'];    //订单描述、订单详细、订单备注，显示在支付宝收银台里的“商品描述”里
$total_fee    = $_POST['alimoney'];    //订单总金额，显示在支付宝收银台里的“应付总额”里

//扩展功能参数——网银提前
$pay_mode      = $_POST['pay_bank'];
if ($pay_mode == "directPay") {
    $paymethod    = "directPay";    //默认支付方式，四个值可选：bankPay(网银); cartoon(卡通); directPay(余额); CASH(网点支付)
    $defaultbank  = "";
}
else {
    $paymethod    = "bankPay";        //默认支付方式，四个值可选：bankPay(网银); cartoon(卡通); directPay(余额); CASH(网点支付)
    $defaultbank  = $pay_mode;        //默认网银代号，代号列表见http://club.alipay.com/read.php?tid=8681379
}


//扩展功能参数——防钓鱼
$encrypt_key  = '';                    //防钓鱼时间戳，初始值
$exter_invoke_ip = '';                //客户端的IP地址，初始值
if($antiphishing == 1){
    $encrypt_key = query_timestamp($partner);
    $exter_invoke_ip = '';            //获取客户端的IP地址，建议：编写获取客户端IP地址的程序
}

//扩展功能参数——其他
$extra_common_param = '';            //自定义参数，可存放任何内容（除=、&等特殊字符外），不会显示在页面上
$buyer_email        = '';            //默认买家支付宝账号

//扩展功能参数——分润(若要使用，请按照注释要求的格式赋值)
$royalty_type        = "";            //提成类型，该值为固定值：10，不需要修改
$royalty_parameters    = "";
//提成信息集，与需要结合商户网站自身情况动态获取每笔交易的各分润收款账号、各分润金额、各分润说明。最多只能设置10条
//各分润金额的总和须小于等于total_fee
//提成信息集格式为：收款方Email_1^金额1^备注1|收款方Email_2^金额2^备注2
//如：
//royalty_type = "10"
//royalty_parameters    = "111@126.com^0.01^分润备注一|222@126.com^0.01^分润备注二"


//扩展功能参数——自定义超时(若要使用，请按照注释要求的格式赋值)
//该功能默认不开通，
//申请开通方式：拨打0571-88158090申请或提交集成申请（https://b.alipay.com/support/helperApply.htm?action=consultationApply）
//超时时间，不填默认是15天。设置范围：1m~15d。 m-分钟，h-小时，d-天，1c-当天（无论何时创建，交易都在0点关闭）
$it_b_pay            = "";

/////////////////////////////////////////////////

//构造要请求的参数数组，无需改动
$parameter = array(
        "service"            => "create_direct_pay_by_user",    //接口名称，不需要修改
        "payment_type"        => "1",                           //交易类型，不需要修改

        //获取配置文件(alipay_config.php)中的值
        "partner"            => $partner,
        "seller_email"        => $seller_email,
        "return_url"        => $return_url,
        "notify_url"        => $notify_url,
        "_input_charset"    => $_input_charset,
        "show_url"            => $show_url,

        //从订单数据中动态获取到的必填参数
        "out_trade_no"        => $out_trade_no,
        "subject"            => $subject,
        "body"                => $body,
        "total_fee"            => $total_fee,

        //扩展功能参数——网银提前
        "paymethod"            => $paymethod,
        "defaultbank"        => $defaultbank,

        //扩展功能参数——防钓鱼
        "anti_phishing_key"    => $encrypt_key,
        "exter_invoke_ip"    => $exter_invoke_ip,

        //扩展功能参数——自定义参数
        "buyer_email"        => $buyer_email,
        "extra_common_param"=> $extra_common_param,
        
        //扩展功能参数——分润
        "royalty_type"        => $royalty_type,
        "royalty_parameters"=> $royalty_parameters,

        //扩展功能参数——自定义超时
        "it_b_pay"            => $it_b_pay
);

//构造请求函数
$alipay = new alipay_service($parameter,$key,$sign_type);
$sHtmlText = $alipay->build_form();
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>支付宝即时支付</title>
        <style type="text/css">
            .font_content{
                font-family:"宋体";
                font-size:14px;
                color:#FF6600;
            }
            .font_title{
                font-family:"宋体";
                font-size:16px;
                color:#FF0000;
                font-weight:bold;
            }
            table{
                border: 1px solid #CCCCCC;
            }
        </style>
    </head>
    <body>
        <table align="center" width="350" cellpadding="5" cellspacing="0">
            <tr>
                <td align="center" class="font_title" colspan="2">订单确认</td>
            </tr>
            <tr>
                <td class="font_content" align="right">订单号：</td>
                <td class="font_content" align="left"><?php echo $out_trade_no; ?></td>
            </tr>
            <tr>
                <td class="font_content" align="right">付款总金额：</td>
                <td class="font_content" align="left"><?php echo $total_fee; ?></td>
            </tr>
            <tr>
                <td align="center" colspan="2"><?php echo $sHtmlText; ?></td>
            </tr>
        </table>
    </body>
</html>