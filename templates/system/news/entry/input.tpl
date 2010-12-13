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
    {include file="include/system/navi.inc"}
    <h2 class="h_title">お知らせ内容入力</h2>
    <p class="m_b10">以下の項目を入力して[確認する]ボタンをクリックしてください。<span class="attention">＊</span>の項目は必須となります。</p>
    <form id="couponForm" name="couponForm" action= "{$smarty.const.KUJAPANURLSSL}/system/news/entry/input" method="post">

    <table id="suggest">
    <tr>
    <td width="150" valign="top">{"表示開始日時"|error_bold:$error.from}<span class="attention">＊</span></td>
    <td>
    {$error.from|error_message}
{if $smarty.post.from}
    {html_select_date field_order="YMD" year_format="%04d年" month_format="%-m月" day_format="%d日" end_year="+1" field_separator=" " year_extra='id="y"' month_extra='id="m"' day_extra='id="d"' prefix="from_" time=$smarty.post.from}<img src="/img/system/icon_calendar.gif" id="select_date_calendar_icon"/>
    {html_select_time prefix="from_" display_minutes=false display_seconds=false time=$smarty.post.from}
{else}
    {html_select_date field_order="YMD" year_format="%04d年" month_format="%-m月" day_format="%d日" end_year="+1" field_separator=" " year_extra='id="y"' month_extra='id="m"' day_extra='id="d"' prefix="from_"}<img src="/img/system/icon_calendar.gif" id="select_date_calendar_icon"/>
    {html_select_time prefix="from_" display_minutes=false display_seconds=false}
{/if}
    <input type="hidden" name="Minutes" value="00" />
    <input type="hidden" name="Seconds" value="00" />
    </td>
    </tr>
    <tr>
    <td width="150" valign="top">{"表示終了日時"|error_bold:$error.to}<span class="attention">＊</span></td>
    <td>
    {$error.to|error_message}
{if $smarty.post.to}
    {html_select_date field_order="YMD" year_format="%04d年" month_format="%-m月" day_format="%d日" end_year="+1" field_separator=" " year_extra='id="y2"' month_extra='id="m2"' day_extra='id="d2"' prefix="to_" time=$smarty.post.to}<img src="/img/system/icon_calendar.gif" id="select_date_calendar_icon2"/>
    {html_select_time prefix="to_" display_minutes=false display_seconds=false time=$smarty.post.to}
{else}
    {html_select_date field_order="YMD" year_format="%04d年" month_format="%-m月" day_format="%d日" end_year="+1" field_separator=" " year_extra='id="y2"' month_extra='id="m2"' day_extra='id="d2"' prefix="to_"}<img src="/img/system/icon_calendar.gif" id="select_date_calendar_icon2"/>
    {html_select_time prefix="to_" display_minutes=false display_seconds=false}
{/if}
    </td>
    </tr>
    </table>

    {*日付*}
    <table id="suggest">
    <tr>
    <td width="150" valign="top">{"表示日付"|error_bold:$error.date}<span class="attention">＊</span></td>
    <td>
    {$error.date|error_message}
{if $smarty.post.date}
    {html_select_date field_order="YMD" year_format="%04d年" month_format="%-m月" day_format="%d日" end_year="+1" field_separator=" " year_extra='id="y3"' month_extra='id="m3"' day_extra='id="d3"' prefix="date_" time=$smarty.post.date}<img src="/img/system/icon_calendar.gif" id="select_date_calendar_icon3"/>
{else}
    {html_select_date field_order="YMD" year_format="%04d年" month_format="%-m月" day_format="%d日" end_year="+1" field_separator=" " year_extra='id="y3"' month_extra='id="m3"' day_extra='id="d3"' prefix="date_"}<img src="/img/system/icon_calendar.gif" id="select_date_calendar_icon3"/>
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
    <script type="text/javascript">
      SelectCalendar.createOnLoaded({yearSelect: 'y2',
             monthSelect: 'm2',
             daySelect: 'd2'
            },
            {startYear: 2010,
             endYear: 2011,
             lang: 'ja',
             triggers: ['select_date_calendar_icon2']
            });
    </script>
    <script type="text/javascript">
      SelectCalendar.createOnLoaded({yearSelect: 'y3',
             monthSelect: 'm3',
             daySelect: 'd3'
            },
            {startYear: 2010,
             endYear: 2011,
             lang: 'ja',
             triggers: ['select_date_calendar_icon3']
            });
    </script>
{/literal}

    {foreach from=$form key="group_name" item="form_data" name="form_data"}
    <table id="suggest">
    {foreach from=$form_data key="form_name" item="form_setting" name="form_setting"}
    {$form_name|make_form:$form_setting:$error:$smarty.const.SMARTY_BOOL_ON:$smarty.const.SMARTY_BOOL_OFF}
    {/foreach}
    </table>
    {/foreach}
    <input type="hidden" name="csrf_ticket" value="{$csrf_ticket}" />
    <input type="hidden" name="operation" value="check" />
    <div id="form_btn">
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
