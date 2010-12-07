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
        <h2 class="h_title">グループ管理</h2>
        <div id="infomation">
        <ul>
        <li><a href="{$smarty.const.KUJAPANURLSSL}/system/group/entry/input">グループ追加</a></li>
        </ul>
        </div>
<h2 class="h_title">グループ一覧</h2>

        <table border="0" cellpadding="0" cellspacing="0" id="qatable_l">
        <tr>
        <th width="120" class="p_l10">操作</th>
        <th>グループ名</th>
        </tr>
{if $group}
{foreach from=$group key="key" item="value" name="group"}
        <tr>
        <td width="120" class="title"><a href="{$smarty.const.KUJAPANURLSSL}/system/group/view/grid/{$value.group_id}">詳細</a></td>
        <td>{$value.col_name_ja}</td>
        </tr>
{/foreach}
{else}
クーポンがありません
{/if}
        </table>
    </div>
</div>
</div>
</div>
</div>
</body>
</html>
