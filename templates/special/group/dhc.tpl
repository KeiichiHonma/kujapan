<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="{$locale.lang}" xml:lang="{$locale.lang}" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
{*seo*}
{include file="include/header/seo.inc"}
    <link href="/css/0-import.css" rel="stylesheet" type="text/css" />
    <link href="/css/list.css" rel="stylesheet" type="text/css" />
    <link href="/locale/{$smarty.const.LOCALE}/css/background.css" rel="stylesheet" type="text/css" />
    <link href="/css/special/group/dhc.css" rel="stylesheet" type="text/css" />
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
            <div id="dhc">
                <h2 class="list clear">{$group.0.col_name}{$locale.dhc_direct_management}</h2>
                
                <div id="dhc_mainVisual">
                    <div id="mainVisualImg">
                        <img src="/img/special/group/dhc/main.jpg" width="723" height="300" alt=""/>
                        <div class="bottom">
                            <p><img src="/locale/{$smarty.const.LOCALE}/img/special/group/dhc/shop_copy_ch.jpg" alt="" width="340" height="206" /></p>
                            <p class="text">
                                <img src="/locale/{$smarty.const.LOCALE}/img/special/group/dhc/dhc_sub_copy.gif" alt="" width="370" height="19" /><br />
                                {$locale.dhc_sub_copy_text}
                            </p>
                        </div>
                    </div>
                </div>
            
                <div class="lcontents">
                    <h3 class="h3_title">{$locale.dhc_h3_title_1}</h3>
                    <div class="container">
                        <img src="/locale/{$smarty.const.LOCALE}/img/special/group/dhc/concept_title.gif" width="275" height="73" alt="" />
                        <div class="common_text clearfix">
                            <div class="concept">
                            <h4><img src="/locale/{$smarty.const.LOCALE}/img/special/group/dhc/sub_title_1.gif" width="235" height="22" alt="" /></h4>
                            {$locale.dhc_h4_text_1}
                            </div>
                            <div class="concept">
                            <h4><img src="/locale/{$smarty.const.LOCALE}/img/special/group/dhc/sub_title_2.gif" width="235" height="22" alt="" /></h4>
                            {$locale.dhc_h4_text_2}
                            </div>
                            <div class="concept_last">
                            <h4><img src="/locale/{$smarty.const.LOCALE}/img/special/group/dhc/sub_title_3.gif" width="235" height="22" alt="" /></h4>
                            {$locale.dhc_h4_text_3}
                            </div>
                        
                        </div>
                    
                        <div class="common_text clearfix">
                            <div class="fl">
                                <img src="/img/special/group/dhc/face.jpg" width="300" height="192" alt="" />
                            </div>
                            <div class="photo_text">
                                {$locale.dhc_photo_text_1}
                            </div>
                        </div>

                        <div class="common_text_last clearfix">
                            <div class="photo_text">
                            {$locale.dhc_photo_text_2}
                            </div>
                            <div class="fr">
                                <img src="/img/special/group/dhc/person1.jpg" width="150" height="200" alt="" />
                                <img src="/img/special/group/dhc/person2.jpg" width="150" height="200" alt="" />
                            </div>
                        </div>
                    </div>

                </div>

                <div class="lcontents">
                    <h3 class="h3_title">{$locale.dhc_h3_title_2}</h3>
                    <div class="container">
                        <div class="productlistwrap clearfix">
                            <div class="product_photo">
                                <img src="/img/special/group/dhc/product3.jpg" width="65" height="150" alt="" />
                            </div>
                            <div class="product_text">
                                <h5>{$locale.dhc_h5_title_1}</h5>
                                {$locale.dhc_product_text_1}
                            </div>
                        </div>
                        
                        <div class="productlistwrap clearfix">
                            <div class="product_photo">
                                <img src="/img/special/group/dhc/product1.jpg" width="32" height="150" alt="" /><br />
                            </div>
                            <div class="product_text">
                                <h5>{$locale.dhc_h5_title_2}</h5>
                                {$locale.dhc_product_text_2}
                            </div>
                        </div>
                        
                        <div class="productlistwrap_last clearfix">
                            <div class="product_photo">
                                <img src="/img/special/group/dhc/product2.jpg" width="98" height="150" alt="" /><br />
                            </div>
                            <div class="product_text">
                                <h5>{$locale.dhc_h5_title_3}</h5>
                                {$locale.dhc_product_text_3}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br class="clear" />
            <h3 class="h3_title">{$locale.dhc_h3_title_3}</h3>
            <br class="clear" />
{*クーポンここから*}
{if $coupon}
    {foreach from=$coupon key="key" item="value" name="coupon"}
    {if $value.shop_id == 9}
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
    {/if}
    {/foreach}
    {foreach from=$coupon key="key" item="value" name="coupon"}
    <ul class="listbox">
    {if $value.shop_id != 9}
        <li><a href="{$smarty.const.KUJAPANURL}/shop/sid/{$value.col_sid}">{$value.shop_name} - {$value.coupon_title}</a></li>
    {/if}
    {/foreach}
    </ul>
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