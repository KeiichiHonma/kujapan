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
            <p lang="ja" id="divide_format_title">「日遊酷棒」への店舗掲載のお問い合わせ</p>
            <div lang="ja" id="divide_format_message">
            「日遊酷棒」はインバウンド事業を行う日本企業の株式会社ハチワンが、<br />
            店舗情報の掲載を希望する企業様からのお問い合わせを以下より承ります。<br />
            ※全て日本語で記入いただけます。
            </div>

            <form id="couponForm" name="couponForm" action= "{$smarty.const.KUJAPANURLSSL}/inquiry/input" method="post">

            {foreach from=$form key="group_name" item="form_data" name="form_data"}
            <table cellpadding="5" cellspacing="1" class="gray">
            {foreach from=$form_data key="form_name" item="form_setting" name="form_setting"}
            {$form_name|make_form_gray:$form_setting:$error:$smarty.const.SMARTY_BOOL_OFF:$smarty.const.SMARTY_BOOL_OFF}
            {/foreach}

<tr>
<td class="form_ttl"><table cellspacing="0" cellpadding="5"><tr><td lang="ja">日遊酷棒を知ったきっかけ</td></tr></table></td>
<td lang="ja" class="form_data">
<input lang="ja" type="checkbox" id="search_check" name="search_check"  class="radio" value="search" {if isset($smarty.post.search_check) && $smarty.post.search_check == "search"} checked{/if} /><label for="search_check">&nbsp;<span>{$trigger.search_check}</span></label><br />

<input lang="ja" type="checkbox" id="sales_check" name="sales_check"  class="radio" value="sales" {if isset($smarty.post.sales_check) && $smarty.post.sales_check == "sales"} checked{/if} /><label for="sales_check">&nbsp;<span>{$trigger.sales_check}</span></label><br />

<input lang="ja" type="checkbox" id="friend_check" name="friend_check"  class="radio" value="friend" {if isset($smarty.post.friend_check) && $smarty.post.friend_check == "friend"} checked{/if} /><label for="friend_check">&nbsp;<span>{$trigger.friend_check}</span></label><br />

<input lang="ja" type="checkbox" id="press_check" name="press_check"  class="radio" value="press" {if isset($smarty.post.press_check) && $smarty.post.press_check == "press"} checked{/if} /><label for="press_check">&nbsp;<span>{$trigger.press_check}</span></label><br />

<input lang="ja" type="checkbox" id="media_check" name="media_check"  class="radio" value="media" onClick="checkMedia()"{if isset($smarty.post.media_check) && $smarty.post.media_check == "media"} checked{/if} /><label for="media_check">&nbsp;<span>{$trigger.media_check}</span></label><br />
<p class="m_b10"><input lang="ja" type="text" name="media_name" value="{if isset($smarty.post.media_name)}{$smarty.post.media_name}{/if}" class="form_text_common" /></p>

<input lang="ja" type="checkbox" id="etc_check" name="etc_check"  class="radio" value="etc" onClick="checkEtc()"{if isset($smarty.post.etc_check) && $smarty.post.etc_check == "etc"} checked{/if} /><label for="etc_check">&nbsp;<span>{$trigger.etc_check}</span></label><br />
<p class="m_b10"><input lang="ja" type="text" name="etc_name" value="{if isset($smarty.post.etc_name)}{$smarty.post.etc_name}{/if}" class="form_text_common" /></p>

</td>
</tr>

<tr>
<td class="form_ttl"><table cellspacing="0" cellpadding="5"><tr><td lang="ja">ご質問など</td></tr></table></td>
<td class="form_data"><textarea lang="ja" name="detail" class="form_textarea_little" />{$smarty.post.detail}</textarea></td>
</tr>


            </table>
            {/foreach}

            <div id="form_btn">
            <input type="hidden" name="csrf_ticket" value="{$csrf_ticket}" />
            <input type="hidden" name="operation" value="check" />
            <input type="image" src="/img/button/b_confirm.gif" value="submit" class="btn" onClick="return form_confirm(this)" />
            </div>
            </form>

        </div>

<script src="/js/inquiry.js" type="text/javascript"></script>
<script type="text/javascript">
{if !isset($smarty.post.media_check) || $smarty.post.media_check != "media"}
    disableMedia();
{/if}
{if !isset($smarty.post.etc_check) || $smarty.post.etc_check != "etc"}
    disableEtc();
{/if}
</script>
{*フッター*}
{include file="include/header/footer.inc"}
    </div>
  </div>
  </body>
</html>