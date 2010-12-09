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

        <h2 class="search_title">{$locale.coupon_search_title}</h2>
        <div class="title_box search_box clearfix">
            <dl>
                <dd class="search clearfix">
                    <dl>
                        <dt class="keyword_list">
                        {$locale.coupon_search_keyword}
                        </dt>
                        <dd class="theme_data">
            <form name="form_search" action="{$smarty.const.KUJAPANURLSSL}/system/coupon/search" method="get" onSubmit="return checkLogForm(this.sid,this.customer_no,this.last_no)">
            <input type="text" name="sid" value="{$smarty.get.sid}" class="keyword" />-<input type="text" name="customer_no" value="{$smarty.get.customer_no}" class="keyword" />-<input type="text" name="last_no" value="{$smarty.get.last_no}" class="keyword" />
            <input type="submit" value="  {$locale.coupon_search_btn}  " class="go" />
            </form>
            {$locale.coupon_search_help}
                        </dd>
                    </dl>
                </dd>
                <dd class="search clearfix">
                    <dl>
                        <dt class="subtheme_list">
                        {$locale.coupon_search_item}
                        </dt>
                        <dd class="theme_data">
                        {$locale.coupon_search_item_value}
                        </dd>
                    </dl>
                </dd>
                
            </dl>
            <p class="init"><img src="/img/system/reset.gif" alt="" width="12" height="12" border="0" />&nbsp;<a href="{$smarty.const.KUJAPANURLSSL}/system/coupon/">{$locale.coupon_search_reset}</a></p>
        </div>
    </div>
</div>
</div>
</div>
</div>
</body>
</html>
