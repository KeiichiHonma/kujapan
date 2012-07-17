<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="{$locale.lang}" xml:lang="{$locale.lang}" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
{*seo*}
{include file="include/header/seo.inc"}
    <link href="/css/0-import.css" rel="stylesheet" type="text/css" />
    <link href="/css/shop.css" rel="stylesheet" type="text/css" />
    <link href="/locale/{$smarty.const.LOCALE}/css/background.css" rel="stylesheet" type="text/css" />
    <meta content="text/javascript" http-equiv="Content-Script-Type" />
    <script src="/js/smartRollover.js" type="text/javascript"></script>
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
          <div class="detail_header">
                <img alt="" src="/img/logo/{$shop.0.shop_id}m.gif" width="165" height="65" /><h2 class="detail">{$shop.0.shop_name}</h2>
          </div>
          
            {*クーポン情報*}
            {foreach from=$coupon key="key" item="value" name="coupon"}
              <div class="detail_box9">
                <div class="detail_box9_inner">
                    <div class="coupon">
                        <div class="first">
                            <span class="price1">{$locale.coupon}</span>
                            <span class="price2">{$value.coupon_discount}</span>
                        </div>
                        <div class="second">
                        {$value.coupon_title}
                        </div>
                        <div class="third">
                        <p class="{$value.col_validate_time|check_coupon_validate_time}">{$locale.coupon_validate_time}&nbsp;{$value.col_validate_time|make_date}</p>
                        {$value.coupon_condition|nl2br}
                        </div>
                    </div>
                </div>
                <!-- /detail_box9_inner -->
                <p><img alt="" height="5" src="/img/coupon/detail_box1_foot.gif" width="725" /></p>
              </div>
            {/foreach}
          <div class="detail_box10">
            <img alt="" height="5" src="/img/part/detail_box2_head.gif" width="725" /><div class="detail_box10_inner">
                {*ボタンボックス*}
                {include file="include/coupon/buy_print_btn.inc"}
                <p><img alt="" height="5" src="/img/part/detail_box2_foot.gif" width="725" /></p>
            </div>
          </div>
          <!-- /detail_box10 -->

          <div class="detail_box11">
            <img alt="" height="6" src="/img/part/detail_box3_head.gif" width="725" /><div class="detail_box11_inner">
              <div class="detail_box5 clear">
                <img alt="" height="5" src="/img/part/detail_box5_head.gif" width="705" /><div class="detail_box5_inner">


                        <h3>{$locale.shop_detail}</h3>
                        <div class="symmetry symmetry_photo clearfix">
                            <div class="item1">
                                <p class="photo">
                                    {*外観大*}
                                    {if $shop_item_visual}
                                    <img src="{$shop_item_visual.file_id|getFilePath:$shop_item_visual.col_extension}" width="{$shop_item_visual.col_width}" height="{$shop_item_visual.col_height}" alt="{$shop_item_visual.col_alt}" />
                                    {/if}
                                </p>
                            </div>
                            
                            
                            <div class="last_shop_info">
                                <div class="iconset02">
                                    <ul>
                                        <li><img alt="{$area.$aid.col_name}" height="38" src="/locale/{$smarty.const.LOCALE}/img/coupon/area0{$aid}.gif" width="58" /></li>
                                        <li><img alt="{$genre.$gid.col_name}" height="38" src="/locale/{$smarty.const.LOCALE}/img/coupon/genre0{$gid}.gif" width="58" /></li>
                                        <li>
                                    </ul>

                                    <ul>
                                        {*特徴*}
                                        {$shop.0.col_setting|unserialize_feature}
                                    </ul>
                                </div>
                                {$shop.0.shop_detail|nl2br}
                            </div>
                        </div>

                {*ギャラリー*}
                {assign var=type_gallery value=$smarty.const.SHOP_TYPE_GALLERY}
                {if $shop_item_gallery_photo && $shop_item_gallery_text}
                    <h3>{$locale.shop_introduction}</h3>
                    {section name="shop_item_gallery_text" loop=$shop_item_gallery_text}
                        {assign var=loop_no value=$smarty.section.shop_item_gallery_text.index}
                        {*写真*}
                        <div class="symmetry symmetry_photo clearfix">
                            {foreach from=$shop_item_gallery_photo.$loop_no key="key" item="value" name="shop_item_gallery_photo"}
                            <div class="{cycle values="item1,last1"}">
                                <p class="photo"><img src="{$value.file_id|getFilePath:$value.col_extension}" width="{$value.col_width}" height="{$value.col_height}" alt="{$value.col_alt}" /></p>
                            </div>
                            {/foreach}
                        </div>

                        {*テキスト*}
                        <div class="symmetry {if count($shop_item_gallery_text.$loop_no) == 2}symmetry_double{else}symmetry_single{/if} clearfix">
                            {foreach from=$shop_item_gallery_text.$loop_no key="key2" item="value2" name="shop_item_gallery_text2"}
                            
                                <div class="{cycle values="item2,last2"}">
                                    <p class="text">{$value2.shop_item_detail|nl2br}</p>
                                </div>
                            {/foreach}
                        </div>
                    {/section}
                {/if}
                {*商品*}
                {if $shop_item_product_photo && $shop_item_product_text}
                    <h3 class="clear mt_10">{$locale.shop_product}</h3>
                    {section name="shop_item_product_text" loop=$shop_item_product_text}
                        {assign var=loop_no value=$smarty.section.shop_item_product_text.index}
                        {*写真*}
                        <div class="symmetry symmetry_photo clearfix">
                            {foreach from=$shop_item_product_photo.$loop_no key="key" item="value" name="shop_item_product_photo"}
                            <div class="{cycle values="item1,last1"}">
                                <p class="photo"><img src="{$value.file_id|getFilePath:$value.col_extension}" width="{$value.col_width}" height="{$value.col_height}" alt="{$value.col_alt}" /></p>
                            </div>
                            {/foreach}
                        </div>

                        {*テキスト*}
                        <div class="symmetry {if count($shop_item_product_text.$loop_no) == 2}symmetry_double{else}symmetry_single{/if} clearfix">
                            {foreach from=$shop_item_product_text.$loop_no key="key2" item="value2" name="shop_item_product_text2"}
                            
                                <div class="{cycle values="item2,last2"}">
                                    <p class="text">{$value2.shop_item_detail|nl2br}</p>
                                </div>
                            {/foreach}
                        </div>
                    {/section}
                {/if}
                {if $shop_item.$type_gallery || $shop_item.$type_product}
                  <div class="detail_box6 clear">
                    <img alt="" height="5" src="/img/part/detail_box6_head.gif" width="685" /><div class="detail_box6_inner">
                        {*ボタンボックス*}
                        {include file="include/coupon/buy_print_btn.inc"}
                    </div>
                    <!-- /detail_box6_inner -->
                    <p><img alt="" height="5" src="/img/part/detail_box6_foot.gif" width="685" /></p>
                  </div>
                {/if}
                  <!-- /detail_box6 clear -->
                  <h3>{$locale.shop_map}</h3>
                  <div class="ml_10 mb_10">
                    {*地図*}
                    {if $shop_item_map}
                    <img src="{$shop_item_map.file_id|getFilePath:$shop_item_map.col_extension}" width="{$shop_item_map.col_width}" height="{$shop_item_map.col_height}" alt="{$shop_item_map.col_alt}" />
                    {/if}
                  </div>
                  <div class="detail_box7">
                    <img alt="" height="5" src="/img/part/detail_box7_head.gif" width="685" /><div class="detail_box7_inner">
                      <dl>
                        <dt>{$locale.shop_address}</dt>
                        <dd>{$shop.0.shop_address}</dd>
                      </dl>
                    </div>
                    <!-- detail_box7_inner -->
                    <p class="clear mb_5"><img alt="" height="5" src="/img/part/detail_box7_foot.gif" width="685" /></p>
                    
                    <img alt="" height="5" src="/img/part/detail_box7_head.gif" width="685" /><div class="detail_box7_inner">
                      <dl>
                        <dt>{$locale.shop_open_hour}</dt>
                        <dd>{$shop.0.shop_open_hour}</dd>
                      </dl>
                    </div>
                    <!-- /detail_box7_inner -->
                    <p class="clear mb_5"><img alt="" height="5" src="/img/part/detail_box7_foot.gif" width="685" /></p>
                    
                    <img alt="" height="5" src="/img/part/detail_box7_head.gif" width="685" /><div class="detail_box7_inner">
                      <dl>
                        <dt>{$locale.shop_holiday}</dt>
                        <dd>{$shop.0.shop_holiday}</dd>
                      </dl>
                    </div>
                    <p><img alt="" height="5" src="/img/part/detail_box7_foot.gif" width="685" /></p>
                  </div>
                  <!-- /detail_box7 -->
                </div>
                <!-- /detail_box5_inner -->
                <p><img alt="" height="5" src="/img/part/detail_box5_foot.gif" width="705" /></p>
              </div>
              <!-- /detail_box5 clear -->
            </div>
            <!-- /detail_box11_inner -->
            <p><img alt="" height="5" src="/img/part/detail_box3_foot.gif" width="725" /></p>
          </div>
          <!-- /detail_box11 -->
          <div class="detail_box8">
            <div class="detail_box8_inner">
                <table class="text_confirm">
                <tbody>
                <tr><td class="indent"><img src="/img/common/indent.gif" width="16" height="17"></td><td>{$locale.alert1}</td></tr>
                <tr><td class="indent"><img src="/img/common/indent.gif" width="16" height="17"></td><td>{$locale.alert2}</td></tr>
                <tr><td class="indent"><img src="/img/common/indent.gif" width="16" height="17"></td><td>{$locale.alert3}</td></tr>
                <tr><td class="indent"><img src="/img/common/indent.gif" width="16" height="17"></td><td>{$locale.alert4}</td></tr>
                <tr><td class="indent"><img src="/img/common/indent.gif" width="16" height="17"></td><td>{$locale.alert5}</td></tr>
                <tr><td class="indent"><img src="/img/common/indent.gif" width="16" height="17"></td><td>{$locale.alert6}</td></tr>
                </tbody>
                </table>
            </div>
            <img alt="{$locale.alert_title}" src="/locale/{$smarty.const.LOCALE}/img/coupon/confirm.jpg" height="200" width="725">
          </div>
        </div>
        <!-- /s_main -->
{*フッター*}
{include file="include/header/footer.inc"}
      </div>
    </div>
  </body>
</html>