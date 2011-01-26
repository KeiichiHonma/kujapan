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
        <div class="s_link">
        <p><a href="{$smarty.const.KUJAPANURLSSL}/system/news/edit/input/nid/{$news.0._id}">変更</a></p>
        <p><a href="{$smarty.const.KUJAPANURLSSL}/system/news/drop/input/nid/{$news.0._id}">削除</a></p>
        </div>
        <h2 class="h_title">{$news.0.col_title|escape}</h2>
        
        <table id="suggest">
        <tr>
        <th width="100" valign="top">表示開始日時</th>
        <td>{$news.0.col_from|date_format:"%y/%m/%d－%H"}時</td>
        </tr>
        <tr>
        <th width="100" valign="top">表示終了日時</td>
        <td>{$news.0.col_to|date_format:"%y/%m/%d－%H"}時</td>
        </tr>
        </table>

        <table id="suggest">
        <th width="100" valign="top">表示日付</td>
        <td>{$news.0.col_date|date_format:"%y/%m/%d"}</td>
        </tr>
        </table>

        <table id="suggest">
        <tr>
        <th width="100" valign="top">ターゲット</th>
        {assign var=target value=$news.0.col_target}
        <td>{$target_list.$target}</td>
        </tr>
        <tr>
        <th width="100" valign="top">タイトル（日本語）</th>
        <td>{$news.0.col_title_ja}</td>
        </tr>
        <tr>
        <th width="100" valign="top">タイトル（簡体字）</th>
        <td>{$news.0.col_title_cn}</td>
        </tr>
        <tr>
        <th width="100" valign="top">タイトル（繁体字）</th>
        <td>{$news.0.col_title_tw}</td>
        </tr>
        <tr>
        <th width="100" valign="top">内容（日本語）</th>
        <td>{$news.0.col_detail_ja|make_text}</td>
        </tr>
        <tr>
        <th width="100" valign="top">内容（簡体字）</th>
        <td>{$news.0.col_detail_cn|make_text}</td>
        </tr>
        <tr>
        <th width="100" valign="top">内容（繁体字）</th>
        <td>{$news.0.col_detail_tw|make_text}</td>
        </tr>

        <tr>
        <th width="100" valign="top">URL（日本）</th>
        <td>{$news.0.col_url_ja|escape}</td>
        </tr>
        <tr>
        <th width="100" valign="top">URL（中国）</th>
        <td>{$news.0.col_url_cn|escape}</td>
        </tr>
        <tr>
        <th width="100" valign="top">URL（台湾・香港）</th>
        <td>{$news.0.col_url_tw|escape}</td>
        </tr>
        
        <tr>
        <th width="100" valign="top">リンク？</th>
        <td>{if strcasecmp($news.0.col_link,1) == 0}リンクしない{else}リンクする{/if}</td>
        </tr>
        </table>
    </div>
</div>
</div>
</div>
</div>
</body>
</html>
