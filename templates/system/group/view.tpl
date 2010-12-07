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
        <h2 class="h_title">クーポン詳細</h2>
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
        <div id="form_btn">
        <a href="{$smarty.const.KUJAPANURLSSL}/system/group/edit/input/grid/{$grid}"><img src="/img/system/b_henkou.gif" alt="変更" width="130" height="30" class="btn" /></a><a href="{$smarty.const.KUJAPANURLSSL}/system/group/drop/input/grid/{$grid}"><img src="/img/system/b_sakujyo.gif" alt="削除" width="130" height="30" class="btn" /></a>
        </div>


<h2 class="h_title">特集ページに表示するクーポン</h2>
        <div id="infomation">
        <ul>
        <li><a href="{$smarty.const.KUJAPANURLSSL}/system/group/coupon/assign/input/grid/{$grid}">表示クーポン管理</a></li>
        </ul>
        </div>
{if $coupon}
        <table border="0" cellpadding="0" cellspacing="0" id="qatable_l">
        <tr>
        <th width="30" class="p_l10">ID</th>
        <th width="200">店舗名</th>
        <th>クーポンタイトル</th>
        </tr>
{foreach from=$coupon key="key" item="value" name="coupon"}
        <tr>
        <td width="30" class="title">{$value.coupon_id}</td>
        <td width="200">{$value.shop_name}</td>
        <td>{$value.coupon_title}</td>
        <td>{$value.col_given_name}</td>
        </tr>
{/foreach}
        </table>
{else}
表示するクーポンがありません。
{/if}

    </div>
</div>
</div>
</div>
</div>
</body>
</html>
