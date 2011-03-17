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
{include file="include/system/logout.inc"}
<div id="roof_l_white">
    <div class="inside_l">
        {include file="include/system/navi.inc"}
        <h2 class="h_title">ユーザー登録</h2>
        <p class="m_b10">以下の項目を入力して[登録]ボタンをクリックしてください。<span class="attention">＊</span>の項目は必須となります。</p>
        <form id="couponForm" name="couponForm" action= "{$smarty.const.KUJAPANURLSSL}/system/user/entry/input" method="post">

        <table id="suggest">
        <tr>
        <th colspan="2">ユーザー情報</th>
        </tr>

        <tr>
        <td width="150" valign="top">{"trade_no"|error_bold:$error.trade_no}<span class="attention">＊</span></td>
        <td valign="top">
        {$error.trade_no|error_message}<input type="text" name="trade_no" value="{$smarty.post.trade_no}" class="form_text_common" /></td>
        </tr>

        <tr>
        <td width="150" valign="top">{"out_trade_no"|error_bold:$error.out_trade_no}<span class="attention">＊</span></td>
        <td valign="top">
        {$error.out_trade_no|error_message}<input type="text" name="out_trade_no" value="{$smarty.post.out_trade_no}" class="form_text_common" /></td>
        </tr>

        <tr>
        <td width="150" valign="top">{"buyer_email"|error_bold:$error.buyer_email}</td>
        <td valign="top">
        {$error.buyer_email|error_message}<input type="text" name="buyer_email" value="{$smarty.post.buyer_email}" class="form_text_common" /></td>
        </tr>

        <tr>
        <td width="150" valign="top">{"buyer_id"|error_bold:$error.buyer_id}<span class="attention">＊</span></td>
        <td valign="top">
        {$error.buyer_id|error_message}<input type="text" name="buyer_id" value="{$smarty.post.buyer_id}" class="form_text_common" /></td>
        </tr>
        </table>

        <div id="form_btn">
        <input type="hidden" name="csrf_ticket" value="{$csrf_ticket}" />
        <input type="hidden" name="operation" value="check" />
        <input type="image" src="/img/system/b_kakunin.gif" value="submit" class="btn" onClick="return form_confirm(this)" />
        </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
</body>
</html>
