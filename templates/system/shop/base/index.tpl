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
        <th colspan="3">画像</th>
        </tr>

        <tr>
            <td width="150">FACE画像</td>
            <td width="450">
            {*外観*}
            {if $shop_face}
            <img src="{$shop_face.0.path}" width="{$shop_face.0.col_width}" height="{$shop_face.0.col_height}" alt="{$shop_face.0.col_alt}" />
            {else}
            設定されていません。
            {/if}
            </td>
            <td><a href="{$smarty.const.KUJAPANURLSSL}/system/shop/base/face/input/sid/{$sid}">FACE画像の変更</a></td>
        </tr>
        </table>

        <a href="{$smarty.const.KUJAPANURLSSL}/system/shop/base/profile/input/sid/{$sid}">基本情報の変更</a>
        
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
