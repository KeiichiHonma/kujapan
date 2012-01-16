<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="{$locale.lang}" xml:lang="{$locale.lang}" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
{*seo*}
{include file="include/header/seo.inc"}
    <link href="/css/0-import.css" rel="stylesheet" type="text/css" />
    <link href="/locale/{$smarty.const.LOCALE}/css/background.css" rel="stylesheet" type="text/css" />
    <meta content="text/javascript" http-equiv="Content-Script-Type" />
    <script src="/js/smartRollover.js" type="text/javascript"></script>
    <script src="/js/jquery-1.4.2.min.js" type="text/javascript"></script>
    <script src="/js/jquery.cycle.js" type="text/javascript"></script>
    <script src="/js/slideshow.js" type="text/javascript"></script>
    <script src="/js/alphafilter.js" type="text/javascript"></script>
{literal}
    <!--
      jCarousel library
    -->
    <script src="/js/jquery.jcarousel.js" type="text/javascript"></script>
    <script type="text/javascript">
      //<![CDATA[
        //
        function mycarousel_initCallback(carousel)
        {
        // Disable autoscrolling if the user clicks the prev or next button.
        carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
        });
        
        carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
        });
        
        // Pause autoscrolling if the user moves with the cursor over the clip.
        carousel.clip.hover(function() {
        carousel.stopAuto();
        }, function() {
        carousel.startAuto();
        });
        };
        
        jQuery(document).ready(function() {
        jQuery('#mycarousel').jcarousel({
        auto: 2,
        wrap: 'last',
        initCallback: mycarousel_initCallback
        });
        });
        //
      //]]>
    </script>
{/literal}
  </head>
  <body>
  <div id="wrapper">
    <div id="container">
{*ロゴ、グローバルナビ*}
{include file="include/header/header.inc"}
      <div id="sub">

{if $news}
        <div id="news_box">
          <div>
            <img alt="{$locale.genre_title}" src="/locale/{$smarty.const.LOCALE}/img/part/top_news_title.gif" width="300" height="38" />
          </div>
          <div id="news_box_inner">
            <div class="ml_10">
              <img alt="" height="5" src="/img/part/top_genre_box2_head.gif" width="280" />
            </div>
            <div id="news_box2">
                <ul>
                    {foreach from=$news key="key" item="value" name="news"}
                        <li>
                        {$value.col_from|make_news_judge_new}{$value.col_date|make_date}<br />
                        {if strcasecmp($value.col_link,1) == 0}
                        {$value.col_title}
                        {elseif strlen($value.col_url) > 0}
                        <a href="{$value.col_url}" target="_blank">{$value.col_title}</a>
                        {else}
                        <a href="{$smarty.const.KUJAPANURL}/news/nid/{$value._id}" target="_blank">{$value.col_title}</a>
                        {/if}
                        </li>
                    {/foreach}
                </ul>
            </div>
            <div class="ml_10">
              <img alt="" height="5" src="/img/part/top_genre_box2_foot.gif" width="280" />
            </div>
          </div>
          <div>
            <img alt="" height="5" src="/img/part/top_genre_box3_foot.gif" width="300" />
          </div>
        </div>
{/if}
{if $login_uid}
        <div id="login_box_set">
            <div id="login_box_inner">
                <p id="title">{$locale.login_box_title}</p>
                <p id="text_area">
                    {$locale.login_box_text_area_login_1}<br />
                    {$locale.login_box_text_area_login_2}<br />{$login_validate_time|make_date}{$locale.login_box_text_area_login_3}
                </p>
                <form action="{$smarty.const.KUJAPANURLSSL}{$smarty.server.REQUEST_URI}" method="post">
                    <p class="mt_15">
                    <input type="hidden" name="csrf_ticket" value="{$csrf_ticket}" />
                    <input type="hidden" name="auth" value="logout" />
                    <input type="image" src="/locale/{$smarty.const.LOCALE}/img/button/logout_bt.gif"  class="btn" value="submit" />
                    </p>
                </form>
            </div>
        </div>
{else}
          <div id="login_box">
              <div id="login_box_inner">
                <p id="title">{$locale.login_box_title}</p>
                <p id="text_area">
                  {$locale.login_box_text_area|nl2br}
                </p>
                <form action="{$smarty.const.KUJAPANURLSSL}{$smarty.server.REQUEST_URI}" method="post">
                    {$error.all|error_message:''}
                    <p>
                        {$error.account|error_message:''}
                        {$locale.login_account|error_bold:$error.account}
                        <input class="text_input" type="text" id="account" name="account" value="{if $smarty.post.account}{$smarty.post.account|escape}{/if}" />
                    </p>
                    
                    <p class="mt_15">
                        {$error.password|error_message:''}
                        {$locale.login_password|error_bold:$error.password}
                        <input type="password" name="password" class="text_input" value="" />
                    </p>
                    <p class="mt_15">
                        <input type="hidden" name="csrf_ticket" value="{$csrf_ticket}" />
                        <input type="hidden" name="auth" value="login" />
                        <input type="image" src="/locale/{$smarty.const.LOCALE}/img/button/top_login_bt.gif"  class="btn" value="submit" />
                    </p>
                </form>


              </div>    
          </div>
{/if}
        
        <div>
          <img alt="" height="5" src="/img/part/ltop_ogin_box_foot.gif" width="300" />
        </div>
        
        <div id="genre_box">
          <div>
            <img alt="{$locale.genre_title}" height="35" src="/locale/{$smarty.const.LOCALE}/img/part/top_genre_title.jpg" width="300" />
          </div>
          <div id="genre_box_inner">
            <div class="ml_10">
              <img alt="" height="5" src="/img/part/top_genre_box2_head.gif" width="280" />
            </div>
            <div id="genre_box2">
                {foreach from=$genre key="gid" item="value" name="genre"}
                <div class="ml_10">
                    <div id="genre_pnl_0{$gid}">
                      <a href="{$smarty.const.KUJAPANURL}/genre/gid/{$gid}"{if !$debug} target="_blank"{/if}>{$value.col_detail}</a>
                    </div>
                </div>
                {/foreach}
            </div>
            <div class="ml_10">
              <img alt="" height="5" src="/img/part/top_genre_box2_foot.gif" width="280" />
            </div>
          </div>
          <div>
            <img alt="" height="5" src="/img/part/top_genre_box3_foot.gif" width="300" />
          </div>
        </div>
