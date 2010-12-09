<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
{include file="include/system/seo.inc"}
<link type="text/css" rel="stylesheet" href="/css/system/contents.css" />
<link type="text/css" rel="stylesheet" href="/css/system/support.css" />
<link rel="stylesheet" type="text/css" href="/css/print.css" media="all">
{include file="include/system/js.inc"}
</head>
<body>
<div id="wrapper">
<div id="page">
<div id="main_l">
{include file="include/system/logout.inc"}
<div id="roof_l_white">
    <div class="inside_l">
        {include file="include/system/navi.inc"}

        <h2 class="search_title">{$locale.coupon_search_title}</h2>
        <div class="title_box search_box clearfix">
            <dl>
                <dd class="search clearfix">
                    <dl>
                        <dt class="keyword_list">
                        {$locale.coupon_search_keyword}
                        </dt>
                        <dd class="theme_data">
                        {if $error}<span class="error_alert">{$locale.coupon_error_1}</span>{/if}
            <form name="form_search" action="{$smarty.const.KUJAPANURLSSL}/system/coupon/search" method="get" onSubmit="return checkLogForm(this.sid,this.customer_no,this.last_no)">
            <input type="text" name="sid" value="{$smarty.get.sid}" class="keyword" />-<input type="text" name="customer_no" value="{$smarty.get.customer_no}" class="keyword" />-<input type="text" name="last_no" value="{$smarty.get.last_no}" class="keyword" />
            <input type="submit" value="  {$locale.coupon_search_btn}  " class="go" />
            </form>
            {$locale.coupon_search_help}
                        </dd>
                    </dl>
                </dd>
                <dd class="search clearfix">
                    <dl>
                        <dt class="subtheme_list">
                        {$locale.coupon_search_item}
                        </dt>
                        <dd class="theme_data">
                        {$locale.coupon_search_item_value}
                        </dd>
                    </dl>
                </dd>
                
            </dl>
            <p class="init"><img src="/img/system/reset.gif" alt="" width="12" height="12" border="0" />&nbsp;<a href="{$smarty.const.KUJAPANURLSSL}/system/coupon/">{$locale.coupon_search_reset}</a></p>
        </div>
        <h2 class="h_title">{$print_time|make_date}{$locale.coupon_display_title}</h2>
        {if $display_coupon}
        {*ユーザーが見ているクーポン情報*}
            {foreach from=$display_coupon key="cid" item="value" name="display_coupon"}
            <table class="coupon">
                <tr>
                    <th rowspan="3" class="icon"><img alt="" src="/img/coupon/coupon_icon.gif" width="31" height="29" /></th>
{if $server == 'net'}
                    <th class="coupon">
                    {if isset($alert_list.$cid.title_tw)}<span class="error_alert">{/if}{$value.col_title_tw}{if isset($alert_list.$cid.title_tw)}</span>{/if}
                    </th>
                    <td>{$locale.col_validate_time}&nbsp;
                    {if isset($alert_list.$cid.validate_time)}<span class="error_alert">{/if}{$value.col_validate_time|make_date}{if isset($alert_list.$cid.validate_time)}</span>{/if}
                    <br />{if isset($alert_list.$cid.condition_tw)}<span class="error_alert">{/if}{$value.col_condition_tw|nl2br}{if isset($alert_list.$cid.condition_tw)}</span>{/if}
                    </td>
{else}
                    <th class="coupon">
                    {if isset($alert_list.$cid.title_cn)}<span class="error_alert">{/if}{$value.col_title_cn}{if isset($alert_list.$cid.title_cn)}</span>{/if}
                    </th>
                    <td>{$locale.col_validate_time}&nbsp;
                    {if isset($alert_list.$cid.validate_time)}<span class="error_alert">{/if}{$value.col_validate_time|make_date}{if isset($alert_list.$cid.validate_time)}</span>{/if}
                    <br />{if isset($alert_list.$cid.condition_cn)}<span class="error_alert">{/if}{$value.col_condition_cn|nl2br}{if isset($alert_list.$cid.condition_cn)}</span>{/if}
                    </td>
                    
