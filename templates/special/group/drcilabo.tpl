<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="{$locale.lang}" xml:lang="{$locale.lang}" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
{*seo*}
{include file="include/header/seo.inc"}
    <link href="/css/0-import.css" rel="stylesheet" type="text/css" />
    <link href="/css/list.css" rel="stylesheet" type="text/css" />
    <link href="/locale/{$smarty.const.LOCALE}/css/background.css" rel="stylesheet" type="text/css" />
    <link href="/css/special/group/drcilabo.css" rel="stylesheet" type="text/css" />
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
            <div id="drcilabo">
                <h2 class="list clear">{$group.0.col_name}</h2>
                
                <div class="lcontents">
                    <img src="/locale/{$smarty.const.LOCALE}/img/special/group/drcilabo/logo_text.jpg" width="725" height="62" alt="" />
                    <img src="/img/special/group/drcilabo/main.jpg" width="725" height="350" alt="" />
                </div>

            
                <div class="lcontents">
                    <h3 class="h3_title">{$locale.drcilabo_h3_title_1}</h3>
                    <div class="container">
                        <span class="concept_title">{$locale.drcilabo_concept_title}</span>
                        <p class="concept">
                            
                            <img src="/img/special/group/drcilabo/concept-1.gif" width="115" height="121" alt="Simple" />
                            <img src="/img/special/group/drcilabo/concept-2.gif" width="115" height="121" alt="Result" />
                            <img src="/img/special/group/drcilabo/concept-3.gif" width="115" height="121" alt="Science" />
                        </p>
                        <div class="subt"><h4><span>Simple</span>【{$locale.drcilabo_concept_subtitle_1}】</h4></div>
                        <ul class="listbox">
                        <li>{$locale.drcilabo_concept_text_1}</li>
                        </ul>
                        
                        <div class="subt"><h4><span>Result</span>【{$locale.drcilabo_concept_subtitle_2}】</h4></div>
                        <ul class="listbox">
                        <li>{$locale.drcilabo_concept_text_2}</li>
                        </ul>
                        
                        <div class="subt"><h4><span>Science</span>【{$locale.drcilabo_concept_subtitle_3}】</h4></div>
                        <ul class="listbox">
                        <li>{$locale.drcilabo_concept_text_3}</li>
                        </ul>
                    </div>
                </div>

                <div class="lcontents">
                    <h3 class="h3_title">{$locale.drcilabo_h3_title_2}</h3>
                    <div class="container">
                        <div class="common_text clearfix">
                            {$locale.drcilabo_h3_2_text_1}
                        </div>
                        
                        <div class="common_text clearfix">
                            <div class="photo_text">
                                {$locale.drcilabo_h3_2_text_2}
                            </div>
                            <div class="fr">
                                <img src="/img/special/group/drcilabo/doc.jpg" width="191" height="240" alt="" />
                            </div>
                        </div>

                        <div class="common_text clearfix">
                            {$locale.drcilabo_h3_2_text_3}
                        </div>

                        <div class="common_text clearfix">
                            {$locale.drcilabo_h3_2_text_4}
                        </div>

                        <div class="common_text_last clearfix">
                            <div class="photo_text">
                                {$locale.drcilabo_h3_2_text_5}
                            </div>
                            <div class="fr">
                                <img src="/img/special/group/drcilabo/photo4.jpg" width="190" height="127" alt="" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lcontents">
                    <h3 class="h3_title">{$locale.drcilabo_h3_title_3}</h3>
                    <div class="container">
                        <div class="productlistwrap clearfix">
                            <div class="product_photo">
                                <img src="/img/special/group/drcilabo/product1.jpg" width="171" height="134" alt="" />
                            </div>
                            <div class="product_text">
                                <div class="icon">
                                <img src="/img/special/group/drcilabo/icon_day.jpg" width="47" height="58" alt="day" /><img src="/img/special/group/drcilabo/icon_and.gif" width="18" height="58" alt="&amp;" /><img src="/img/special/group/drcilabo/icon_night.jpg" width="47" height="58" alt="night" />
                                </div>
                                <h5>{$locale.drcilabo_product_1}</h5>
                                {$locale.drcilabo_product_1_text}
                                <ul class="list">
                                <li>{$locale.drcilabo_product_1_subtext}</li>
                                </ul>
                            </div>
                        </div>

                        <div class="productlistwrap clearfix">
                            <div class="product_photo">
                                <img src="/img/special/group/drcilabo/product2.jpg" width="200" height="134" alt="" />
                            </div>
                            <div class="product_text">
                                <div class="icon">
                                <img src="/img/special/group/drcilabo/icon_day.jpg" width="47" height="58" alt="day" />
                                </div>
                                <h5>{$locale.drcilabo_product_2}</h5>
                                {$locale.drcilabo_product_2_text}
                                <ul class="list">
                                <li>{$locale.drcilabo_product_2_subtext}</li>
                                </ul>
                            </div>
                        </div>

                        <div class="productlistwrap_last clearfix">
                            <div class="product_photo">
                                <img src="/img/special/group/drcilabo/product3.jpg" width="250" height="144" alt="" />
                            </div>
                            <div class="product_text">
                                <div class="icon">
                                <img src="/img/special/group/drcilabo/icon_day.jpg" width="47" height="58" alt="day" /><img src="/img/special/group/drcilabo/icon_and.gif" width="18" height="58" alt="&amp;" /><img src="/img/special/group/drcilabo/icon_night.jpg" width="47" height="58" alt="night" />
                                </div>
                                <h5>{$locale.drcilabo_product_3}</h5>
                                {$locale.drcilabo_product_3_text}
                                <ul class="list">
                                <li>{$locale.drcilabo_product_3_subtext}</li>
                                </ul>
                            </div>
                        </div>
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