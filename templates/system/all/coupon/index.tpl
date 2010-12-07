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
        <h2 class="h_title">クーポン管理</h2>
        <div id="infomation">
        <ul>
        <li>※店舗追加はマネージャの追加から</li>
        </ul>
        </div>
<h2 class="h_title">クーポン一覧</h2>
{if $coupon}
        <table border="0" cellpadding="0" cellspacing="0" id="qatable_l">
        <tr>
        <th width="150" class="p_l10">操作</th>
        <th>店舗名</th>
        <th>クーポン名</th>
        </tr>
{include file="include/system/sp.inc"}
{foreach from=$coupon key="key" item="value" name="shop"}
        <tr>
        <td width="150" class="title">
        <a href="{$smarty.const.KUJAPANURLSSL}/system/shop/coupon/view/cid/{$value.coupon_id}/sid/{$value.shop_id}">詳細</a>&nbsp;|&nbsp;<a href="{$smarty.const.KUJAPANURLSSL}/system/shop/coupon/edit/input/cid/{$value.coupon_id}/sid/{$value.shop_id}">変更</a>&nbsp;|&nbsp;<a href="{$smarty.const.KUJAPANURLSSL}/system/shop/coupon/edit/drop/cid/{$value.coupon_id}/sid/{$value.shop_id}">削除</a>&nbsp;|&nbsp;<a href="{$smarty.const.KUJAPANURLSSL}/system/shop/coupon/reuse/input/cid/{$value.coupon_id}/sid/{$value.shop_id}">再利用</a>
        
        </td>
        <td>{$value.col_discount_value}{$value.col_name_ja}</td>
        <td>{$value.col_title_ja|make_strim:80}</td>
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
