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
        <h2 class="h_title">クーポン変更</h2>
        <p class="m_b10">以下の項目を確認して[変更]ボタンをクリックしてください。</p>
        <form id="couponForm" name="couponForm" action= "{$smarty.const.KUJAPANURLSSL}/system/user/entry/input" method="post">



        <table id="suggest">
        <tr>
        <th colspan="2">ユーザー情報</th>
        </tr>

        <tr>
        <td width="150" valign="top">trade_no</td>
        <td valign="top">
        <input type="hidden" name="trade_no" value="{$smarty.post.trade_no}" />
        {$smarty.post.trade_no}
        </td>
        </tr>

        <tr>
        <td width="150" valign="top">out_trade_no</td>
        <td valign="top">
        <input type="hidden" name="out_trade_no" value="{$smarty.post.out_trade_no}" />
        {$smarty.post.out_trade_no}
        </td>
        </tr>

        <tr>
        <td width="150" valign="top">buyer_email</td>
        <td valign="top">
        <input type="hidden" name="buyer_email" value="{$smarty.post.buyer_email}" />
        {$smarty.post.buyer_email}
        </td>
        </tr>

        <tr>
        <td width="150" valign="top">alipay_id</td>
        <td valign="top">
        <input type="hidden" name="buyer_id" value="{$smarty.post.buyer_id}" />
        {$smarty.post.buyer_id}
        </td>
        </tr>



        </table>

        <div id="form_btn">
        <input type="hidden" name="csrf_ticket" value="{$csrf_ticket}" />
        <input type="hidden" name="operation" value="" />
        <input type="image" src="/img/system/b_modoru.gif" value="submit" class="btn" onClick="return form_back()" />
        <input type="image" src="/img/system/b_touroku.gif" value="submit" class="btn" onClick="return form_regist()" />
        </div>
    </form>
    </div>
</div>
</div>
</div>
</div>
</body>
</html>
