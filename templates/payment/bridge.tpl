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
          <h2 class="list">{$locale.bridge_title}</h2>
            <p id="divide_format_title">{$locale.bridge_confirm}</p>
            <div id="divide_format_message">
            <ul class="indentbox">
                <li>{$locale.bridge_alert1}</li>
                <li>{$locale.bridge_alert2}</li>
                <li>{$locale.bridge_alert3}</li>
            </ul>
            </div>

            <p id="divide_format_title">{$locale.footer_rule}</p>
            <div id="divide_format_message">
            <ul class="indentbox">
<textarea rows="15" cols="40" class="rule_regulation" readonly>{$locale.rule_title}

{$locale.rule_text}
{foreach from=$locale.rule_sub key="key" item="value" name="rule_sub"}

{$value.rule_subtitle}

{$value.rule_subtext}
{/foreach}

{$locale.rule_section_title}

{$locale.rule_section_text}
{foreach from=$locale.rule_section key="key" item="value" name="rule_section"}

{$value.rule_section_subtitle}

{$value.rule_section_subtext}
{if isset($value.rule_section_subtext_item)}
{foreach from=$value.rule_section_subtext_item key="key2" item="value2" name="rule_section_subtext_item"}

{$value2}
{/foreach}
{/if}
{/foreach}
</textarea>
            </div>
                <div id="form_btn">
                {if $is_alipay || !$debug}
                    <form id="couponForm" name="couponForm" action= "{$smarty.const.KUJAPANURL}/payment/alipayto" method="post" target="_blank">
                        <input type="hidden" name="csrf_ticket" value="{$csrf_ticket}" />
                           <input type="image" src="/locale/{$smarty.const.LOCALE}/img/button/alipay_btn.jpg" value="submit" class="btn"/>
                    </form>
                {else}
                    <a href="{$smarty.const.KUJAPANURLSSL}/payment/alipay" title="{$locale.buy_bt}">テスト決済へ</a>
                {/if}
                </div>
        </div>


{*フッター*}
{include file="include/header/footer.inc"}
    </div>
  </div>
  </body>
</html>