<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="{$locale.lang}" xml:lang="{$locale.lang}" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
{*seo*}
{include file="include/header/seo.inc"}
    <link rel="stylesheet" type="text/css" href="/css/common.css" media="all">
    <link rel="stylesheet" type="text/css" href="/locale/{$smarty.const.LOCALE}/css/background.css" media="all">
    <link rel="stylesheet" type="text/css" href="/css/print.css" media="all">
  </head>
  <body id="coupon">
    <div id="wrapper">
      <div id="container">
        <table id="header">
        <tr><td class="control">{$control_no}</td><td>{$shop.0.shop_name}</td><td class="contact">{$locale.contact}{$locale.telephone}</td></tr>
        </table>
        <table id="top">
        <tr>
            <td class="logo1"><img alt="{$locale.site_name}" src="/img/visual/logo_s.gif" width="150" height="31" /></td>
            <td class="logo2"><img alt="" src="/img/logo/{$shop.0.shop_id}m.gif" width="165" height="65" /></td>
            <td>&nbsp;</td>
            <td class="btn"><a class="print" href="#" onclick="window.print(); return false;">{$locale.print_bt}</a></td>
        </tr>
        </table>

        <img src="{$smarty.const.KUJAPANURL}/security" /><br />

        {*クーポン情報*}
        
            {foreach from=$coupon key="key" item="value" name="coupon"}
            <table class="coupon">
                <tr>
                    <th rowspan="2" class="icon"><img alt="" src="/img/coupon/coupon_icon.gif" width="31" height="29" /></th>
                    <th class="coupon">{$value.coupon_title}</th>
                    <td>{$locale.coupon_validate_time}&nbsp;{$value.col_validate_time|make_date}<br />{$value.coupon_condition|nl2br}</td>
                </tr>
                <tr>
                    <th lang="ja" class="japan">{$value.col_title_ja}</th>
                    <td lang="ja" class="japan">{$locale.coupon_validate_time}&nbsp;{$value.col_validate_time|make_date}<br />{$value.col_condition_ja|nl2br}</td>
                </tr>
            </table>
            {/foreach}
        

        <table id="shop">
            {*地図*}
            {if $shop_item_map}
            <tr><td colspan="4" class="map"><img src="{$shop_item_map.file_id|getFilePath:$shop_item_map.col_extension}" width="{$shop_item_map.col_width}" height="{$shop_item_map.col_height}" alt="{$shop_item_map.col_alt}" /></td></tr>
            {/if}
            <tr><td class="title">{$locale.shop_address}</td><td colspan="3" class="data">{$shop.0.shop_address}</td></tr>
            <tr><td class="title">{$locale.shop_open_hour}</td><td class="data2">{$shop.0.shop_open_hour}</td><td class="title">{$locale.shop_holiday}</td><td class="data2">{$shop.0.shop_holiday}</td></tr>
        </table>
        
        <table id="etc">
            <tr><td class="attention">
              <ul>
                <li>{$locale.alert_title}</li>
                <li>・{$locale.alert1}</li>
                <li>・{$locale.alert2}</li>
                <li>・{$locale.alert3}</li>
                <li>・{$locale.alert4}</li>
                <li>・{$locale.alert5}</li>
                <li>・{$locale.alert6}</li>
              </ul>
            </td>
            {if $shop_item_barcode}
            <td class="barcode">
            <img src="{$shop_item_barcode.file_id|getFilePath:$shop_item_barcode.col_extension}" width="{$shop_item_barcode.col_width}" height="{$shop_item_barcode.col_height}" alt="{$shop_item_barcode.col_alt}" />
            </td>
            {/if}
            </tr>
        </table>
{include file="include/google/analytics.inc"}
    </div>
  </div>
  </body>
</html>