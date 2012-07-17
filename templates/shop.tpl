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

{literal}
    <script src="http://www.google.com/jsapi"></script>
    <script>
    google.load("jquery", "1.4");
    </script>

    <script type="text/javascript" src="/js/jquery.tools.min.js"></script>
    <script type="text/javascript" src="/js/common.js"></script>

    <script type="text/javascript" src="/js/highslide/highslide.js"></script>
    <link rel="stylesheet" type="text/css" href="/js/highslide/highslide.css" />
    <script type="text/javascript">    
        hs.graphicsDir = '/js/highslide/graphics/';
        hs.outlineType = 'rounded-white';
    </script>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=en"></script>

<script>
var my_google_map;
var my_google_geo;

function googlemap_init( id_name, addr_name ) {
    var latlng = new google.maps.LatLng(41, 133);
    var opts = {
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        center: latlng
    };
    my_google_map = new google.maps.Map(document.getElementById(id_name), opts);

    my_google_geo = new google.maps.Geocoder();
    var req = {
        address: addr_name ,
    };
    my_google_geo.geocode(req, geoResultCallback);
}


function geoResultCallback(result, status) {
    if (status != google.maps.GeocoderStatus.OK) {
        alert(status);
    return;
    }
    var latlng = result[0].geometry.location;
    my_google_map.setCenter(latlng);
    var marker = new google.maps.Marker({position:latlng, map:my_google_map, title:latlng.toString(), draggable:true});
    google.maps.event.addListener(marker, 'dragend', function(event){
        marker.setTitle(event.latLng.toString());
    });
}
</script>
{/literal}

