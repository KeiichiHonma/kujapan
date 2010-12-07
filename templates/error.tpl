<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="{$locale.lang}" xml:lang="{$locale.lang}" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
{*seo*}
{include file="include/header/seo.inc"}
    <link href="/css/0-import.css" rel="stylesheet" type="text/css" />
    <link href="/css/error.css" rel="stylesheet" type="text/css" />
    <link href="/locale/{$smarty.const.LOCALE}/css/background.css" rel="stylesheet" type="text/css" />
    <meta content="text/javascript" http-equiv="Content-Script-Type" />
    <script src="/js/smartRollover.js" type="text/javascript"></script>
  </head>
  <body>
    <div id="wrapper">
      <div id="container">
{*ロゴ、グローバルナビ*}
{include file="include/header/header.inc"}

        <div id="e_main">
            <h2 class="h_title">{$locale.error_title}</h2>

            <div id="error_box">
{foreach from=$errorlist key="key" item="value" name="errorlist"}
{$value|nl2br}<br />
{/foreach}

                <div id="action">
                <a href="{$smarty.const.KUJAPANURL}/">{$locale.g_navi01}</a>
                </div>
            </div>
        </div>
{*フッター*}
{include file="include/header/footer.inc"}
      </div>
    </div>
  </body>
</html>