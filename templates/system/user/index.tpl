<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
{include file="include/system/seo.inc"}
<link type="text/css" rel="stylesheet" href="/css/system/contents.css" />
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

        <h2 class="search_title">{$locale.user_search_title}</h2>
        <div class="title_box search_box clearfix">
            <dl>
                <dd class="search clearfix">
                    <dl>
                        <dt class="keyword_list">
                        {$locale.user_search_keyword}
                        </dt>
                        <dd class="theme_data">
            <form name="form_search" action="{$smarty.const.KUJAPANURLSSL}/system/user/search" method="get" onSubmit="return checkForm(this.keyword)">
            <input type="text" name="keyword" value="{$keyword}" class="keyword" />
            <input type="submit" value="  {$locale.user_search_btn}  " class="go" />
            </form>
            {$locale.user_search_help}
                        </dd>
                    </dl>
                </dd>
                <dd class="search clearfix">
                    <dl>
                        <dt class="subtheme_list">
                        {$locale.user_search_item}
                        </dt>
                        <dd class="theme_data">
                        {$locale.customer_no},{$locale.login_account},{$locale.alipay_id}
                        </dd>
                    </dl>
                </dd>
                
            </dl>
            <p class="init"><img src="/img/system/reset.gif" alt="" width="12" height="12" border="0" />&nbsp;<a href="{$smarty.const.KUJAPANURLSSL}/system/user/">{$locale.user_search_reset}</a></p>
        </div>
        <h2 class="h_title">{$locale.user_recent_title}</h2>
        {*管理者のみ*}{if $login_type == $smarty.const.TYPE_M_ADMIN}
        <a href="{$smarty.const.KUJAPANURLSSL}/system/user/entry/input">登録する</a>
        <a href="{$smarty.const.KUJAPANURLSSL}/system/user/partner/entry/input">パートナー用ユーザーを登録する</a>
        {/if}
        {if $user}
            {include file="include/system/sp.inc"}
            <dl class="user_list">
                <dd class="index_line">
                    <dl>
                        <dd class="given_name_title">{$locale.user_given_name_title}</dd>
                        <dd class="status_title">{$locale.user_status_title}</dd>
                        <dd class="cutomer_no_title">{$locale.customer_no}</dd>
                        <dd class="account_title">{$locale.login_account}</dd>
                        <dd class="date_title">{$locale.account_validate_time}</dd>
                        <dd class="alipay_title">{$locale.alipay_id}</dd>
                        <dd class="trade_no_title">{$locale.trade_no}</dd>
                    </dl>
                </dd>
        {foreach from=$user key="key" item="value" name="user"}
                <dd class="line">
                    <dl>
                        <dd class="given_name"><a href="{$smarty.const.KUJAPANURLSSL}/system/user/view/uid/{$value._id}">{$value.col_given_name|default:$locale.user_given_name_value_default}</a></dd>
                        <dd class="common">{$value|@make_user_status}</dd>
                        <dd class="common">{$value.col_customer_no|default:"-"}</dd>
                        <dd class="common">{$value.col_account|default:"-"}</dd>
                        <dd class="date">{$value.col_validate_time|make_date:"Y/n/d G:i"|default:$locale.user_given_name_value_default}</dd>
                        <dd class="alipay">{$value.col_buyer_id|default:"-"}</dd>
                        <dd class="alipay">{$value.col_trade_no|default:"-"}</dd>
                    </dl>
                </dd>
        {/foreach}
            </dl>
            {include file="include/system/sp.inc"}
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
