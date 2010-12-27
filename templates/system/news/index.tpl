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
                {include file="include/system/navi.inc"}
                    <h2 class="h_title">お知らせ管理</h2>
                    <div id="infomation">
                    <ul>
                    <li><a href="{$smarty.const.KUJAPANURLSSL}/system/news/entry/input">お知らせの登録</a></li>
                    </ul>
                    </div>
                    {if $news}
                        {include file="include/common/sp.inc"}
                        <table border="0" cellpadding="0" cellspacing="0" id="qatable_l">
                        <tr>
                        <th width="110" class="p_l10">ターゲット</th>
                        <th width="80">表示状態</th>
                        <th>タイトル</th>
                        </tr>
                    {foreach from=$news key="key" item="value" name="news"}
                    {assign var=target value=$value.col_target}
                        <tr>
                        <td width="110" class="title">{$target_list.$target}</td>
                        
                        <td width="80">{$value.col_from|make_news_judge:$value.col_to}</td>
                        <td><a href="{$smarty.const.KUJAPANURLSSL}/system/news/view/nid/{$value._id}">{$value.col_title_ja|escape}</a></td>
                        </tr>
                    {/foreach}
                        </table>
                    {else}
                        現在お知らせはありません。
                    {/if}
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
