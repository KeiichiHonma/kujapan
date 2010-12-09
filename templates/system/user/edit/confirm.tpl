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
        <form id="couponForm" name="couponForm" action= "{$smarty.const.KUJAPANURLSSL}/system/user/edit/input/uid/{$user.0._id}" method="post">

        <table id="suggest">
        <tr>
        <th colspan="2">ユーザー情報</th>
        </tr>

        <tr>
        <td width="150" valign="top">{$locale.user_validate_title}</td>
        <td valign="top">
        <input type="hidden" name="validate" value="{$smarty.post.validate}" />
        {if strcasecmp($smarty.post.validate,$smarty.const.VALIDATE_ALLOW) == 0}
        有効
        {else}
        停止
        {/if}
        </td>
        </tr>

        <tr>
        <td width="150" valign="top">{$locale.user_status_title}</td>
        <td valign="top">
        <input type="hidden" name="status" value="{$smarty.post.status}" />
        {if strcasecmp($smarty.post.status,$smarty.const.STATUS_USER_REGIST) == 0}
        登録済み
        {else}
        未登録
        {/if}
        </td>
        </tr>

        <tr>
        <td width="150" valign="top">{$locale.user_given_name_title}</td>
        <td valign="top">
        {if strcasecmp($smarty.post.status,$smarty.const.STATUS_USER_REGIST) == 0}
        <input type="hidden" name="given_name" value="{$smarty.post.given_name}" />
        {$smarty.post.given_name}
        {else}
        ステータスを未登録にしているため送信されません。
        {/if}
        </td>
        </tr>

        <tr>
        <td width="150" valign="top">{$locale.user_mail_title}</td>
        <td valign="top">
        <input type="hidden" name="buyer_email" value="{$smarty.post.buyer_email}" />
        {$smarty.post.buyer_email}
        </td>
        </tr>

        <tr>
        <td width="150" valign="top">{$locale.customer_no}</td>
        <td valign="top">
        <input type="hidden" name="customer_no" value="{$smarty.post.customer_no}" />
        {$smarty.post.customer_no}
        </td>
        </tr>

        <tr>
        <td width="150" valign="top">{$locale.login_account}</td>
        <td valign="top">
        <input type="hidden" name="account" value="{$smarty.post.account}" />
        {$smarty.post.account}
        </td>
        </tr>

        <tr>
        <td width="150" valign="top">{$locale.account_validate_time}</td>
        <td>
        {if strcasecmp($smarty.post.status,$smarty.const.STATUS_USER_REGIST) == 0}
        {$smarty.post.validate_time|make_date}
        <input type="hidden" name="validate_time" value="{$smarty.post.validate_time}" />
        {else}
        ステータスを未登録にしているため送信されません。
        {/if}
        </td>
        </tr>

        <tr>
        <td width="150" valign="top">{$locale.alipay_id}</td>
        <td valign="top">
        <input type="hidden" name="buyer_id" value="{$smarty.post.buyer_id}" />
        {$smarty.post.buyer_id}
        </td>
        </tr>

        <tr>
        <td width="150" valign="top">{$locale.trade_no}</td>
        <td valign="top">
        <input type="hidden" name="trade_no" value="{$smarty.post.trade_no}" />
        {$smarty.post.trade_no}
        </td>
        </tr>

        </table>

        <div id="form_btn">
        <input type="hidden" name="csrf_ticket" value="{$csrf_ticket}" />
        <input type="hidden" name="operation" value="" />
        <input type="hidden" name="uid" value="{$user.0._id}" />
        <input type="hidden" name="status" value="{$smarty.post.status}" />
        <input type="image" src="/img/system/b_modoru.gif" value="submit" class="btn" onClick="return form_back()" />
        <input type="image" src="/img/system/b_henkou.gif" value="submit" class="btn" onClick="return form_regist()" />
        </div>
    </form>
    </div>
</div>
</div>
</div>
</div>
</body>
</html>
