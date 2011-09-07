      <div class="clear" id="footer">
        <p class="footer_link">
          <a href="{$smarty.const.KUJAPANURL}/">{$locale.g_navi01}</a>&nbsp;|&nbsp;<a href="{$smarty.const.KUJAPANURL}/about">{$locale.g_navi02}</a>{if !$login_uid}&nbsp;|&nbsp;<a href="{$smarty.const.KUJAPANURL}/payment/bridge" target="_blank">{$locale.footer_buy_coupon}</a>{/if}&nbsp;|&nbsp;<a href="{$smarty.const.KUJAPANURL}/rule">{$locale.footer_rule}</a>&nbsp;|&nbsp;<a href="{$smarty.const.KUJAPANURL}/site_map">{$locale.footer_sitemap}</a>&nbsp;|&nbsp;<a href="{$smarty.const.KUJAPANURL}/corp">{$locale.footer_corp}</a>&nbsp;|&nbsp;<a href="{$smarty.const.KUJAPANURL}/contact">{$locale.contact}</a>&nbsp;|&nbsp;<span lang="ja"><a href="{$smarty.const.KUJAPANURLSSL}/inquiry/input">掲載をご検討の企業様</a></span>
          <br />
{foreach from=$area key="aid" item="value" name="area"}
    <a href="{$smarty.const.KUJAPANURL}/area/aid/{$aid}">{$value.col_name}</a>&nbsp;|
{/foreach}
{foreach from=$genre key="gid" item="value" name="genre"}
          <a href="{$smarty.const.KUJAPANURL}/genre/gid/{$gid}">{$value.col_name}</a>{if !$smarty.foreach.genre.last}&nbsp;|{else}{/if}
{/foreach}
        </p>
        <p>Copyright (C) 2011 北京九五太维资讯有限公司 All Rights Reserved.<br />京ICP证040867号-2<br />京公网安备110105008660号</p>
      </div>
{include file="include/google/analytics.inc"}

{include file="include/conversion/baidu.inc"}
