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
        <h2 class="h_title">クーポン詳細</h2>

        <table id="suggest">
        <tr>
        <th width="100" valign="top">有効期限</td>
        <td>{$smarty.post.validate_time|make_date}</td>
        </tr>
        </table>

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
        <a href="{$smarty.const.KUJAPANURLSSL}/system/shop/coupon/edit/input/cid/{$cid}"><img src="/img/system/b_henkou.gif" alt="変更" width="130" height="30" class="btn" /></a><a href="{$smarty.const.KUJAPANURLSSL}/system/shop/coupon/drop/input/cid/{$cid}"><img src="/img/system/b_sakujyo.gif" alt="削除" width="130" height="30" class="btn" /></a>
        </div>

    </div>
</div>
</div>
</div>
</div>
</body>
</html>
