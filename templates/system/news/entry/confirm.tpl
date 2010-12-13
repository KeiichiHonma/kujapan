<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
{include file="include/system/seo.inc"}
{include file="include/system/css.inc"}
{include file="include/system/js.inc"}
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
    <h2 class="h_title">お知らせ内容確認</h2>
    <form id="couponForm" name="couponForm" action= "{$smarty.const.KUJAPANURLSSL}/system/news/entry/input" method="post">

    <table id="suggest">
    <tr>
    <td width="150" valign="top">{"表示開始日時"|error_bold:$error.from}</td>
    <td>{if $smarty.post.from}{$smarty.post.from|date_format:"%y/%m/%d－%H"}{/if}時
    <input type="hidden" name="from" value="{$smarty.post.from}" />
    </td>
    </tr>
    <tr>
    <td width="150" valign="top">{"表示終了日時"|error_bold:$error.to}</td>
    <td>{if $smarty.post.to}{$smarty.post.to|date_format:"%y/%m/%d－%H"}{/if}時
    <input type="hidden" name="to" value="{$smarty.post.to}" />
    </td>
    </tr>
    </table>

    <table id="suggest">
    <tr>
    <td width="150" valign="top">{"表示日付"|error_bold:$error.date}</td>
    <td>{if $smarty.post.date}{$smarty.post.date|date_format:"%y/%m/%d"}{/if}
    <input type="hidden" name="date" value="{$smarty.post.date}" />
    </td>
    </tr>
    </table>

    {foreach from=$form key="group_name" item="form_data" name="form_data"}
    <table id="suggest">
    {foreach from=$form_data key="form_name" item="form_setting" name="form_setting"}
    {$form_name|make_form:$form_setting:$error:$smarty.const.SMARTY_BOOL_ON:$smarty.const.SMARTY_BOOL_ON}
    {/foreach}
    </table>
    {/foreach}
    <input type="hidden" name="csrf_ticket" value="{$csrf_ticket}" />
    <input type="hidden" name="operation" value="" />
    <div id="form_btn">
    <input type="image" src="/img/system/b_modoru.gif" value="submit" class="btn" onClick="return form_back()" />
    <input type="image" src="/img/system/b_touroku.gif" value="submit" class="btn" onClick="return form_regist()" />
    </div>
    </form>
    </div>
</div>
</div>
</div>
</div>
</body>
</html>
