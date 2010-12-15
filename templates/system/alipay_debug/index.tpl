<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
{include file="include/system/seo.inc"}
{include file="include/system/css.inc"}
{include file="include/system/js.inc"}
<link href="/css/divide_format.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
<div id="page">
<div id="main_l">
{include file="include/system/logout.inc"}
<div id="roof_l_white" class="clearfix">
    <div class="inside_l">
    {include file="include/system/navi.inc"}

            <p id="divide_format_title">支付方式</p>
            <div id="divide_format_message">
                <div id="form_btn">
                    <form id="couponForm" name="couponForm" action= "{$smarty.const.KUJAPANURLSSL}/system/alipay_debug/alipayto" method="post" target="_blank">
                        <input type="hidden" name="csrf_ticket" value="{$csrf_ticket}" />
                           <table class="paymethod">
                             <tr>
                               <td><input type="radio" name="pay_bank" value="directPay" checked><img src="/img/alipay/alipay_1.gif" border="0"/></td>
                             </tr>
                             <tr>
                               <td><input type="radio" name="pay_bank" value="ICBCB2C"/><img src="/img/alipay/ICBC_OUT.gif" border="0"/></td>
                               <td><input type="radio" name="pay_bank" value="CMB"/><img src="/img/alipay/CMB_OUT.gif" border="0"/></td>
                               <td><input type="radio" name="pay_bank" value="CCB"/><img src="/img/alipay/CCB_OUT.gif" border="0"/></td>
                               <td><input type="radio" name="pay_bank" value="BOCB2C"><img src="/img/alipay/BOC_OUT.gif" border="0"/></td>
                             </tr>
                             <tr>
                               <td><input type="radio" name="pay_bank" value="ABC"/><img src="/img/alipay/ABC_OUT.gif" border="0"/></td>
                               <td><input type="radio" name="pay_bank" value="COMM"/><img src="/img/alipay/COMM_OUT.gif" border="0"/></td>
                               <td><input type="radio" name="pay_bank" value="SPDB"/><img src="/img/alipay/SPDB_OUT.gif" border="0"/></td>
                               <td><input type="radio" name="pay_bank" value="GDB"><img src="/img/alipay/GDB_OUT.gif" border="0"/></td>
                             </tr>
                             <tr>
                               <td><input type="radio" name="pay_bank" value="CITIC"/><img src="/img/alipay/CITIC_OUT.gif" border="0"/></td>
                               <td><input type="radio" name="pay_bank" value="CEBBANK"/><img src="/img/alipay/CEB_OUT.gif" border="0"/></td>
                               <td><input type="radio" name="pay_bank" value="CIB"/><img src="/img/alipay/CIB_OUT.gif" border="0"/></td>
                               <td><input type="radio" name="pay_bank" value="SDB"><img src="/img/alipay/SDB_OUT.gif" border="0"/></td>
                             </tr>
                             <tr>
                               <td><input type="radio" name="pay_bank" value="CMBC"/><img src="/img/alipay/CMBC_OUT.gif" border="0"/></td>
                               <td><input type="radio" name="pay_bank" value="HZCBB2C"/><img src="/img/alipay/HZCB_OUT.gif" border="0"/></td>
                               <td><input type="radio" name="pay_bank" value="SHBANK"/><img src="/img/alipay/SHBANK_OUT.gif" border="0"/></td>
                               <td><input type="radio" name="pay_bank" value="NBBANK "><img src="/img/alipay/NBBANK_OUT.gif" border="0"/></td>
                             </tr>
                             <tr>
                               <td><input type="radio" name="pay_bank" value="SPABANK"/><img src="/img/alipay/SPABANK_OUT.gif" border="0"/></td>
                               <td><input type="radio" name="pay_bank" value="BJRCB"/><img src="/img/alipay/BJRCB_OUT.gif" border="0"/></td>
                               <td><input type="radio" name="pay_bank" value="ICBCBTB"/><img src="/img/alipay/ENV_ICBC_OUT.gif" border="0"/></td>
                               <td><input type="radio" name="pay_bank" value="CCBBTB"/><img src="/img/alipay/ENV_CCB_OUT.gif" border="0"/></td>
                             </tr>
                             <tr>
                               <td><input type="radio" name="pay_bank" value="SPDBB2B"/><img src="/img/alipay/ENV_SPDB_OUT.gif" border="0"/></td>
                               <td><input type="radio" name="pay_bank" value="ABCBTB"/><img src="/img/alipay/ENV_ABC_OUT.gif" border="0"/></td>
                               <td><input type="radio" name="pay_bank" value="fdb101"/><img src="/img/alipay/FDB_OUT.gif" border="0"/></td>
                               <td></td>
                             </tr>
                           </table>
                           <input type="image" src="/locale/{$smarty.const.LOCALE}/img/button/alipay_btn.jpg" value="submit" class="btn"/>
                    </form>
                </div>
            </div>

    </div>
</div>
</div>
</div>
</div>
{*フッター*}

</body>
</html>
