{*管理者のみ*}
{if $login_type == $smarty.const.TYPE_M_ADMIN}
<div id="subnavi">
<ul>
    <li class="{if $snavi == "manager"}on{else}off{/if}"><a href="{$smarty.const.KUJAPANURLSSL}/system/manager/">マネージャー</a></li>
    <li class="{if $snavi == "group"}on{else}off{/if}"><a href="{$smarty.const.KUJAPANURLSSL}/system/group/">グループ</a></li>
    <li class="{if $snavi == "shop_all"}on{else}off{/if}"><a href="{$smarty.const.KUJAPANURLSSL}/system/all/shop/">店舗一覧</a></li>
    <li class="{if $snavi == "coupon_all"}on{else}off{/if}"><a href="{$smarty.const.KUJAPANURLSSL}/system/all/coupon">クーポン一覧</a></li>
    <li class="{if $snavi == "gallery_all"}on{else}off{/if}"><a href="{$smarty.const.KUJAPANURLSSL}/system/all/gallery">紹介一覧</a></li>
    <li class="{if $snavi == "product_all"}on{else}off{/if}"><a href="{$smarty.const.KUJAPANURLSSL}/system/all/product">商品一覧</a></li>
    <li class="{if $snavi == "news"}on{else}off{/if}"><a href="{$smarty.const.KUJAPANURLSSL}/system/news/">お知らせ</a></li>
    <li class="{if $snavi == "analyze"}on{else}off{/if}"><a href="{$smarty.const.KUJAPANURLSSL}/system/analyze/">分析</a></li>
</ul>
</div>
    <br class="clear"/>
{/if}

{*管理者のみ*}
{if $login_type >= $smarty.const.TYPE_M_SUPPORT}
<div id="subnavi">
<ul>
    <li class="{if $snavi == "user"}on{else}off{/if}"><a href="{$smarty.const.KUJAPANURLSSL}/system/user/">{if $locale.user_app_name}{$locale.user_app_name}{else}会员{/if}</a></li>
    <li class="{if $snavi == "coupon"}on{else}off{/if}"><a href="{$smarty.const.KUJAPANURLSSL}/system/coupon/">{if $locale.coupon_app_name}{$locale.coupon_app_name}{else}优惠券{/if}</a></li>
</ul>
</div>
    <br class="clear"/>
{/if}