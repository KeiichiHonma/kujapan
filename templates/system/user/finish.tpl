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
        <h2 class="h_title">{$locale.user_republish_done_title}</h2>
        <div id="infomation">
        <ul>
        <li>{$locale.user_republish_alert1}</li>
        {if $republish_type == "continue"}
            <li>{$locale.user_republish_alert2}</li>
        {else}
            <li>{$locale.user_republish_alert3}</li>
        {/if}
        </ul>
        </div>
        <table id="suggest">
            <tr>
            <th colspan="2">{$locale.user_republish_done_title} - {$user.0.col_customer_no}</th>
            </tr>
            <tr>
            <td width="150" valign="top">{$locale.user_given_name_title}</td>
            <td valign="top">{$user.0.col_given_name|default:$locale.user_given_name_value_default}</td>
            </tr>
            <tr>
            <td width="150" valign="top">{$locale.login_account}</td>
            <td valign="top">{$user.0.col_account}</td>
            </tr>
            <tr>
            <td width="150" valign="top">{$locale.user_new_password_title}</td>
            <td valign="top">
            <b>{if $password}{$password}{else}{$locale.user_republish_alert1}{/if}</b>
            </td>
            </tr>
            <tr>
            <td width="150" valign="top">{$locale.account_validate_time}</td>
            <td valign="top">{$user.0.col_validate_time|make_date:"Y/n/d G:i"|default:$locale.user_given_name_value_default}</td>
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