<script>
$(document).ready(function(){ldelim}
    googlemap_init('canvas', "{$shop.0.col_map}");
{rdelim});
</script>

    <link href="/css/shop.css" rel="stylesheet" type="text/css" />
    
  </head>
  <body>
  <div id="wrapper">
    <div id="container">
        {*ロゴ、グローバルナビ*}
        {include file="include/header/header.inc"}
        <div>
            <div class="detail_box">
                {*<img alt="" src="/img/shop/detail_box_head.gif" width="655" height="80" />*}
                <h2 class="shop_title">{$shop.0.col_name}<br /><span>{$shop.0.col_c_title}</span></h2>
                <div class="detail_box_inner">
                        <div class="shop-view heightfix clearfix">
                            <div class="item" style="height: 270px;">
                                    <p class="price clearfix">
                                        <strong>{$shop.0.col_c_price}元</strong>
                                    </p>

                                    <table class="price-info">
                                        <tr>
                                            <th>通常価格</th><td>{$shop.0.col_c_usual_price}元</span></td>
                                        </tr>
                                        <tr>
                                            <th>割引率</th><td>{$shop.0.col_c_discount_rate}折</span></td>
                                        </tr>
                                        <tr>
                                            <th>割引額</th><td>{$shop.0.col_c_discount_value}元</span></td>
                                        </tr>
                                    </table>
                                    
                                    <div class="shopping_bt">
                                        <a href="/mail/input/sid/{$shop.0.shop_id}" title="购买 优惠券任您选" target="_blank">购买 优惠券任您选</a>
                                    </div>

                            </div>
                            
                            <div id="shop_right">
                                <div id="articleGalleryArea">
                                    <ul id="GalleryLargePh" >
                                        <li><div class="slide-box"><img src="{$shop.0.col_face|getFilePath:$shop.0.col_extension}" {$shop.0.col_width|getWidthHeight:$shop.0.col_height:480:320:0} alt="{$shop.0.col_alt}" /></div></li>
                                    {if $slide_item}
                                        {foreach from=$slide_item key="key" item="value" name="slide_item"}
                                            <li><div class="slide-box"><img src="{$value.file_id|getFilePath:$value.col_extension}" {$value.col_width|getWidthHeight:$value.col_height:480:320:0} alt="{$value.col_alt}" /></div></li>
                                        {/foreach}
                                    {/if}

                                    </ul>
                                    <div id="GalleryThumbsPh">
                                        <div>
                                            <ul class="items">
                                                <li><img src="{$shop.0.col_face|getFilePath:$shop.0.col_extension}" width="72" height="68" alt="{$shop.0.col_alt}" /></li>
                                            {if $slide_item}
                                                {foreach from=$slide_item key="key" item="value" name="slide_item2"}
                                                    <li><img src="{$value.file_id|getFilePath:$value.col_extension}" width="72" height="68" alt="{$value.col_alt}" /></li>
                                                {/foreach}
                                            {/if}
                                            </ul>
                                        </div>
                    
                                        <p class="prevPage"><img src="/img/common/arrow_l.gif" width="10" height="70" alt="前へ" /></p>
                                        <p class="nextPage"><img src="/img/common/arrow_r.gif" width="10" height="70" alt="次へ" /></p>
                                    </div>
                                </div>

                                <h3 class="title">【优惠券简介】</h3>
                                <div class="ml_10 mb_10">
                                    {$shop.0.col_c_detail|nl2br}
                                </div>

                                <h3 class="title">【利用条件】</h3>
                                <div class="ml_10 mb_10">
                                    {$shop.0.col_c_condition|nl2br}
                                </div>
                            </div>
                        </div>
                        <div class="shopping_wide_bt">
                            <a href="/mail/input/sid/{$shop.0.shop_id}" title="购买 优惠券任您选" target="_blank">购买 优惠券任您选</a>
                        </div>
                    <p><img alt="" height="5" src="/img/shop/detail_box_foot.gif" width="655" /></p>
                </div>
                
            <div class="detail_box_2">
                <img alt="" src="/img/shop/detail_box_head_2.jpg" width="655" height="6" />
                <div class="detail_box_inner">
                    <h3 class="title">店铺介绍</h3>
                    <div class="ml_10 mb_10">
                        {$shop.0.col_detail|nl2br}
                    </div>
                    
                    <h3 class="title">店铺地图</h3>
                    <div class="ml_10 mb_10">
                        <div id="canvas">googlemap</div>
                    </div>
                    <div class="shop_info">
                    <img alt="" height="5" src="/img/shop/shop_info_head.gif" width="635" /><div class="shop_info_inner">
                      <dl>
                        <dt>店名</dt>
                        <dd>{$shop.0.col_name}</dd>
                      </dl>
                    </div>
                    <!-- shop_info_inner -->
                    <p class="clear mb_5"><img alt="" height="5" src="/img/shop/shop_info_foot.gif" width="635" /></p>

                    <img alt="" height="5" src="/img/shop/shop_info_head.gif" width="635" /><div class="shop_info_inner">
                      <dl>
                        <dt>地址</dt>
                        <dd>{$shop.0.col_address}</dd>
                      </dl>
                    </div>
                    <p class="clear mb_5"><img alt="" height="5" src="/img/shop/shop_info_foot.gif" width="635" /></p>

                    <img alt="" height="5" src="/img/shop/shop_info_head.gif" width="635" /><div class="shop_info_inner">
                      <dl>
                        <dt>营业时间</dt>
                        <dd>{$shop.0.col_open_hour}</dd>
                      </dl>
                    </div>
                    <p class="clear mb_5"><img alt="" height="5" src="/img/shop/shop_info_foot.gif" width="635" /></p>

                    <img alt="" height="5" src="/img/shop/shop_info_head.gif" width="635" /><div class="shop_info_inner">
                      <dl>
                        <dt>定休日</dt>
                        <dd>{$shop.0.col_holiday}</dd>
                      </dl>
                    </div>
                    <p class="clear mb_5"><img alt="" height="5" src="/img/shop/shop_info_foot.gif" width="635" /></p>

                    <img alt="" height="5" src="/img/shop/shop_info_head.gif" width="635" /><div class="shop_info_inner">
                      <dl>
                        <dt>ホームページ</dt>
                        <dd>{$shop.0.col_url}</dd>
                      </dl>
                    </div>
                    <p class="clear mb_5"><img alt="" height="5" src="/img/shop/shop_info_foot.gif" width="635" /></p>

                    <img alt="" height="5" src="/img/shop/shop_info_head.gif" width="635" /><div class="shop_info_inner">
                      <dl>
                        <dt>備考</dt>
                        <dd>{$shop.0.col_remarks}</dd>
                      </dl>
                    </div>
                    <p><img alt="" height="5" src="/img/shop/shop_info_foot.gif" width="635" /></p>

                    </div>
                    <!-- /shop_info -->












                    <p><img alt="" height="5" src="/img/shop/detail_box_foot.gif" width="655" /></p>
                </div>
            </div>
            
            </div>

            

        </div>
        <div id="weibo">
            {*weibo*}
            {include file="include/common/weibo.inc"}
        </div>
        
        {*フッター*}
        {include file="include/header/footer.inc"}
    </div>
  </div>
</body>
</html>