<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="{$locale.lang}" xml:lang="{$locale.lang}" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
{*seo*}
{include file="include/header/seo.inc"}
    <link href="/css/0-import.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/css/payment.css" media="all">
    <link href="/locale/{$smarty.const.LOCALE}/css/background.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/css/payment_print.css" type="text/css" media="print" />

    <meta content="text/javascript" http-equiv="Content-Script-Type" />
    <script src="/js/smartRollover.js" type="text/javascript"></script>
    <script src="/js/form.js" type="text/javascript"></script>
    <script src="/js/alphafilter.js" type="text/javascript"></script>
    {include file="include/conversion/yahoo.inc"}
  </head>
  <body>
    <div id="wrapper">
      <div id="container">
{*ロゴ、グローバルナビ*}
{include file="include/header/header.inc"}
<div id="payment">
    <div id="payment2">
        <img src="/locale/{$smarty.const.LOCALE}/img/payment/thanks_title.gif" alt="" height="26" width="620">
        <br />{$locale.finish_message}
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
                    <td align="right">{$locale.customer_no}&nbsp;:&nbsp;</td>
                    <td align="left"><b>{$customer_no}</b></td>
                </tr>
                <tr>
                    <td align="right">{$locale.buy_time}&nbsp;:&nbsp;</td>
                    <td align="left">{$buy_time|make_date:"Y/n/d G:i"}</td>
                </tr>
                <tr>
                    <td align="right">{$locale.login_account}&nbsp;:&nbsp;</td>
                    <td align="left"><b>{$login_account}</b></td>
                </tr>
                <tr>
                    <td align="right" class="last">{$locale.login_password}&nbsp;:&nbsp;</td>
                    <td align="left" class="last"><b>{$login_password}</b></td>
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

        <div id="payment_confirm">
            <div id="payment_confirm2">
                <div id="payment_confirm3">
                    <table class="text_confirm">
                    <tbody>
                    <tr><td><img src="/img/common/indent.gif" width="16" height="17"></td><td>{$locale.payment_alert1}</td></tr>
                    <tr><td><img src="/img/common/indent.gif" width="16" height="17"></td><td>{$locale.payment_alert2}</td></tr>
                    <tr><td><img src="/img/common/indent.gif" width="16" height="17"></td><td>{$locale.payment_alert3}</td></tr>
                    <tr><td><img src="/img/common/indent.gif" width="16" height="17"></td><td>{$locale.payment_alert4}</td></tr>
                    </tbody>
                    </table>
                </div>
                <img src="/locale/{$smarty.const.LOCALE}/img/payment/confirm.jpg" height="170" width="620">
            </div>
{if !$maintenance}
        <table class="btn">
        <tbody>
        <tr>
            <td align="center">
                    <form action="{$smarty.const.KUJAPANURLSSL}{$smarty.server.REQUEST_URI}" method="post">
                      <p class="mt_15">
                        <input type="hidden" name="csrf_ticket" value="{$csrf_ticket}" />
                        <input type="hidden" name="auth" value="login" />
                        <input type="hidden" name="account" value="{$login_account}" />
                        <input type="hidden" name="password" value="{$login_password}" />
                        <input type="image" src="/locale/{$smarty.const.LOCALE}/img/button/top_login_bt.gif"  class="btn" value="submit" />
                      </p>
                    </form>
            </td>
        </tr>
        </tbody>
        </table>
{else}
        <table class="maintenance">
        <tbody>
        <tr>
            <td colspan="3" bgcolor="#e60101"><img src="/img/payment/shim.gif" height="1" width="2"></td>
        </tr>
        <tr>
            <td bgcolor="#e60101" width="1"><img src="/img/payment/shim.gif" height="2" width="1"></td>
            <td align="left" bgcolor="#ffe6e6" height="58" width="508">
                <table border="0" cellpadding="0" cellspacing="0" id="attention">
                <tbody>
                <tr>
                    <td class="last">{$locale.maintenance_title}<br />{$locale.payment_maintenance_time}<br />{$locale.payment_maintenance_message}</td>
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

{/if}
        </div>
    </div>
    <img src="/img/payment/frame.gif" width="640" height="500">
</div>


{*フッター*}
{include file="include/header/footer.inc"}
      </div>
    </div>
  </body>
</html>