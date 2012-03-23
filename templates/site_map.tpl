<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="{$locale.lang}" xml:lang="{$locale.lang}" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
{*seo*}
{include file="include/header/seo.inc"}
    <link href="/css/0-import.css" rel="stylesheet" type="text/css" />
    <link href="/css/sitemap.css" rel="stylesheet" type="text/css" />
    <meta content="text/javascript" http-equiv="Content-Script-Type" />
    <script src="/js/smartRollover.js" type="text/javascript"></script>
  </head>
  <body id="coupon">
    <div id="wrapper">
      <div id="container">
{*ロゴ、グローバルナビ*}
{include file="include/header/header.inc"}
{*ポジション*}
{include file="include/common/position.inc"}

    <div id="sitemap">
        <div class="menu">
            <p class="ttl">{$locale.site_name}</p>
            <ul class="linkbox">
                <li><a href="{$smarty.const.KUJAPANURL}/">{$locale.g_navi01}</a></li>
                <li><a href="{$smarty.const.KUJAPANURL}/about">{$locale.g_navi02}</a></li>
                <li><a href="{$smarty.const.KUJAPANURL}/rule">{$locale.footer_rule}</a></li>
                <li><a href="{$smarty.const.KUJAPANURL}/corp">{$locale.footer_corp}</a></li>
            </ul>
        </div>
        <div class="menu">
            <p class="ttl">{$locale.spot_title}</p>
            <ul class="linkbox">
{foreach from=$area key="aid" item="value" name="area"}
            <li><a href="{$smarty.const.KUJAPANURL}/area/aid/{$aid}">{$value.col_name}</a></li>
{/foreach}
            </ul>
        </div>
        <div class="menu">
            <p class="ttl">{$locale.genre_title}</p>
            <ul class="linkbox">
{foreach from=$genre key="gid" item="value" name="genre"}
          <li><a href="{$smarty.const.KUJAPANURL}/genre/gid/{$gid}">{$value.col_name}</a></li>
{/foreach}
            </ul>
        </div>
    </div>
{*フッター*}
{include file="include/header/footer.inc"}
    </div>
  </div>
  </body>
</html>