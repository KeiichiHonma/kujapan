<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="{$locale.lang}" xml:lang="{$locale.lang}" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
{*seo*}
{include file="include/header/seo.inc"}
    <link href="/css/0-import.css" rel="stylesheet" type="text/css" />
    <link href="/locale/{$smarty.const.LOCALE}/css/background.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/css/payment.css" media="all">
    <link href="/locale/{$smarty.const.LOCALE}/css/background.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/css/payment_print.css" type="text/css" media="print" />
    
    <meta content="text/javascript" http-equiv="Content-Script-Type" />
    <script src="/js/smartRollover.js" type="text/javascript"></script>
    <script src="/js/form.js" type="text/javascript"></script>
    <script src="/js/alphafilter.js" type="text/javascript"></script>
  </head>
  <body>
    <div id="wrapper">
      <div id="container">
{*ロゴ、グローバルナビ*}
{include file="include/header/header.inc"}
<div id="payment">
    <div id="payment2">
    <img src="/locale/{$smarty.const.LOCALE}/img/initialize/ready_title.gif" alt="" height="26" width="620">
    <br />{$locale.initialize_finish_message}
<table class="attention">
<tbody>
<tr>
    <td colspan="3" bgcolor="#e60101"><img src="/img/payment/shim.gif" height="1" width="2"></td>
</tr>
<tr>
    <td bgcolor="#e60101" width="1"><img src="/img/payment/shim.gif" height="2" width="1"></td>
    <td align="center" bgcolor="#ffe6e6" height="58" width="408">
        <table border="0" cellpadding="0" cellspacing="0" id="attention">
        <tbody>
        <tr>
            <td align="right">{$locale.account_validate_time}&nbsp;:&nbsp;</td>
            <td align="left"><b>{$validate_time|make_date:"Y/n/d G:i"}</b></td>
        </tr>
        </tbody>
        </table>
    </td>
    <td bgcolor="#e60101" width="1"><img src="/img/payment/shim.gif" height="2" width="1"></td>
</tr>
<tr>
    <td colspan="3" bgcolor="#e60101"><img src="/img/payment/shim.gif" height="1" width="2"></td>
</tr>
</tbody>
</table>

<table class="btn">
<tbody>
<tr>
    <td align="center"><a href="{$smarty.const.KUJAPANURL}/">{$locale.initialize_finish_action}</a></td>
</tr>
</tbody>
</table>

<div id="payment_confirm">
    <div id="payment_confirm2">
        <div id="payment_confirm3">
            <table class="text_confirm">
            <tbody>
            <tr><td><img src="/img/common/indent.gif" width="16" height="17"></td><td>{$locale.initialize_alert1}</td></tr>
            <tr><td><img src="/img/common/indent.gif" width="16" height="17"></td><td>{$locale.alert3}</td></tr>
            <tr><td><img src="/img/common/indent.gif" width="16" height="17"></td><td>{$locale.alert4}</td></tr>
            <tr><td><img src="/img/common/indent.gif" width="16" height="17"></td><td>{$locale.alert5}</td></tr>
            <tr><td><img src="/img/common/indent.gif" width="16" height="17"></td><td>{$locale.alert6}</td></tr>
            </tbody>
            </table>
        </div>
        <img src="/locale/{$smarty.const.LOCALE}/img/payment/confirm.jpg" height="170" width="620">
    </div>

</div>





    </div>
    <img src="/img/payment/frame.gif" height="500" width="640">
</div>


{*フッター*}
{include file="include/header/footer.inc"}
      </div>
    </div>
  </body>
</html>