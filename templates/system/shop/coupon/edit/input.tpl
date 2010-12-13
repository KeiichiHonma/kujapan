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
<div id="roof_l_white">
    <div class="inside_l">
    {include file="include/system/shop_navi.inc"}
    <h2 class="h_title">クーポン変更</h2>
    <p class="m_b10">以下の項目を入力して[変更]ボタンをクリックしてください。<span class="attention">＊</span>の項目は必須となります。</p>
    <form id="couponForm" name="couponForm" action= "{$smarty.const.KUJAPANURLSSL}/system/shop/coupon/edit/input/cid/{$cid}" method="post">

    {*有効期限*}
    <table id="suggest">
    <tr>
    <td width="150" valign="top">{"有効期限"|error_bold:$error.validate_time}<span class="attention">※</span></td>
    <td>
    {$error.validate_time|error_message}
{if $smarty.post.validate_time}
    {html_select_date field_order="YMD" year_format="%04d年" month_format="%-m月" day_format="%d日" end_year="+1" field_separator=" " year_extra='id="y"' month_extra='id="m"' day_extra='id="d"' prefix="date_" time=$smarty.post.validate_time}<img src="/img/system/icon_calendar.gif" id="select_date_calendar_icon"/>
{else}
    {html_select_date field_order="YMD" year_format="%04d年" month_format="%-m月" day_format="%d日" end_year="+1" field_separator=" " year_extra='id="y"' month_extra='id="m"' day_extra='id="d"' prefix="date_"}<img src="/img/system/icon_calendar.gif" id="select_date_calendar_icon"/>
{/if}
    </td>
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

    {foreach from=$form key="group_name" item="form_data" name="form_data"}
    <table id="suggest">
    <tr>
    <th colspan="2">{$group_name}</th>
    </tr>
    {foreach from=$form_data key="form_name" item="form_setting" name="form_setting"}
    {$form_name|make_form:$form_setting:$error:$smarty.const.SMARTY_BOOL_OFF:$smarty.const.SMARTY_BOOL_OFF}
    {/foreach}
    </table>
    {/foreach}

    <div id="form_btn">
    <input type="hidden" name="csrf_ticket" value="{$csrf_ticket}" />
    <input type="hidden" name="operation" value="check" />
    <input type="hidden" name="cid" value="{$cid}" />
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
