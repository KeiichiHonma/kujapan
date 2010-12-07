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
        <h2 class="h_title">マネージャー管理</h2>
        <div id="infomation">
        <ul>
        <li><a href="{$smarty.const.KUJAPANURLSSL}/system/manager/entry/input">マネージャー追加</a></li>
        </ul>
        </div>
<h2 class="h_title">マネージャー一覧</h2>

        <table border="0" cellpadding="0" cellspacing="0" id="qatable_l">
        <tr>
        <th width="120" class="p_l10">操作</th>
        <th width="80">有効/無効</th>
        <th width="80">タイプ</th>
        <th width="80">ログイン</th>
        <th>マネージャー名</th>
        </tr>
{foreach from=$manager key="key" item="value" name="manager"}
        <tr>
        <td width="120" class="title"><a href="{$smarty.const.KUJAPANURLSSL}/system/manager/view/mid/{$value._id}">詳細</a>&nbsp;<a href="{$smarty.const.KUJAPANURLSSL}/system/manager/drop/input/mid/{$value._id}">削除</a></td>
         <td width="80">
{if strcasecmp($value.col_validate,$smarty.const.STATUS_MANAGER_ON) == 0}
        有効
{elseif strcasecmp($value.col_validate,$smarty.const.STATUS_MANAGER_OFF) == 0}
        <b>無効</b>
{/if}
        </td>
        <td width="80">
{if strcasecmp($value.col_type,$smarty.const.TYPE_M_MANAGER) == 0}
        店舗管理者
{elseif strcasecmp($value.col_type,$smarty.const.TYPE_M_ADMIN) == 0}
        管理者
{elseif strcasecmp($value.col_type,$smarty.const.TYPE_M_SUPPORT) == 0}
        一般管理者
{/if}
        </td>
        <td width="80">
        {if strcasecmp($value.col_type,$smarty.const.TYPE_M_MANAGER) == 0}<a href="{$smarty.const.KUJAPANURLSSL}/system/manager/change/mid/{$value._id}">ログイン</a>{/if}
        </td>
        <td>{$value.col_given_name}</td>
        </tr>
{/foreach}
        </table>
    </div>
</div>
</div>
</div>
</div>
</body>
</html>
