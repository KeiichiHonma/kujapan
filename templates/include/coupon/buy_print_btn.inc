              <ul>
                <li class="left">
                    {if $login_uid}
                    <img class="detail_buy" alt="" src="/locale/{$smarty.const.LOCALE}/img/button/detail_buy_bt_done.gif" width="211" height="53" />
                    {else}

                    {/if}
                </li>
                <li>
                    {if $login_uid}
                    <a class="detail_print" href="{$smarty.const.KUJAPANURL}/print/sid/{$value.col_sid}" target="_blank">{$locale.print_bt}</a>
                    {$locale.print_bt_text}
                    {else}
                    <img class="detail_buy" alt="" src="/locale/{$smarty.const.LOCALE}/img/button/detail_print_bt_stop.gif" width="211" height="53" />
                    {/if}
                </li>
              </ul>