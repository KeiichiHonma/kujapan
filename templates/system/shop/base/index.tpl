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

        <table id="suggest">
        <tr>
        <th colspan="3">基本画像</th>
        </tr>
        <tr>
            <td width="150">ロゴ画像(小)</td>
            <td width="450">
            {if $logo_s}<img alt="" src="/img/logo/{$sid}s.gif" width="72" height="40" />{else}{$sid}s.gifがありません{/if}
            </td>
            <td><a href="{$smarty.const.KUJAPANURLSSL}/system/shop/base/logo_s/input">ロゴ(小)の変更</a></td>
        </tr>
        <tr>
            <td width="150">ロゴ画像(中)</td>
            <td width="450">
            {if $logo_m}<img alt="" src="/img/logo/{$sid}m.gif" width="165" height="65" />{else}{$sid}m.gifがありません{/if}
            </td>
            <td><a href="{$smarty.const.KUJAPANURLSSL}/system/shop/base/logo_m/input">ロゴ(中)の変更</a></td>
        </tr>
        <tr>
            <td width="150">外観(小)画像</td>
            <td width="450">
            {*外観*}
            {if $shop_face}
            <img src="{$shop_face.0.path}" width="{$shop_face.0.col_width}" height="{$shop_face.0.col_height}" alt="{$shop_face.0.col_alt}" />
            {else}
            設定されていません。
            {/if}
            </td>
            <td><a href="{$smarty.const.KUJAPANURLSSL}/system/shop/base/face/input">外観(小)の変更</a></td>
        </tr>
        <tr>
            <td width="150">外観(大)画像</td>
            <td width="450">
            {*外観*}
            {assign var=type_visual value=$smarty.const.SHOP_TYPE_VISUAL}
            {if $shop_item.$type_visual}
            <img src="{$shop_item.$type_visual.file_id|getFilePath:$shop_item.$type_visual.col_extension}" width="{$shop_item.$type_visual.col_width}" height="{$shop_item.$type_visual.col_height}" alt="{$shop_item.$type_visual.col_alt_ja}" />
            {else}
            設定されていません。
            {/if}
            </td>
            <td><a href="{$smarty.const.KUJAPANURLSSL}/system/shop/base/visual/input">外観(大)の変更</a></td>
        </tr>
        <tr>
            <td width="150">バーコード画像</td>
            <td width="450">
            {*バーコード*}
            {assign var=type_barcode value=$smarty.const.SHOP_TYPE_BARCODE}
            {if $shop_item.$type_barcode}
            <img src="{$shop_item.$type_barcode.file_id|getFilePath:$shop_item.$type_barcode.col_extension}" width="{$shop_item.$type_barcode.col_width}" height="{$shop_item.$type_barcode.col_height}" alt="{$shop_item.$type_barcode.col_alt_ja}" />
            {else}
            設定されていません。
            {/if}
            </td>
            <td><a href="{$smarty.const.KUJAPANURLSSL}/system/shop/base/barcode/input">バーコードの変更</a></td>
        </tr>
        </table>

        <table id="suggest">
        <tr>
        <th colspan="3">特徴情報</th>
        </tr>
        <tr>
        <td width="150">特徴</td>
        <td width="450">{$feature_name}</td>
        <td><a href="{$smarty.const.KUJAPANURLSSL}/system/shop/base/feature/input">特徴の変更</a></td>
        </tr>
        </table>

        <a href="{$smarty.const.KUJAPANURLSSL}/system/shop/base/profile/input">店舗プロフィールの変更</a>
        
        {foreach from=$form key="group_name" item="form_data" name="form_data"}
        <table id="suggest">
        <tr>
        <th colspan="2">{$group_name}</th>
        </tr>
        {foreach from=$form_data key="form_name" item="form_setting" name="form_setting"}
        {$form_name|make_form:$form_setting:$error:$smarty.const.SMARTY_BOOL_OFF:$smarty.const.SMARTY_BOOL_ON}
        {/foreach}
        </table>
        {/foreach}

    </div>
</div>
</div>
</div>
</div>
</body>
</html>
