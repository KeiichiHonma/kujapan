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
            <p id="divide_format_title">支付方式</p>
            <div id="divide_format_message">
                <div id="form_btn">
                {if $is_alipay || !$debug}
                    <form id="couponForm" name="couponForm" action= "{$smarty.const.KUJAPANURL}/payment/alipayto" method="post" target="_blank">
                        <input type="hidden" name="csrf_ticket" value="{$csrf_ticket}" />
                           <table class="paymethod">
                             <tr>
                               <td><input type="radio" name="pay_bank" value="directPay" checked><img src="/img/alipay/alipay_1.gif" border="0"/></td>
                             </tr>
                             <tr>
                               <td><input type="radio" name="pay_bank" value="ICBCB2C"/><img src="/img/alipay/ICBC_OUT.gif" border="0"/></td>
                               <td><input type="radio" name="pay_bank" value="CMB"/><img src="/img/alipay/CMB_OUT.gif" border="0"/></td>
                               <td><input type="radio" name="pay_bank" value="CCB"/><img src="/img/alipay/CCB_OUT.gif" border="0"/></td>
                               <td><input type="radio" name="pay_bank" value="BOCB2C"><img src="/img/alipay/BOC_OUT.gif" border="0"/></td>
                             </tr>
                             <tr>
                               <td><input type="radio" name="pay_bank" value="ABC"/><img src="/img/alipay/ABC_OUT.gif" border="0"/></td>
                               <td><input type="radio" name="pay_bank" value="COMM"/><img src="/img/alipay/COMM_OUT.gif" border="0"/></td>
                               <td><input type="radio" name="pay_bank" value="SPDB"/><img src="/img/alipay/SPDB_OUT.gif" border="0"/></td>
                               <td><input type="radio" name="pay_bank" value="GDB"><img src="/img/alipay/GDB_OUT.gif" border="0"/></td>
                             </tr>
                             <tr>
                               <td><input type="radio" name="pay_bank" value="CITIC"/><img src="/img/alipay/CITIC_OUT.gif" border="0"/></td>
                               <td><input type="radio" name="pay_bank" value="CEBBANK"/><img src="/img/alipay/CEB_OUT.gif" border="0"/></td>
                               <td><input type="radio" name="pay_bank" value="CIB"/><img src="/img/alipay/CIB_OUT.gif" border="0"/></td>
                               <td><input type="radio" name="pay_bank" value="SDB"><img src="/img/alipay/SDB_OUT.gif" border="0"/></td>
                             </tr>
                             <tr>
                               <td><input type="radio" name="pay_bank" value="CMBC"/><img src="/img/alipay/CMBC_OUT.gif" border="0"/></td>
                               <td><input type="radio" name="pay_bank" value="HZCBB2C"/><img src="/img/alipay/HZCB_OUT.gif" border="0"/></td>
                               <td><input type="radio" name="pay_bank" value="SHBANK"/><img src="/img/alipay/SHBANK_OUT.gif" border="0"/></td>
                               <td><input type="radio" name="pay_bank" value="NBBANK "><img src="/img/alipay/NBBANK_OUT.gif" border="0"/></td>
                             </tr>
                             <tr>
                               <td><input type="radio" name="pay_bank" value="SPABANK"/><img src="/img/alipay/SPABANK_OUT.gif" border="0"/></td>
                               <td><input type="radio" name="pay_bank" value="BJRCB"/><img src="/img/alipay/BJRCB_OUT.gif" border="0"/></td>
                               <td><input type="radio" name="pay_bank" value="ICBCBTB"/><img src="/img/alipay/ENV_ICBC_OUT.gif" border="0"/></td>
                               <td><input type="radio" name="pay_bank" value="CCBBTB"/><img src="/img/alipay/ENV_CCB_OUT.gif" border="0"/></td>
                             </tr>
                             <tr>
                               <td><input type="radio" name="pay_bank" value="SPDBB2B"/><img src="/img/alipay/ENV_SPDB_OUT.gif" border="0"/></td>
                               <td><input type="radio" name="pay_bank" value="ABCBTB"/><img src="/img/alipay/ENV_ABC_OUT.gif" border="0"/></td>
                               <td><input type="radio" name="pay_bank" value="fdb101"/><img src="/img/alipay/FDB_OUT.gif" border="0"/></td>
                               <td></td>
                             </tr>
                           </table>
                           <input type="image" src="/locale/{$smarty.const.LOCALE}/img/button/alipay_btn.jpg" value="submit" class="btn"/>
                    </form>
                {else}
                    <a href="{$smarty.const.KUJAPANURLSSL}/payment/alipay" title="{$locale.buy_bt}">テスト決済へ</a>
                {/if}
                </div>
            </div>
        </div>


{*フッター*}
{include file="include/header/footer.inc"}
    </div>
  </div>
  </body>
</html>