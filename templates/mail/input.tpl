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
<div id="initialize">
    <div id="initialize2">
    <img src="/locale/{$smarty.const.LOCALE}/img/initialize/initialize_title.gif" alt="" height="26" width="665">
    <br />メールアドレス入力

    <form id="couponForm" name="couponForm" action= "{$smarty.const.KUJAPANURLSSL}/mail/input/sid/{$shop.0.shop_id}" method="post">
    <table class="initialize">
        <tr>
            <th class="title">メールアドレス<span class="attention">必须</span></th>
            <td class="form">
            {$error.mail|error_message}
            <p><input type="text" name="mail" value="{if $smarty.post.mail}{$smarty.post.mail|escape}{/if}" class="form_text_common" /></p></td>
        </tr>
        <tr>
            <td colspan="2">
                メールアドレス宛に購入処理にすすむURLが記載されています。URLをクリックして購入処理を進めてください。<br />
                購入後、ご登録いただいた、メールアドレス宛てに発行されたクーポン券が送信されます。
            </td>
        </tr>
    </table>
    <br />
    <table class="btn">
    <tbody>
    <tr>
        <td align="center">
            <input type="hidden" name="csrf_ticket" value="{$csrf_ticket}" />
            <input type="hidden" name="operation" value="" />
            <input type="hidden" name="sid" value="{$shop.0.shop_id}" />
            <input type="image" src="/locale/{$smarty.const.LOCALE}/img/button/add_btn.jpg" value="submit" class="btn" onClick="return form_regist()" />
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