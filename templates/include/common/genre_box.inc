            <div class="genre_box">
                <div>
                  <img alt="{$locale.genre_title}" height="38" src="/locale/{$smarty.const.LOCALE}/img/part/genre_title.jpg" width="225" />
                </div>
                <div class="genre_box_inner">
                    <div class="ml_10">
                        <img alt="" height="5" src="/img/part/genre_box2_head.gif" width="205" />
                    </div>
                    <div class="genre_box2">
                        {foreach from=$genre key="gid" item="value" name="genre"}
                        <div class="ml_6">
                          <div id="genre_pnl_0{$gid}s">
                            <a href="{$smarty.const.KUJAPANURL}/genre/gid/{$gid}" title="{$value.col_name}"{if !$debug} target="_blank"{/if}>{$value.col_detail}</a>
                          </div>
                        </div>
                        {/foreach}
                    </div>
                    <div class="ml_10">
                    <img alt="" height="5" src="/img/part/genre_box2_foot.gif" width="205" />
                    </div>
                </div>
                <div>
                  <img alt="" height="5" src="/img/part/genre_box3_foot.gif" width="225" />
                </div>
            </div>