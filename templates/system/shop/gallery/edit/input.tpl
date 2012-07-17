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
    <h2 class="h_title">ギャラリー管理</h2>
    <p class="m_b10">以下の項目を入力して[確認画面へ]ボタンをクリックしてください。<span class="attention">＊</span>の項目は必須となります。</p>
    <form id="couponForm" name="couponForm" action= "{$smarty.const.KUJAPANURLSSL}/system/shop/gallery/edit/input/sid/{$sid}/siid/{$siid}" method="post" enctype="multipart/form-data">

    <table id="suggest">
    <tr>
    <th colspan="2">ギャラリー写真</th>
    </tr>
    <tr>
    <td width="150" valign="top">写真<span class="attention">＊</span></td>
    <td>
<div id="fbox" class="fbox">

    <div style="float:left;">
        <div style="clear:both;">
            {$error.file|error_message:''}
            {$error.re_select|error_message:''}
            <div style="float:left;padding:5px;">
            <input type="file" name="file" size="40">
            </div>
        </div>
    </div>
    <div style="float:left;">
{if isset($shop_item.0.file_id)}
        ■現在の写真<br />
        <img src="{$shop_item.0.file_id|getFilePath:$shop_item.0.col_extension}" width="{$shop_item.0.col_width}" height="{$shop_item.0.col_height}" alt="{$shop_item.0.col_alt}" />
        <input type="hidden" name="fid" value="{$shop_item.0.file_id}">
{/if}
    </div>
</div>
    </td>
    </tr>
    </table>

<div>
</div>
    <div id="form_btn">
    <input type="hidden" name="csrf_ticket" value="{$csrf_ticket}" />
    <input type="hidden" name="sid" value="{$sid}" />
    <input type="hidden" name="siid" value="{$siid}" />
    <input type="hidden" name="operation" value="regist" />
    <a href="javascript:history.back();"><img src="/img/system/b_modoru.gif" width="156" height="36" alt="戻る" /></a>
    <input type="image" src="/img/system/b_henkou.gif" value="submit" class="btn" onClick="return form_file_regist(setting)" />
    </div>
    </form>
    </div>
</div>
</div>
</div>
</div>
</body>
</html>
