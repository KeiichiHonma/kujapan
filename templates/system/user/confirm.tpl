<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
{include file="include/system/seo.inc"}
{include file="include/system/css.inc"}
<link type="text/css" rel="stylesheet" href="/css/system/support.css" />
{include file="include/system/js.inc"}
</head>
<body>
<div id="wrapper">
<div id="page">
<div id="main_l">
{include file="include/system/logout.inc"}
<div id="roof_l_white">
    <div class="inside_l">
        {include file="include/system/navi.inc"}
        {if $user}
        <h2 class="h_title">{$locale.user_republish_title}</h2>
        <div id="infomation">
        <ul>
        {if $republish_type == "continue"}
            <li>{$locale.user_republish_alert2}</li>
        {else}
            <li>{$locale.user_republish_alert3}</li>
        {/if}
        </ul>
        </div>
        <table id="suggest">
            <tr>
            <td width="150" valign="top">{$locale.user_validate_title}</td>
            <td valign="top">{if $user.0.col_validate == 0}{$locale.user_validate_value_on}{else}{$locale.user_validate_value_off}{/if}</td>
            </tr>
            <tr>
            <td width="150" valign="top">{$locale.user_create_date_title}</td>
            <td valign="top">{$user.0.col_ctime|make_date}</td>
            </tr>
            <tr>
            <td width="150" valign="top">{$locale.user_last_login_title}</td>
            <td valign="top">{$user.0.col_last_login|make_date:"Y/n/d G:i"|default:"-"}</td>
            </tr>
            <tr>
            <td width="150" valign="top">{$locale.user_given_name_title}</td>
            <td valign="top">{$user.0.col_given_name|default:$locale.user_given_name_value_default}</td>
            </tr>
            <tr>
            <td width="150" valign="top">{$locale.user_mail_title}</td>
            <td valign="top">{$user.0.col_buyer_email}</td>
            </tr>
            <tr>
            <td width="150" valign="top">{$locale.user_status_title}</td>
            <td valign="top">{$user.0|@make_user_status}</td>
            </tr>
            <tr>
            <td width="150" valign="top">{$locale.customer_no}</td>
            <td valign="top">{$user.0.col_customer_no}</td>
            </tr>
            <tr>
            <td width="150" valign="top">{$locale.login_account}</td>
            <td valign="top">{$user.0.col_account}</td>
            </tr>
            <tr>
            <td width="150" valign="top">{$locale.account_validate_time}</td>
            <td valign="top">{$user.0.col_validate_time|make_date:"Y/n/d G:i"|default:$locale.user_given_name_value_default}</td>
            </tr>
            <tr>
            <td width="150" valign="top">{$locale.alipay_id}</td>
            <td valign="top">{$user.0.col_buyer_id}</td>
            </tr>
            <tr>
            <td width="150" valign="top">{$locale.trade_no}</td>
            <td valign="top">{$user.0.col_trade_no}</td>
            </tr>

            <tr>
            <td colspan="2" class="btn">
                <form id="couponForm" name="couponForm" action= "{$smarty.const.KUJAPANURLSSL}/system/user/republish/uid/{$user.0._id}" method="post">
                <input type="hidden" name="csrf_ticket" value="{$csrf_ticket}" />
                {if $siid}<input type="hidden" name="uid" value="{$user.0._id}" />{/if}
                <input type="hidden" name="operation" value="" />
                <input type="image" src="/img/system/b_modoru_cn.gif" value="submit" class="btn" onClick="return form_back()" />
                <input type="image" src="/img/system/b_republish_cn.gif" value="submit" class="btn" onClick="return form_regist()" />
                </form>
            </td>
            </tr>
        </table>
        {else}
        {$locale.user_search_none}
        {/if}
    </div>
</div>
</div>
</div>
</div>
</body>
</html>
