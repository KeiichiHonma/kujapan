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
        <h2 class="h_title">店舗管理</h2>
        <div id="infomation">
        <ul>
        <li><a href="{$smarty.const.KUJAPANURLSSL}/system/shop/base/entry/input">基本情報の変更</a></li>
        </ul>
        </div>
<h2 class="h_title">店舗一覧</h2>
{if $shop}
        <table border="0" cellpadding="0" cellspacing="0" id="qatable_l">
        <tr>
        <th class="p_l10">操作</th>
        <th width="80">有効/無効</th>
        <th>id</th>
        <th>店舗名</th>
        </tr>
{include file="include/system/sp.inc"}
{foreach from=$shop key="key" item="value" name="shop"}
        <tr>
        <td class="title">
        <a href="{$smarty.const.KUJAPANURLSSL}/system/shop/base/index/sid/{$value.shop_id}">詳細</a>&nbsp;|&nbsp;<a href="{$smarty.const.KUJAPANURLSSL}/system/shop/gallery/index/sid/{$value.shop_id}">ギャラリー</a>
        </td>
         <td width="80">
{if strcasecmp($value.shop_validate,$smarty.const.VALIDATE_ALLOW) == 0}
        有効
{elseif strcasecmp($value.shop_validate,$smarty.const.VALIDATE_DENY) == 0}
        <b>無効</b>
{/if}
        </td>
        <td>{$value.shop_id}</td>
        <td>{$value.col_name}</td>
        </tr>
{/foreach}
        </table>
{/if}
    </div>
</div>
</div>
</div>
</div>
</body>
</html>
