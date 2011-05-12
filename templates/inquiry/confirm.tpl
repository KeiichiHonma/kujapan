<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="{$locale.lang}" xml:lang="{$locale.lang}" xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
{*seo*}
{include file="include/header/seo.inc"}
    <link href="/css/0-import.css" rel="stylesheet" type="text/css" />
    <link href="/css/divide_format.css" rel="stylesheet" type="text/css" />
    <link href="/css/form.css" rel="stylesheet" type="text/css" />
    <link href="/locale/{$smarty.const.LOCALE}/css/background.css" rel="stylesheet" type="text/css" />
    <meta content="text/javascript" http-equiv="Content-Script-Type" />
    <script src="/js/smartRollover.js" type="text/javascript"></script>
    <script src="/js/alphafilter.js" type="text/javascript"></script>
    <script src="/js/form.js" type="text/javascript"></script>
  </head>
  <body id="coupon">
    <div id="wrapper">
      <div id="container">
{*ロゴ、グローバルナビ*}
{include file="include/header/header.inc"}
{*ポジション*}
{include file="include/common/position.inc"}
        <div class="clear" id="s_sub">
{*ログインボックス*}
{include file="include/common/login_box.inc"}
{*エリアボックス*}
{include file="include/common/area_box.inc"}
{*ジャンルボックス*}
{include file="include/common/genre_box.inc"}
        </div>
        <div id="s_main">
          <h2 lang="ja" class="list">掲載をご検討の企業様</h2>
            <p  lang="ja"id="divide_format_title">「日遊酷棒」への店舗掲載のお問い合わせ</p>
            <div lang="ja" id="divide_format_message">
            「日遊酷棒」はインバウンド事業を行う日本企業の株式会社ハチワンが、<br />
            店舗情報の掲載を希望する企業様からのお問い合わせを以下より承ります。<br />
            ※全て日本語で記入いただけます。
            </div>

            <form id="couponForm" name="couponForm" action= "{$smarty.const.KUJAPANURLSSL}/inquiry/input" method="post">

            {foreach from=$form key="group_name" item="form_data" name="form_data"}
            <table cellpadding="5" cellspacing="1" class="gray">
            {foreach from=$form_data key="form_name" item="form_setting" name="form_setting"}
            {$form_name|make_form_gray:$form_setting:$error:$smarty.const.SMARTY_BOOL_OFF:$smarty.const.SMARTY_BOOL_ON}
            {/foreach}

<tr>
<td class="form_ttl"><table cellspacing="0" cellpadding="5"><tr><td lang="ja">日遊酷棒を知ったきっかけ</td></tr></table></td>
<td class="form_data">
{if $smarty.post.search_check}{$trigger.search_check}<input type="hidden" name="search_check" value="search" /><br />{/if}
{if $smarty.post.sales_check}{$trigger.sales_check}<input type="hidden" name="sales_check" value="sales" /><br />{/if}
{if $smarty.post.friend_check}{$trigger.friend_check}<input type="hidden" name="friend_check" value="friend" /><br />{/if}
{if $smarty.post.press_check}{$trigger.press_check}<input type="hidden" name="press_check" value="press" /><br />{/if}
{if $smarty.post.media_check}{$trigger.media_check}&nbsp;{$smarty.post.media_name}<input type="hidden" name="media_check" value="media" /><input type="hidden" name="media_name" value="{$smarty.post.media_name}" /><br />{/if}
{if $smarty.post.etc_check}{$trigger.etc_check}&nbsp;{$smarty.post.etc_name}<input type="hidden" name="etc_check" value="etc" /><input type="hidden" name="etc_name" value="{$smarty.post.etc_name}" />{/if}
</td>
</tr>

<tr>
<td class="form_ttl"><table cellspacing="0" cellpadding="5"><tr><td lang="ja">ご質問など</td></tr></table></td>
<td class="form_data">{$smarty.post.detail|nl2br}<input type="hidden" name="detail" value="{$smarty.post.detail}" /></td>
</tr>


            </table>
            {/foreach}

            <div id="form_btn">
            <input type="hidden" name="csrf_ticket" value="{$csrf_ticket}" />
            <input type="hidden" name="operation" value="" />
            <input type="image" src="/img/button/b_back.gif" value="submit" class="btn" onClick="return form_back()" />
            <input type="image" src="/img/button/b_inquiry.gif" value="submit" class="btn" onClick="return form_regist()" />
            </div>
            </form>

        </div>
{*フッター*}
{include file="include/header/footer.inc"}
    </div>
  </div>
  </body>
</html>