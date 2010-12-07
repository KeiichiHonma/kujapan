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
        <h2 class="h_title">商品管理</h2>
<h2 class="h_title">商品一覧</h2>
{if $product}
        <table border="0" cellpadding="0" cellspacing="0" id="qatable_l">
        <tr>
        <th width="120" class="p_l10">操作</th>
        <th>店舗名</th>
        <th>クーポン名</th>
        </tr>
{include file="include/system/sp.inc"}
{foreach from=$product key="key" item="value" name="product"}
        <tr>
        <td width="120" class="title">
        <a href="{$smarty.const.KUJAPANURLSSL}/system/shop/product/edit/input/siid/{$value.shop_item_id}/sid/{$value.col_sid}">変更</a>&nbsp;|&nbsp;<a href="{$smarty.const.KUJAPANURLSSL}/system/shop/product/edit/drop/siid/{$value.shop_item_id}/sid/{$value.col_sid}">削除</a>&nbsp;|&nbsp;<a href="{$smarty.const.KUJAPANURLSSL}/system/shop/product/reuse/input/siid/{$value.shop_item_id}/sid/{$value.col_sid}">再利用</a>
        
        </td>
        <td>{$value.col_name_ja}</td>
        <td>{$value.col_detail_ja|make_strim:80}</td>
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
