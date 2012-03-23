      <div id="header">
        <div id="header_line">
            <h1>{$locale.h1}</h1>
            <p class="fr">
            {if $debug}<a href="http://{$smarty.const.SERVER_NAME_JA}/">日本語</a> | <a href="http://{$smarty.const.SERVER_NAME_CN}/">簡体字</a> | <a href="http://{$smarty.const.SERVER_NAME_TW}/">繁体字</a>{/if}
            
            {if $smarty.const.LOCALE == "tw"}
            <img alt="" src="/img/common/email.gif" width="16" height="16" /><a href="{$smarty.const.KUJAPANURL}/contact">{$locale.contact}</a>
            {else}
            <img alt="" src="/img/common/telephone.gif" width="16" height="16" /><a href="{$smarty.const.KUJAPANURL}/contact">热线电话：400-016-1716(周一至周五09:00-17:30 )</a>
            {/if}
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
              <img alt="{$locale.main_copy}" height="73" src="/locale/{$smarty.const.LOCALE}/img/visual/main_copy.gif" width="445" />
            </li>
            {/if}
            
            {if !$buy_btn_display}
            
            {elseif !$login_uid}

            {else}
            <li id="shopping_bt">
                <img alt="" src="/locale/{$smarty.const.LOCALE}/img/button/top_buy_bt_done.gif" width="216" height="55" />
            </li>
            {/if}
          </ul><span class="clear"></span>
            <ul id="Navi">
                <li id="Navi_left"><a href="{$smarty.const.KUJAPANURL}/">{$locale.g_navi01}</a>&nbsp;|&nbsp;</li>
                <li><a href="{$smarty.const.KUJAPANURL}/about"{if !$debug} target="_blank"{/if}>{$locale.g_navi02}</a></li>
            {foreach from=$area key="aid" item="value" name="area"}
                {if $smarty.foreach.area.last}<li id="Navi_right">{else}<li>{/if}&nbsp;|&nbsp;<a href="{$smarty.const.KUJAPANURL}/area/aid/{$aid}"{if !$debug} target="_blank"{/if}>{$value.col_name}</a></li>
            {/foreach}
            </ul>
        </div>
      </div>
      <!-- /header -->