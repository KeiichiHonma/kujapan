{include file="include/system/navi.inc"}
{*店舗のみ+管理者*}
{if $login_type == $smarty.const.TYPE_M_SHOP || $login_type == $smarty.const.TYPE_M_ADMIN}
<div id="subnavi">
<ul>
    <li class="{if $snavi == "shop"}on{else}off{/if}"><a href="{$smarty.const.KUJAPANURLSSL}/system/shop/view/sid/{$sid}">店舗有効化</a></li>
    <li class="{if $snavi == "shop_base"}on{else}off{/if}"><a href="{$smarty.const.KUJAPANURLSSL}/system/shop/base/index/sid/{$sid}">店舗情報</a></li>
    <li class="{if $snavi == "shop_gallery"}on{else}off{/if}"><a href="{$smarty.const.KUJAPANURLSSL}/system/shop/gallery/index/sid/{$sid}">ギャラリー</a></li>
</ul>
</div>
<br class="clear"/>
{/if}
    <br class="clear"/>
