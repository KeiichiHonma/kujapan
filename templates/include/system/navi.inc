{*管理者のみ*}
{if $login_type == $smarty.const.TYPE_M_ADMIN}
<div id="subnavi">
<ul>
    <li class="{if $snavi == "shop_all"}on{else}off{/if}"><a href="{$smarty.const.KUJAPANURLSSL}/system/shop/">店舗一覧</a></li>
{*管理者のみ*}
{if $login_type >= $smarty.const.TYPE_M_SUPPORT}
    <li class="{if $snavi == "user"}on{else}off{/if}"><a href="{$smarty.const.KUJAPANURLSSL}/system/user/">{if $locale.user_app_name}{$locale.user_app_name}{else}会员{/if}</a></li>
    <li class="{if $snavi == "coupon"}on{else}off{/if}"><a href="{$smarty.const.KUJAPANURLSSL}/system/coupon/">{if $locale.coupon_app_name}{$locale.coupon_app_name}{else}优惠券{/if}</a></li>
{/if}

</ul>
</div>
    <br class="clear"/>
{/if}
