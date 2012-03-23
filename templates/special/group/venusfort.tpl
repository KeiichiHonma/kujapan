<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="{$locale.lang}" xml:lang="{$locale.lang}" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
{*seo*}
{include file="include/header/seo.inc"}
    <link href="/css/0-import.css" rel="stylesheet" type="text/css" />
    <link href="/css/list.css" rel="stylesheet" type="text/css" />
    <link href="/locale/{$smarty.const.LOCALE}/css/background.css" rel="stylesheet" type="text/css" />
    <link href="/css/special/group/venusfort.css" rel="stylesheet" type="text/css" />
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
        </div>
<div id="s_main">
    <div id="venusfort">
        <h2 class="list clear">{$group.0.col_name}</h2>
        <div class="lcontents">
            <img src="/img/special/group/venusfort/main.jpg" width="640" height="300" alt="" />
        </div>
        <div class="lcontents">
            <div id="point-wrap">
                
                <h3><img alt="{$locale.venusfort_h2_point_wrap}" src="/locale/{$smarty.const.LOCALE}/img/special/group/venusfort/h2_point.gif" width="71" height="23"></h3>
                
                <div class="point-wrap-container">
                    <img src="/img/special/group/venusfort/point_img01.jpg" width="110" height="73" alt="全方位的对外服务" class="left" />
                    <div class="text_content">
                        <h4>{$locale.venusfort_h2_point_wrap_title_1}</h4>
                        <p>{$locale.venusfort_h2_point_wrap_text_1}</p>
                    </div>
                </div>
                <div class="point-wrap-container">
                    <img src="/img/special/group/venusfort/point_img02.jpg" width="110" height="80" alt="从羽田机场出发仅15分钟" class="left" />
                    <div class="text_content">
                        <h4>{$locale.venusfort_h2_point_wrap_title_2}</h4>
                        <p>{$locale.venusfort_h2_point_wrap_text_2}</p>
                    </div>
                </div>
                <br class="clear" />
                <div class="point-wrap-container">
                    <img src="/img/special/group/venusfort/point_img03.jpg" width="110" height="82" alt="馆内景点及服务设施" class="left" />
                    <div class="text_content">
                        <h4>{$locale.venusfort_h2_point_wrap_title_3}</h4>
                        <p>{$locale.venusfort_h2_point_wrap_text_3}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="lcontents">
            <h3 class="h3_title"><img alt="{$locale.venusfort_h2_about}" src="/locale/{$smarty.const.LOCALE}/img/special/group/venusfort/h2_about.gif" width="114" height="22"></h3>
            <div class="container">
                <p>{$locale.venusfort_h2_about_text}</p>
            </div>
            <div class="container clearfix">
                
                <h4><img alt="{$locale.venusfort_title_logo}" src="/locale/{$smarty.const.LOCALE}/img/special/group/venusfort/title_logo.jpg" width="640" height="30"></h4>
                <dl class="content">
                    <dt><img src="/img/special/group/venusfort/img_logo.gif" width="251" height="34" alt="VenusFort" /></dt>
                    <dd>
                        <h5>{$locale.venusfort_title_logo_title}</h5>
                        <img src="/img/special/group/venusfort/3f.gif" width="12" height="12" alt="" /> {$locale.venusfort_title_logo_text_1}<br />
                        <img src="/img/special/group/venusfort/2f.gif" width="12" height="12" alt="" /> {$locale.venusfort_title_logo_text_2}<br />
                        <img src="/img/special/group/venusfort/1f.gif" width="12" height="12" alt="" /> {$locale.venusfort_title_logo_text_3}<br />
                    </dd>
                </dl>
            </div>
            <br class="clear" />
            <div class="container clearfix">
                <h4><img alt="{$locale.venusfort_title_floor}" src="/locale/{$smarty.const.LOCALE}/img/special/group/venusfort/title_floor.jpg" width="640" height="30"></h4>
                <h5>{$locale.venusfort_title_floor_title_1} <span class="blue">■</span> Venus OUTLET</h5>
                <p>{$locale.venusfort_title_floor_text_1}</p><br />
                <p><img src="/img/special/group/venusfort/line.gif" width="640" height="3" alt="-------------------------" /></p><br />
                <h5>{$locale.venusfort_title_floor_title_2} <span class="pink">■</span> Venus GRAND</h5>
                <p>{$locale.venusfort_title_floor_text_2}</p><br />
                <p><img src="/img/special/group/venusfort/line.gif" width="640" height="3" alt="-------------------------" /></p><br />
                <h5>{$locale.venusfort_title_floor_title_3} <span class="yellow">■</span> Venus FAMILY</h5>
                <p>{$locale.venusfort_title_floor_text_3}</p><br />
            </div>
        </div>

        <div class="lcontents">
            <h3 class="h3_title"><img alt="{$locale.venusfort_h2_access}" src="/locale/{$smarty.const.LOCALE}/img/special/group/venusfort/h2_access.gif" width="66" height="22"></h3>
            <div class="container">
                <p><img alt="{$locale.venusfort_access_map}" src="/locale/{$smarty.const.LOCALE}/img/special/group/venusfort/access_map.jpg" width="640" height="510"></p>
                <br />
                <p>
                    <strong><span class="orange">■</span> {$locale.venusfort_access_map_title_1}</strong><br />
                    {$locale.venusfort_access_map_text_1}<br />
                    {$locale.venusfort_access_map_text_2}
                </p><br />
                <p>
                    <strong><span class="orange">■</span> {$locale.venusfort_access_map_title_2}</strong><br />
                    {$locale.venusfort_access_map_text_3}
                </p><br />
            </div>
        </div>
    </div>
    <br class="clear" />
<h3 class="h3_title">{$group.0.col_name}{$locale.title_tail}</h3>
<br class="clear" />
{*クーポンここから*}
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
                            <h3><a href="{$smarty.const.KUJAPANURL}/shop/sid/{$value.col_sid}">{$value.coupon_title}</a></h3>
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
                          <a class="more_btn" href="{$smarty.const.KUJAPANURL}/shop/sid/{$value.col_sid}">{$locale.more_bt}</a>
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