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
{include file="include/header/header2.inc"}
<div id="payment">
    <div id="payment2">
        <img src="/locale/{$smarty.const.LOCALE}/img/initialize/ready_title.gif" alt="" height="26" width="620">
        <br />送信しました。
        <div id="payment_confirm">
            <div id="payment_confirm2">
                <div id="payment_confirm3">
                    <table class="text_confirm">
                    <tbody>
                    <tr><td><img src="/img/common/indent.gif" width="16" height="17"></td><td>送信したのでURLから購入処理を進めてください。</td></tr>
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