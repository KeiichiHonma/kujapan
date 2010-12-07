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
        <h2 class="h_title">グループ情報</h2>

        <a href="{$smarty.const.KUJAPANURLSSL}/system/shop/group/assign/input">グループの割り当て</a>
        
        <table id="suggest">
        <tr>
        <th>所属グループ</th>
        </tr>
        {if $shop_group}
        {foreach from=$shop_group key="key" item="value" name="shop_group"}
        <tr>
        <td>{$value.col_name_ja}</td>
        </tr>
        {/foreach}
        {else}
        <tr>
        <td>所属しているグループがありません。</td>
        </tr>
        {/if}

        </table>

    </div>
</div>
</div>
</div>
</div>
</body>
</html>
