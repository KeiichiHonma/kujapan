<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
{include file="include/system/seo.inc"}
{include file="include/system/css.inc"}
{include file="include/system/js.inc"}
<link id="calendar_style" href="/css/system/simple.css" media="screen" rel="Stylesheet" type="text/css" />
<script src="/js/prototype.js" type="text/javascript"></script>
<script src="/js/effects.js" type="text/javascript"></script>
<script src="/js/protocalendar.js" type="text/javascript"></script>
<script src="/js/lang_ja.js" type="text/javascript"></script>
</head>
<body>
<div id="wrapper">
{*サイトポジション*}
{include file="include/system/position.inc"}
<div id="page">
<div id="main_l">
{include file="include/system/logout.inc"}
<div id="roof_l_white">
    <div class="inside_l">
        {include file="include/system/navi.inc"}
        <h2 class="h_title">ユーザー情報変更</h2>
        <p class="m_b10">以下の項目を入力して[変更]ボタンをクリックしてください。<span class="attention">＊</span>の項目は必須となります。</p>
        <form id="couponForm" name="couponForm" action= "{$smarty.const.KUJAPANURLSSL}/system/user/edit/input/uid/{$user.0._id}" method="post">

        <table id="suggest">
        <tr>
        <th colspan="2">ユーザー情報</th>
        </tr>

        <tr>
        <td width="150" valign="top">{$locale.user_validate_title|error_bold:$error.validate}<span class="attention">＊</span></td>
        <td valign="top">
        {$error.validate|error_message}
        <input type="radio" name="validate"{if strcasecmp($smarty.post.validate,$smarty.const.VALIDATE_ALLOW) == 0} checked{/if} value="{$smarty.const.VALIDATE_ALLOW}">有効
        <input type="radio" name="validate"{if strcasecmp($smarty.post.validate,$smarty.const.VALIDATE_DENY) == 0} checked{/if} value="{$smarty.const.VALIDATE_DENY}">停止
        </td>
        </tr>

        <tr>
        <td width="150" valign="top">{$locale.user_status_title|error_bold:$error.status}<span class="attention">＊</span></td>
        <td valign="top">
        {$error.status|error_message}
        <input type="radio" name="status"{if strcasecmp($smarty.post.status,$smarty.const.STATUS_USER_REGIST) == 0} checked{/if} value="{$smarty.const.STATUS_USER_REGIST}">登録済み
        <input type="radio" name="status"{if strcasecmp($smarty.post.status,$smarty.const.STATUS_USER_TMP) == 0} checked{/if} value="{$smarty.const.STATUS_USER_TMP}">未登録
        </td>
        </tr>

        <tr>
        <td width="150" valign="top">{$locale.user_given_name_title|error_bold:$error.given_name}</td>
        <td valign="top">
        {$error.given_name|error_message}<input type="text" name="given_name" value="{$smarty.post.given_name}" class="form_text_common" /></td>
        </tr>

        <tr>
        <td width="150" valign="top">{$locale.user_mail_title|error_bold:$error.buyer_email}</td>
        <td valign="top">
        {$error.buyer_email|error_message}<input type="text" name="buyer_email" value="{$smarty.post.buyer_email}" class="form_text_common" /></td>
        </tr>

        <tr>
        <td width="150" valign="top">{$locale.customer_no|error_bold:$error.customer_no}<span class="attention">＊</span></td>
        <td valign="top">
        {$error.customer_no|error_message}<input type="text" name="customer_no" value="{$smarty.post.customer_no}" class="form_text_common" /></td>
        </tr>

        <tr>
        <td width="150" valign="top">{$locale.login_account|error_bold:$error.account}<span class="attention">＊</span></td>
        <td valign="top">
        {$error.account|error_message}<input type="text" name="account" value="{$smarty.post.account}" class="form_text_common" /></td>
        </tr>

        <tr>
        <td width="150" valign="top">{$locale.account_validate_time|error_bold:$error.validate_time}<span class="attention">※</span></td>
        <td>
        {$error.validate_time|error_message}
        {if $smarty.post.validate_time}
            {html_select_date field_order="YMD" year_format="%04d年" month_format="%-m月" day_format="%d日" end_year="+1" field_separator=" " year_extra='id="y"' month_extra='id="m"' day_extra='id="d"' prefix="date_" time=$smarty.post.validate_time}<img src="/img/system/icon_calendar.gif" id="select_date_calendar_icon"/>
        {else}
            {html_select_date field_order="YMD" year_format="%04d年" month_format="%-m月" day_format="%d日" end_year="+1" field_separator=" " year_extra='id="y"' month_extra='id="m"' day_extra='id="d"' prefix="date_"}<img src="/img/system/icon_calendar.gif" id="select_date_calendar_icon"/>
        {/if}
        </td>
        </tr>

        <tr>
        <td width="150" valign="top">{$locale.alipay_id|error_bold:$error.buyer_id}<span class="attention">＊</span></td>
        <td valign="top">
        {$error.buyer_id|error_message}<input type="text" name="buyer_id" value="{$smarty.post.buyer_id}" class="form_text_common" /></td>
        </tr>

        <tr>
        <td width="150" valign="top">{$locale.trade_no|error_bold:$error.trade_no}<span class="attention">＊</span></td>
        <td valign="top">
        {$error.trade_no|error_message}<input type="text" name="trade_no" value="{$smarty.post.trade_no}" class="form_text_common" /></td>
        </tr>

        </table>

{literal}
    <script type="text/javascript">
      SelectCalendar.createOnLoaded({yearSelect: 'y',
             monthSelect: 'm',
             daySelect: 'd'
            },
            {startYear: 2010,
             endYear: 2011,
             lang: 'ja',
             triggers: ['select_date_calendar_icon']
            });
    </script>
{/literal}

        <div id="form_btn">
        <input type="hidden" name="csrf_ticket" value="{$csrf_ticket}" />
        <input type="hidden" name="operation" value="check" />
        <input type="hidden" name="uid" value="{$user.0._id}" />
        <input type="image" src="/img/system/b_kakunin.gif" value="submit" class="btn" onClick="return form_confirm(this)" />
        </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
</body>
</html>
