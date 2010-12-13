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
    <h2 class="h_title">お知らせ削除</h2>
    <p class="m_b10">以下の内容を確認して[確認する]ボタンをクリックしてください。</p>
    <form id="couponForm" name="couponForm" action= "{$smarty.const.KUJAPANURLSSL}/system/news/drop/input/nid/{$nid}" method="post">

    <table id="suggest">
    <tr>
    <td width="150" valign="top">表示開始日時</th>
    <td>{$news.0.col_from|date_format:"%y/%m/%d－%H"}時</td>
    </tr>
    <tr>
    <td width="150" valign="top">表示終了日時</td>
    <td>{$news.0.col_to|date_format:"%y/%m/%d－%H"}時</td>
    </tr>
    </table>

    <table id="suggest">
    <td width="150" valign="top">表示日付</td>
    <td>{$news.0.col_date|date_format:"%y/%m/%d"}</td>
    </tr>
    </table>

    {foreach from=$form key="group_name" item="form_data" name="form_data"}
    <table id="suggest">
    {foreach from=$form_data key="form_name" item="form_setting" name="form_setting"}
    {$form_name|make_form:$form_setting:$error:$smarty.const.SMARTY_BOOL_ON:$smarty.const.SMARTY_BOOL_ON}
    {/foreach}
    </table>
    {/foreach}
    {*確認画面表示用*}
    <input type="hidden" name="from" value="{$news.0.col_from}" />
    <input type="hidden" name="to" value="{$news.0.col_to}" />
    <input type="hidden" name="target" value="{$news.0.col_target}" />
    <input type="hidden" name="title" value="{$news.0.col_title|escape}" />
    <input type="hidden" name="detail" value="{$news.0.col_detail}" />
    <input type="hidden" name="url" value="{$news.0.col_url}" />
    {*確認画面表示用ここまで*}
    <input type="hidden" name="nid" value="{$nid}" />
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