{/if}
                </tr>
                <tr>
                    <th lang="ja" class="japan">
                    {if isset($alert_list.$cid.title_ja)}<span class="error_alert">{/if}{$value.col_title_ja}{if isset($alert_list.$cid.title_ja)}</span>{/if}
                    </th>
                    <td lang="ja" class="japan">{$locale.col_validate_time}&nbsp;
                    {if isset($alert_list.$cid.validate_time)}<span class="error_alert">{/if}{$value.col_validate_time|make_date}{if isset($alert_list.$cid.validate_time)}</span>{/if}
                    <br />{if isset($alert_list.$cid.condition_ja)}<span class="error_alert">{/if}{$value.col_condition_ja|nl2br}{if isset($alert_list.$cid.condition_ja)}</span>{/if}
                    </td>
                </tr>
            </table>
            {/foreach}
        {/if}
        <br />
        <h2 class="h_title">{$locale.coupon_current_title}</h2>
        {if $current_coupon && count($alert_list) > 0}
        {*ユーザーが見ているクーポン情報*}
            {foreach from=$current_coupon key="cid" item="value" name="current_coupon"}
            <table class="coupon">
                <tr>
                    <th rowspan="3" class="icon"><img alt="" src="/img/coupon/coupon_icon.gif" width="31" height="29" /></th>
{if $server == 'net'}
                    <th class="coupon">
                    {if isset($alert_list.$cid.title_tw)}<span class="error_alert">{/if}{$value.col_title_tw}{if isset($alert_list.$cid.title_tw)}</span>{/if}
                    </th>
                    <td>{$locale.col_validate_time}&nbsp;
                    {if isset($alert_list.$cid.validate_time)}<span class="error_alert">{/if}{$value.col_validate_time|make_date}{if isset($alert_list.$cid.validate_time)}</span>{/if}
                    <br />{if isset($alert_list.$cid.condition_tw)}<span class="error_alert">{/if}{$value.col_condition_tw|nl2br}{if isset($alert_list.$cid.condition_tw)}</span>{/if}
                    </td>
{else}
                    <th class="coupon">
                    {if isset($alert_list.$cid.title_cn)}<span class="error_alert">{/if}{$value.col_title_cn}{if isset($alert_list.$cid.title_cn)}</span>{/if}
                    </th>
                    <td>{$locale.col_validate_time}&nbsp;
                    {if isset($alert_list.$cid.validate_time)}<span class="error_alert">{/if}{$value.col_validate_time|make_date}{if isset($alert_list.$cid.validate_time)}</span>{/if}
                    <br />{if isset($alert_list.$cid.condition_cn)}<span class="error_alert">{/if}{$value.col_condition_cn|nl2br}{if isset($alert_list.$cid.condition_cn)}</span>{/if}
                    </td>
                    
{/if}
                </tr>
                <tr>
                    <th lang="ja" class="japan">
                    {if isset($alert_list.$cid.title_ja)}<span class="error_alert">{/if}{$value.col_title_ja}{if isset($alert_list.$cid.title_ja)}</span>{/if}
                    </th>
                    <td lang="ja" class="japan">{$locale.col_validate_time}&nbsp;
                    {if isset($alert_list.$cid.validate_time)}<span class="error_alert">{/if}{$value.col_validate_time|make_date}{if isset($alert_list.$cid.validate_time)}</span>{/if}
                    <br />{if isset($alert_list.$cid.condition_ja)}<span class="error_alert">{/if}{$value.col_condition_ja|nl2br}{if isset($alert_list.$cid.condition_ja)}</span>{/if}
                    </td>
                </tr>
            </table>
            {/foreach}
        {else}
        {$locale.coupon_search_none}
        {/if}
    </div>
</div>
</div>
</div>
</div>
</body>
</html>
