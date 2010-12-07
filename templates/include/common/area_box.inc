            <div class="genre_box">
            <div>
              <img alt="{$locale.spot_title}" height="38" src="/locale/{$smarty.const.LOCALE}/img/part/spot_title.jpg" width="225" />
            </div>
            <div class="genre_box_inner">
              <div class="ml_10">
                <img alt="" height="5" src="/img/part/genre_box2_head.gif" width="205" />
              </div>
              <div class="genre_box2">
                <ul>
                {foreach from=$area key="aid" item="value" name="area"}
                    {if $smarty.foreach.area.last}<li class="last">{else}<li>{/if}
                        <a href="{$smarty.const.KUJAPANURL}/area/aid/{$aid}" title="{$value.col_name}"{if !$debug} target="_blank"{/if}>
                          <img alt="{$value.col_name}" border="0" height="36" src="/locale/{$smarty.const.LOCALE}/img/button/spot_bt0{$aid}_off.jpg" width="193" />
                        </a>
                    </li>
                {/foreach}
                </ul>
              </div>
              <div class="ml_10">
                <img alt="" height="5" src="/img/part/genre_box2_foot.gif" width="205" />
              </div>
            </div>
            <div>
              <img alt="" height="5" src="/img/part/genre_box3_foot.gif" width="225" />
            </div>
            </div>