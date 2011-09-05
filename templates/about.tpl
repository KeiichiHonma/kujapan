<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="{$locale.lang}" xml:lang="{$locale.lang}" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
{*seo*}
{include file="include/header/seo.inc"}
    <link href="/css/0-import.css" rel="stylesheet" type="text/css" />
    <link href="/locale/{$smarty.const.LOCALE}/css/background.css" rel="stylesheet" type="text/css" />
    <meta content="text/javascript" http-equiv="Content-Script-Type" />
    <script src="/js/smartRollover.js" type="text/javascript"></script>
  </head>
  <body>
    <div id="wrapper">
      <div id="container">
{*ロゴ、グローバルナビ*}
{include file="include/header/header.inc"}
{*ポジション*}
{include file="include/common/position.inc"}
        <div id="s_sub">
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
          <h2>
            <img alt="{$locale.main_copy}" height="105" src="/locale/{$smarty.const.LOCALE}/img/about/about_title.jpg" width="725" />
          </h2>
          <div class="box_g">
            <div>
              <img alt="" height="15" src="/img/part/box_g_head.gif" width="725" />
            </div>
            <div class="box_g_inner">
              <dl>
                <dt class="about01">
                  <img alt="" height="109" src="/img/about/about_img01.jpg" width="163" />
                </dt>
                <dd class="about01">
                  <span class="title">{$locale.about01_title}</span>
                  {$locale.about01_text}
                </dd>
              </dl>
              <div class="clear line">
                <img alt="" height="2" src="/img/part/line.gif" width="705" />
              </div>
              <dl>
                <dt class="about02">
                  <img alt="" height="107" src="/img/about/about_img02.jpg" width="163" />
                </dt>
                <dd class="about02">
                  <span class="title">{$locale.about02_title}</span>
                  {$locale.about02_text}
                </dd>
              </dl>
              <div class="clear line">
                <img alt="" height="2" src="/img/part/line.gif" width="705" />
              </div>
              <dl>
                <dt class="about03">
                  <img alt="" height="107" src="/img/about/about_img03.jpg" width="163" />
                </dt>
                <dd class="about03">
                  <span class="title">{$locale.about03_title}</span>
                  {$locale.about03_text}
                </dd>
              </dl>
            </div>
            <div class="clear">
              <img alt="" height="5" src="/img/part/box_g_foot.gif" width="725" />
            </div>
          </div>
          <div class="shopping_list_box">
            <div class="shopping_title">{$locale.shopping_title}</div>
            <div class="shopping_list_box_inner">
              <table summary="{$locale.shopping_title}">
                <tr>
                  <th>{$locale.shopping1}</th>
                  <td class="list1">2000元</td>
                  <td class="list2">→</td>
                  <td class="list3">1800元</td>
                  <td class="list4">{$locale.coupon}200元</td>
                  <td class="list5">（打9折）</td>
                </tr>
                <tr>
                  <th>{$locale.shopping2}</th>
                  <td class="list1">200元</td>
                  <td class="list2">→</td>
                  <td class="list3">180元</td>
                  <td class="list4">{$locale.coupon}20元</td>
                  <td class="list5">（打9折）</td>
                </tr>
                <tr>
                  <th>{$locale.shopping3}</th>
                  <td class="list1">1000元</td>
                  <td class="list2">→</td>
                  <td class="list3">850元</td>
                  <td class="list4">{$locale.coupon}150元</td>
                  <td class="list5">（打85折）</td>
                </tr>
                <tr>
                  <th>{$locale.shopping4}</th>
                  <td class="list1">4000元</td>
                  <td class="list2">→</td>
                  <td class="list3">3600元</td>
                  <td class="list4">{$locale.coupon}400元</td>
                  <td class="list5">（打9折）</td>
                </tr>
                <tr>
                  <th>{$locale.shopping5}</th>
                  <td class="list1">2200元</td>
                  <td class="list2">→</td>
                  <td class="list3">2046元</td>
                  <td class="list4">{$locale.coupon}154元</td>
                  <td class="list5">（打93折）</td>
                </tr>
                <tr>
                  <th>{$locale.shopping6}</th>
                  <td class="list1">2700元</td>
                  <td class="list2">→</td>
                  <td class="list3">2430元</td>
                  <td class="list4">{$locale.coupon}270元</td>
                  <td class="list5">（打9折）</td>
                </tr>
                <tr>
                  <td class="list6" colspan="6">{$locale.coupon}{$locale.total}1194元</td>
                </tr>
              </table>
            </div>
            <div>
              <img alt="" height="10" src="/img/part/list_box_foot.gif" width="725" />
            </div>
          </div>
          <div id="sponsor_box">
            <div>
              <img alt="{$locale.sponsor_title}" height="29" src="/locale/{$smarty.const.LOCALE}/img/part/sponsor_title.gif" width="725" />
            </div>
            <div id="sponsor_box_inner">
              <div id="sponsor_box2">
                <div>
                  <img alt="" height="5" src="/img/part/box_w_s_head_02.gif" width="705" />
                </div>
                <div id="sponsor_box2_inner">
            {foreach from=$logos key="key" item="value" name="logos"}
            {if is_int($value)}
            <img alt="" border="0" src="/img/logo/{$value}s.gif" width="72" height="40" />
            {else}
            <img alt="" border="0" src="/img/static_logo/{$value}s.gif" width="72" height="40" />
            {/if}
            {/foreach}
                </div>
                <div>
                  <img alt="" height="5" src="/img/part/box_w_s_foot_02.gif" width="705" />
                </div>
              </div>
            </div>
            <div>
              <img alt="" height="10" src="/img/part/box_g_foot_02.gif" width="725" />
            </div>
          </div>
          <!-- /sponsor_box -->
        </div>
{*フッター*}
{include file="include/header/footer.inc"}
      </div>
    </div>
  </body>
</html>