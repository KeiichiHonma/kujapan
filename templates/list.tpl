<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="{$locale.lang}" xml:lang="{$locale.lang}" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
{*seo*}
{include file="include/header/seo.inc"}
    <link href="/css/0-import.css" rel="stylesheet" type="text/css" />
    <link href="/css/list.css" rel="stylesheet" type="text/css" />
    <link href="/locale/{$smarty.const.LOCALE}/css/background.css" rel="stylesheet" type="text/css" />
    <meta content="text/javascript" http-equiv="Content-Script-Type" />
    <script src="/js/smartRollover.js" type="text/javascript"></script>
    <script src="/js/alphafilter.js" type="text/javascript"></script>
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
{*全ページバナー*}
{include file="include/common/all_banner.inc"}
{*特集ページバナー*}
{include file="include/common/sub_special_bannar_box.inc"}
        </div>
        <div id="s_main">
          {include file="include/common/sp.inc"}
          <h2 class="list clear">{$list_title}{$locale.title_tail}</h2>
{if $coupon}
          {foreach from=$coupon key="key" item="value" name="coupon"}
          {assign var=gid value=$value.col_gid}

            <div class="list_coupon">
                <div class="list_coupon_inner">
                    <div class="list_coupon_title">

                        <div class="first">
                            <span class="price1">{$locale.coupon}</span>
                            <span class="price2">{$value.coupon_discount}</span>
                        </div>

                        <div class="second">
                            <h3><a href="{$smarty.const.KUJAPANURL}/shop/sid/{$value.col_sid}/ref/{$ref}"{if !$debug} target="_blank"{/if}>{$value.coupon_title}</a></h3>
                        </div>
                    </div>
                </div>

                <div class="list_coupon_g">
                    <div class="img_area">

                          <div class="logo_balloon">
                            <img alt="" src="/img/logo/{$value.col_sid}m.gif" width="165" height="65" />
                          </div>

                      <!-- /photo_area -->
                    </div>
                    <!-- /img_area -->
                    <div class="text_area">
                      <img alt="" height="5" src="/img/coupon/box_w_head.gif" width="497" /><div class="list_box_w">
                        <div class="shop_exp">
                             <dl>
                                <dt>{$value.shop_name}</dt>
                                <dd>
                                    <p class="shop_list_text_area clear">
                                      {$value.shop_detail|nl2br}
                                    </p>
                                </dd>
                              </dl>
                                <div class="frame-block">
                                    <span>&nbsp;</span>
                                    <img src="{$value.col_face|getFilePath:$value.col_extension}" width="{$value.col_width}" height="{$value.col_height}" alt="{$value.col_alt}" />
                                </div>
                        </div>
                        <!-- /shop_exp -->
                      </div>
                        <div class="text_area_footer clear">
                        <p class="more_btn_area">
                          <a class="more_btn" href="{$smarty.const.KUJAPANURL}/shop/sid/{$value.col_sid}/ref/{$ref}"{if !$debug} target="_blank"{/if}>{$locale.more_bt}</a>
                        </p>
                        </div>


                      <!-- /list_box_w -->
                    </div>
                    <!-- /text_area -->
                    <br class="clear" />
                </div>
                <p><img alt="" height="5" src="/img/coupon/list_coupon_foot.gif" width="725" /></p>
            </div>
          {/foreach}
          {include file="include/common/sp.inc"}
{else}
{$locale.coupon_none_error}
{/if}
        </div>
{*フッター*}
{include file="include/header/footer.inc"}
    </div>
  </div>
  </body>
</html>