<a href="{$smarty.const.KUJAPANURL}/campaign" target="_blank"><img src="/img/campaign/20120116/banner.jpg" /></a><br />
{*全ページバナー*}
{include file="include/common/all_banner.inc"}
{if !$login_uid}
        <div>
          <img alt="{$locale.top_use_coupon}" src="/locale/{$smarty.const.LOCALE}/img/part/top_use_coupon.gif" width="300" height="394" />
        </div>
{/if}


{*特集ページバナー*}
{include file="include/common/top_special_bannar_box.inc"}
      </div>
      <div id="main">
        <div id="slideshow">
          <div class="slides">
            <ul>
              <li id="slide-one">
                <a href="{$smarty.const.KUJAPANURL}/special/group/grid/1">
                  <img alt="" border="0" id="slide1" name="slide1" src="/locale/{$smarty.const.LOCALE}/img/index/main_img01.jpg" width="650" height="243" />
                </a>
              </li>
              <li id="slide-two">
                <a href="{$smarty.const.KUJAPANURL}/special/group/grid/2">
                  <img alt="" id="slide2" name="slide2" src="/locale/{$smarty.const.LOCALE}/img/index/main_img02.jpg" width="650" height="243" />
                </a>
              </li>
              <li id="slide-three">
                <a href="{$smarty.const.KUJAPANURL}/special/group/grid/3">
                  <img alt="" id="slide3" name="slide3" src="/locale/{$smarty.const.LOCALE}/img/index/main_img03.jpg" width="650" height="243" />
                </a>
              </li>
            </ul>
          </div>
          <ul class="slides-nav">
            <li class="on">
              <a href="#slide-one">1</a>
            </li>
            <li>
              <a href="#slide-two">2</a>
            </li>
            <li>
              <a href="#slide-three">3</a>
            </li>
          </ul>
        </div>

        <div id="spot_box_body" class="clearfix">
            <div id="spot_box_01">
                <ul>
                    <li><a href="{$smarty.const.KUJAPANURL}/area/aid/1"{if !$debug} target="_blank"{/if}><img src="locale/{$smarty.const.LOCALE}/img/button/spot01_01_off.jpg" alt="{$area.1.col_name}" width="198" height="112" /></a></li>
                    <li><a href="{$smarty.const.KUJAPANURL}/area/aid/2"{if !$debug} target="_blank"{/if}><img src="locale/{$smarty.const.LOCALE}/img/button/spot01_02_off.jpg" alt="{$area.2.col_name}" width="198" height="112" /></a></li>
                    <li><a href="{$smarty.const.KUJAPANURL}/area/aid/3"{if !$debug} target="_blank"{/if}><img src="locale/{$smarty.const.LOCALE}/img/button/spot01_03_off.jpg" alt="{$area.3.col_name}" width="198" height="112" /></a></li>
                    <li><a href="{$smarty.const.KUJAPANURL}/area/aid/4"{if !$debug} target="_blank"{/if}><img src="locale/{$smarty.const.LOCALE}/img/button/spot01_04_off.jpg" alt="{$area.4.col_name}" width="198" height="112" /></a></li>
                    <li><a href="{$smarty.const.KUJAPANURL}/area/aid/5"{if !$debug} target="_blank"{/if}><img src="locale/{$smarty.const.LOCALE}/img/button/spot01_05_off.jpg" alt="{$area.5.col_name}" width="198" height="112" /></a></li>
                    <li><a href="{$smarty.const.KUJAPANURL}/area/aid/6"{if !$debug} target="_blank"{/if}><img src="locale/{$smarty.const.LOCALE}/img/button/spot01_06_off.jpg" alt="{$area.6.col_name}" width="198" height="112" /></a></li>
                </ul>
            </div>
            <div id="spot_box_wrapper">
                {if array_key_exists(7,$area) && array_key_exists(8,$area)}
                <div id="spot_box_02">
                    <ul>
                        <li><a href="{$smarty.const.KUJAPANURL}/area/aid/7"{if !$debug} target="_blank"{/if}><img src="locale/{$smarty.const.LOCALE}/img/button/spot02_01_off.jpg" alt="{$area.7.col_name}" width="198" height="99" /></a></li>
                        <li><a href="{$smarty.const.KUJAPANURL}/area/aid/8"{if !$debug} target="_blank"{/if}><img src="locale/{$smarty.const.LOCALE}/img/button/spot02_02_off.jpg" alt="{$area.8.col_name}" width="198" height="99" /></a></li>
                    </ul>
                </div>
                {/if}
                {if array_key_exists(9,$area)}
                <div id="spot_box_03">
                    <ul>
                        <li><a href="{$smarty.const.KUJAPANURL}/area/aid/9"{if !$debug} target="_blank"{/if}><img src="locale/{$smarty.const.LOCALE}/img/button/spot03_01_off.jpg" alt="{$area.9.col_name}" width="198" height="99" /></a></li>
                    </ul>
                </div>
                {/if}
            </div>
        </div>
        
        <ul class="jcarousel-skin-tango" id="mycarousel">
            {foreach from=$logos key="key" item="value" name="logos"}
            <li>
            {if is_int($value)}
            <img alt="" border="0" src="/img/logo/{$value}s.gif" width="72" height="40" />
            {else}
            <img alt="" border="0" src="/img/static_logo/{$value}s.gif" width="72" height="40" />
            {/if}
            </li>
            {/foreach}
        </ul>
        
        <div id="top_recommend_box">
            <div id="top_recommend_box_inner">
                <ul>
                    <li><a href="{$smarty.const.KUJAPANURL}/shop/sid/68"{if !$debug} target="_blank"{/if}><img src="locale/{$smarty.const.LOCALE}/img/button/top_center_contents_sofmap_off.jpg" alt="{$index_shop.68.shop_name}" width="630" height="220" /></a></li>
                    <li><a href="{$smarty.const.KUJAPANURL}/shop/sid/71"{if !$debug} target="_blank"{/if}><img src="locale/{$smarty.const.LOCALE}/img/button/top_center_contents_ones_off.jpg" alt="{$index_shop.71.shop_name}" width="630" height="220" /></a></li>
                    <li><a href="{$smarty.const.KUJAPANURL}/shop/sid/5"{if !$debug} target="_blank"{/if}><img src="locale/{$smarty.const.LOCALE}/img/button/top_center_contents_brandoff_off.jpg" alt="{$index_shop.5.shop_name}" width="630" height="220" /></a></li>
                </ul>
            </div>
        </div>
        
        <div id="text_box">
          <div>
            <img alt="{$locale.top_title}" height="29" src="/locale/{$smarty.const.LOCALE}/img/part/top_title.gif" width="650" />
          </div>
          <div id="text_box_inner">
            <div id="text_box2">
              <div>
                <img alt="" height="5" src="/img/part/top_box_w_s_head.gif" width="630" />
              </div>
              <div id="text_box2_inner">{$locale.top_title_text}</div>
              <div>
                <img alt="" height="5" src="/img/part/top_box_w_s_foot.gif" width="630" />
              </div>
            </div>
          </div>
          <div>
            <img alt="" height="10" src="/img/part/top_box_g_foot.gif" width="650" />
          </div>
        </div>
      </div>
{*フッター*}
{include file="include/header/footer.inc"}
    </div>
  </div>
</body>
</html>