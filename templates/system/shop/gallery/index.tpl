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
    {include file="include/system/shop_navi.inc"}
    <div id="infomation">
    <ul>
    <li><a href="{$smarty.const.KUJAPANURLSSL}/system/shop/gallery/entry/input/sid/{$sid}">ギャラリー追加</a></li>
    </ul>
    </div>
    <h2 class="h_title">ギャラリー管理</h2>
{if $shop_item}
{foreach from=$shop_item key="key" item="value" name="shop_item"}
    <table class="shop_system">
        <tr>
        <td>
        {if isset($value.file_id)}
        <img src="{$value.file_id|getFilePath:$value.col_extension}" width="{$value.col_width}" height="{$value.col_height}" alt="{$value.col_alt}" />
        {else}
        ありません。
        {/if}
        </td>
        </tr>
        <tr>
        <td colspan="3" class="btn">
        <a href="{$smarty.const.KUJAPANURLSSL}/system/shop/gallery/edit/input/sid/{$sid}/siid/{$value.shop_item_id}"><img src="/img/system/b_henkou.gif" alt="変更" width="130" height="30" class="btn" /></a><a href="{$smarty.const.KUJAPANURLSSL}/system/shop/gallery/drop/input/sid/{$sid}/siid/{$value.shop_item_id}"><img src="/img/system/b_sakujyo.gif" alt="削除" width="130" height="30" class="btn" /></a></td>
        </tr>
    </table>
{/foreach}
{else}
ギャラリーがありません。
{/if}
    </div>
</div>
</div>
</div>
</div>
</body>
</html>
