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
<div id="initialize">
    <div id="initialize2">
    <img src="/locale/{$smarty.const.LOCALE}/img/initialize/initialize_title.gif" alt="" height="26" width="665">
    <br />{$locale.initialize_message}

    <form id="couponForm" name="couponForm" action= "{$smarty.const.KUJAPANURLSSL}/initialize/input/code/{$rand}" method="post">
    <table class="initialize">
        <tr>
            <th class="title">{$locale.input_given_name}<span class="attention">{$locale.input_must}</span><br />{$locale.input_given_name_remark}</th>
            <td class="form">
            {$error.given_name|error_message}
            <p><input type="text" name="given_name" value="{if $smarty.post.given_name}{$smarty.post.given_name|escape}{/if}" class="form_text_common" /></p></td>
        </tr>
        <tr>
            <td colspan="2">
                {$locale.input_given_name_message1}<br />
                {$locale.input_given_name_message2}<br />
                {$locale.input_given_name_message3}
            </td>
        </tr>
    </table>

{*    <table class="initialize">
        <tr>
            <td class="title">{$locale.input_mail}</td>
            <td class="form">
            {$error.mail|error_message}
            <p><input type="text" name="mail" value="{if $smarty.post.mail}{$smarty.post.mail|escape}{/if}" class="form_text_common" /></p></td>
        </tr>
        <tr>
            <td colspan="2">
                {$locale.input_mail_message1}
            </td>
        </tr>
    </table>*}
    <br />
    <table class="btn">
    <tbody>
    <tr>
        <td align="center">
            <input type="hidden" name="csrf_ticket" value="{$csrf_ticket}" />
            <input type="hidden" name="operation" value="check" />
            <input type="image" src="/locale/{$smarty.const.LOCALE}/img/button/confirm_btn.jpg" value="submit" class="btn" onClick="return form_confirm(this)" />
        </td>
    </tr>
    </tbody>
    </table>
    </form>

    </div>
    <img src="/img/initialize/frame.gif" height="300" width="705">
</div>


{*フッター*}
{include file="include/header/footer.inc"}
      </div>
    </div>
  </body>
</html>