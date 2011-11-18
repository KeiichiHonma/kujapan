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

        {*管理者のみ*}{if $login_type == $smarty.const.TYPE_M_ADMIN}
        <a href="{$smarty.const.KUJAPANURLSSL}/system/user/partner/entry/export/pid/{$pid}/number/{$number}">パートナー用ユーザーを書き出す</a>
        {/if}

    </div>
</div>
</div>
</div>
</div>
</body>
</html>
