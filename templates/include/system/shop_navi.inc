{include file="include/system/navi.inc"}
{*店舗のみ+管理者*}
{if $login_type == $smarty.const.TYPE_M_SHOP || $login_type == $smarty.const.TYPE_M_ADMIN}
<div id="subnavi">
<ul>
    <li class="{if $snavi == "shop"}on{else}off{/if}"><a href="{$smarty.const.KUJAPANURLSSL}/system/shop">店舗トップ</a></li>
    <li class="{if $snavi == "shop_login"}on{else}off{/if}"><a href="{$smarty.const.KUJAPANURLSSL}/system/shop/login/">ログイン情報</a></li>
    <li class="{if $snavi == "shop_base"}on{else}off{/if}"><a href="{$smarty.const.KUJAPANURLSSL}/system/shop/base/">基本情報</a></li>
    <li class="{if $snavi == "shop_group"}on{else}off{/if}"><a href="{$smarty.const.KUJAPANURLSSL}/system/shop/group/">グループ</a></li>
    <li class="{if $snavi == "shop_gallery"}on{else}off{/if}"><a href="{$smarty.const.KUJAPANURLSSL}/system/shop/gallery/">ギャラリー</a></li>
    <li class="{if $snavi == "shop_product"}on{else}off{/if}"><a href="{$smarty.const.KUJAPANURLSSL}/system/shop/product/">商品</a></li>
    <li class="{if $snavi == "shop_coupon"}on{else}off{/if}"><a href="{$smarty.const.KUJAPANURLSSL}/system/shop/coupon/">クーポン</a></li>
    <li class="{if $snavi == "shop_map"}on{else}off{/if}"><a href="{$smarty.const.KUJAPANURLSSL}/system/shop/map/">地図</a></li>
</ul>
</div>
<br class="clear"/>
{/if}
    <br class="clear"/>
