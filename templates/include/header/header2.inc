      <div id="header">
        <div id="header_line">
            <h1>{$locale.h1}</h1>
            <p class="fr">

            </p>
        </div>
        <div id="header_inner">
            <ul>
            {if $login_pid > 0}
            <li id="logo_partner">
              <a href="{$smarty.const.KUJAPANURL}/" title="{$locale.site_name}"><img alt="{$locale.logo}" height="73" src="/img/visual/partner/logo_{$login_pid}.gif" width="735" /></a>
            </li>
            {else}
            <li id="logo">
              <a href="{$smarty.const.KUJAPANURL}/" title="{$locale.site_name}"><img alt="{$locale.logo}" height="50" src="/img/visual/logo.gif" width="260" /></a>
            </li>
            <li id="main_copy">
              <img alt="{$locale.main_copy}" src="/locale/{$smarty.const.LOCALE}/img/visual/main_copy.gif" width="550" height="73" />
            </li>
            {/if}
            </ul><span class="clear"></span>
        </div>
      </div>
      <!-- /header -->