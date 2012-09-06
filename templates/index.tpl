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
    <script src="/js/alphafilter.js" type="text/javascript"></script>
    
    <link href="/css/index.css" rel="stylesheet" type="text/css" />
    
  </head>
  <body>
  <div id="wrapper">
    <div id="container">
        {*ロゴ、グローバルナビ*}
        {include file="include/header/header.inc"}
        
        {foreach from=$shop key="key" item="value" name="shop"}
        <div id="coupon">
            <div class="deal-list-2 heightfix clearfix">
                <a href="{$smarty.const.KUJAPANURL}/shop/sid/{$value.shop_id}">
                <div class="item" style="height: 405px;">
                        <p class="price clearfix">
                            <strong>{$value.col_c_price}元</strong>
                        </p>

                        <table class="price-info">
                            <tr>
                                <th>通常价格</th><td>{$value.col_c_usual_price}元</span></td>
                            </tr>
                            <tr>
                                <th>优惠率</th><td>{$value.col_c_discount_rate}折</span></td>
                            </tr>
                            <tr>
                                <th>优惠额</th><td>{$value.col_c_discount_value}元</span></td>
                            </tr>
                        </table>

                    <div class="img">
                        <span class="ribbon-timesale-s"></span>
                        <img src="{$value.col_face|getFilePath:$value.col_extension}" width="{$value.col_width}" height="{$value.col_height}" alt="{$value.col_alt}" />
                    </div>
                    
                    <div class="text clearfix">
                        <div class="text-r" style="line-height:16px;height:48pt;margin-bottom:2px;">
                            <b>{$value.col_name}</b><span class="text-link">{$value.col_c_detail}</span>
                        </div>
                    </div>
                </div></a>
            </div>
        </div>
        {/foreach}
        
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