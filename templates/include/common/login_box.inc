{include file="include/common/news_box.inc"}
{if $login_uid}
          <div id="login_box_set">
            <div id="login_box_inner">
                <p id="title">{$locale.login_box_title}</p>
                <p id="text_area">
                    {$locale.login_box_text_area_login_1}<br />
                    {$locale.login_box_text_area_login_2}<br />{$login_validate_time|make_date}{$locale.login_box_text_area_login_3}
                </p>
                <form action="{$smarty.const.KUJAPANURLSSL}{$smarty.server.REQUEST_URI}" method="post">
                    <p class="mt_15">
                    <input type="hidden" name="csrf_ticket" value="{$csrf_ticket}" />
                    <input type="hidden" name="auth" value="logout" />
                    <input type="image" src="/locale/{$smarty.const.LOCALE}/img/button/logout_bt.gif"  class="btn" value="submit" />
                    </p>
                </form>
            </div>
          </div>
          <div>
            <img alt="" height="5" src="/img/part/login_box_foot.gif" width="225" />
          </div>
{else}
          <div id="login_box">
            <div id="login_box_inner">
                <p id="title">{$locale.login_box_title}</p>
                <p id="text_area">
                {$locale.login_box_text_area|nl2br}
                </p>
                <form action="{$smarty.const.KUJAPANURLSSL}{$smarty.server.REQUEST_URI}" method="post">
                    {$error.all|error_message:''}
                    
                    <p>
                        {$error.account|error_message:''}
                        {$locale.login_account|error_bold:$error.account}
                        <input class="text_input" type="text" id="account" name="account" value="{if $smarty.post.account}{$smarty.post.account|escape}{/if}" />
                    </p>
                    
                    <p class="mt_15">
                        {$error.password|error_message:''}
                        {$locale.login_password|error_bold:$error.password}
                        <input type="password" name="password" class="text_input" value="" />
                    </p>
                    <p class="mt_15">
                        <input type="hidden" name="csrf_ticket" value="{$csrf_ticket}" />
                        <input type="hidden" name="auth" value="login" />
                        <input type="image" src="/locale/{$smarty.const.LOCALE}/img/button/login_bt.gif"  class="btn" value="submit" />
                    </p>
                </form>
            </div>
          </div>
          <div>
            <img alt="" height="5" src="/img/part/login_box_foot.gif" width="225" />
          </div>
{/if}
