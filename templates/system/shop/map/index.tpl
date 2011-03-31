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
        <h2 class="h_title">店舗情報</h2>
<a href="{$smarty.const.KUJAPANURLSSL}/system/shop/map/ja/input">日本語地図の変更</a>&nbsp;/&nbsp;<a href="{$smarty.const.KUJAPANURLSSL}/system/shop/map/cn/input">簡体字地図の変更</a>&nbsp;/&nbsp;<a href="{$smarty.const.KUJAPANURLSSL}/system/shop/map/tw/input">繁体字地図の変更</a>
        <table id="suggest">
        {*日本語*}
        <tr>
        <th>日本語地図画像</th>
        </tr>
        
        <tr>
        <td><a href="{$smarty.const.KUJAPANURLSSL}/system/shop/map/ja/input">日本語地図の変更</a></td>
        </tr>
        <tr>
        <td>
        {assign var=type_map_ja value=$smarty.const.SHOP_TYPE_MAP_JA}
        {if $shop_item.$type_map_ja}
        <img src="{$shop_item.$type_map_ja.file_id|getFilePath:$shop_item.$type_map_ja.col_extension}" width="{$shop_item.$type_map_ja.col_width}" height="{$shop_item.$type_map_ja.col_height}" alt="{$shop_item.$type_map_ja.col_alt_ja}" />
        {else}
        設定されていません。
        {/if}
        </td>
        </tr>

        {*簡体字*}
        <tr>
        <th>簡体字地図画像</th>
        </tr>
        
        <tr>
        <td><a href="{$smarty.const.KUJAPANURLSSL}/system/shop/map/cn/input">簡体字地図の変更</a></td>
        </tr>
        <tr>
        <td>
        {assign var=type_map_cn value=$smarty.const.SHOP_TYPE_MAP_CN}
        {if $shop_item.$type_map_cn}
        <img src="{$shop_item.$type_map_cn.file_id|getFilePath:$shop_item.$type_map_cn.col_extension}" width="{$shop_item.$type_map_cn.col_width}" height="{$shop_item.$type_map_cn.col_height}" alt="{$shop_item.$type_map_cn.col_alt_ja}" />
        {else}
        設定されていません。
        {/if}
        </td>
        </tr>

        {*繁体字*}
        <tr>
        <th>繁体字地図画像</th>
        </tr>
        
        <tr>
        <td><a href="{$smarty.const.KUJAPANURLSSL}/system/shop/map/tw/input">繁体字地図の変更</a></td>
        </tr>
        <tr>
        <td>
        {assign var=type_map_tw value=$smarty.const.SHOP_TYPE_MAP_TW}
        {if $shop_item.$type_map_tw}
        <img src="{$shop_item.$type_map_tw.file_id|getFilePath:$shop_item.$type_map_tw.col_extension}" width="{$shop_item.$type_map_tw.col_width}" height="{$shop_item.$type_map_tw.col_height}" alt="{$shop_item.$type_map_tw.col_alt_ja}" />
        {else}
        設定されていません。
        {/if}
        </td>
        </tr>

        </table>
    </div>
</div>
</div>
</div>
</div>
</body>
</html>
