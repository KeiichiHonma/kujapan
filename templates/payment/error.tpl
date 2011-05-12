<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="{$locale.lang}" xml:lang="{$locale.lang}" xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
{*seo*}
{include file="include/header/seo.inc"}
    <link href="/css/0-import.css" rel="stylesheet" type="text/css" />
    <link href="/css/divide_format.css" rel="stylesheet" type="text/css" />
    <link href="/css/payment.css" rel="stylesheet" type="text/css" />
    <link href="/locale/{$smarty.const.LOCALE}/css/background.css" rel="stylesheet" type="text/css" />
    <meta content="text/javascript" http-equiv="Content-Script-Type" />
    <script src="/js/smartRollover.js" type="text/javascript"></script>
    <script src="/js/alphafilter.js" type="text/javascript"></script>
  </head>
  <body id="divide_format">
    <div id="wrapper">
      <div id="container">
{*ロゴ、グローバルナビ*}
{include file="include/header/header.inc"}
{*ポジション*}
{include file="include/common/position.inc"}
        <div class="clear" id="s_sub">
{*ログインボックス*}
{include file="include/common/login_box.inc"}
{*エリアボックス*}
{include file="include/common/area_box.inc"}
{*ジャンルボックス*}
{include file="include/common/genre_box.inc"}
        </div>
        <div id="s_main">
          <h2 class="list">{$locale.error_title}</h2>
            <p id="divide_format_title">{$locale.error_message}</p>
            <div id="divide_format_message">&nbsp;</div>

        <table class="contact">
            <tr>
            <th class="title"></th><th class="item">{$locale.contact_column_telephone}</th><th class="text">{$locale.contact_column_opening}</th><th class="text">{$locale.contact_column_detail}</th>
            </tr>
            <tr>
            <td class="title">{$locale.contact_column_name}</td><td>
            {if $smarty.const.LOCALE == "tw"}
            {mailto address="info@813.co.jp" encode="hex" text="info@813.co.jp"}
            {else}
            {$locale.telephone}
            {/if}
            </td><td>{$locale.contact_opening_time}</td><td>{$locale.contact_detail}</td>
            </tr>
        </table>
        </div>


{*フッター*}
{include file="include/header/footer.inc"}
    </div>
  </div>
  </body>
</html>