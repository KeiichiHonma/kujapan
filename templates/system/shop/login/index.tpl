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
        <h2 class="h_title">ログイン情報</h2>

        <table id="suggest">
        <tr>
        <th colspan="3">メールアドレス</th>
        </tr>
        <tr>
        <td width="150">メールアドレス</td>
        <td width="450">{$manager_info.0.col_mail|escape}</td>
        <td><a href="{$smarty.const.KUJAPANURLSSL}/system/shop/login/mail/input">メールアドレスの変更</a></td>
        </tr>
        </table>

        <table id="suggest">
        <tr>
        <th colspan="3">パスワード</th>
        </tr>
        <tr>
        <td width="150">パスワード</td>
        <td width="450">****************</td>
        <td><a href="{$smarty.const.KUJAPANURLSSL}/system/shop/login/password/input">パスワードの変更</a></td>
        </tr>
        </table>

    </div>
</div>
</div>
</div>
</div>
</body>
</html>
