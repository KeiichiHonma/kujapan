<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="{$locale.lang}" xml:lang="{$locale.lang}" xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
{*seo*}
{include file="include/header/seo.inc"}
    <link href="/css/0-import.css" rel="stylesheet" type="text/css" />
    <link href="/css/divide_format.css" rel="stylesheet" type="text/css" />
    <link href="/css/rule.css" rel="stylesheet" type="text/css" />
    <link href="/locale/{$smarty.const.LOCALE}/css/background.css" rel="stylesheet" type="text/css" />
    <meta content="text/javascript" http-equiv="Content-Script-Type" />
    <script src="/js/smartRollover.js" type="text/javascript"></script>
    <script src="/js/alphafilter.js" type="text/javascript"></script>
  </head>
  <body id="coupon">
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
{*全ページバナー*}
{include file="include/common/all_banner.inc"}
        </div>
        <div id="s_main">
          <h2 class="list">{$locale.footer_rule}</h2>
            <p id="divide_format_title">{$locale.rule_title}</p>
            <div id="divide_format_message">{$locale.rule_text}</div>
            <div id="rule_list">
                {foreach from=$locale.rule_sub key="key" item="value" name="rule_sub"}
                <div class="block">
                    <div class="title"><h3 class="rule">{$value.rule_subtitle}</h3></div>
                    <div class="detail">
                    {$value.rule_subtext}
                    </div>
                </div>
                {/foreach}
                <div class="block">
                    <div class="title"><h3 class="rule">{$locale.rule_section_title}</h3></div>
                    <div class="detail">
                    {$locale.rule_section_text}
                    </div>
                </div>
                {foreach from=$locale.rule_section key="key" item="value" name="rule_section"}
                <div class="block">
                    <div class="title"><h3 class="rule">{$value.rule_section_subtitle}</h3></div>
                    <div class="detail">
                    {$value.rule_section_subtext}
                    {if isset($value.rule_section_subtext_item)}
                    <ul>
                    {foreach from=$value.rule_section_subtext_item key="key2" item="value2" name="rule_section_subtext_item"}
                    <li>{$value2}</li>
                    {/foreach}
                    </ul>
                    {/if}
                    </div>
                </div>
                {/foreach}
            </div>
        </div>


{*フッター*}
{include file="include/header/footer.inc"}
    </div>
  </div>
  </body>
</html>