{if $news}
    <div class="news_box">
        <div>
          <img alt="{$locale.news_title}" height="38" src="/locale/{$smarty.const.LOCALE}/img/part/news_title.gif" width="225" />
        </div>
        <div class="news_box_inner">
          <div class="ml_10">
            <img alt="" height="5" src="/img/part/news_box2_head.gif" width="205" />
          </div>
          <div class="news_box2">
            <ul>
                {foreach from=$news key="key" item="value" name="news"}
                    <li>
                    {$value.col_from|make_news_judge_new}{$value.col_date|make_date}<br />
                    {if strcasecmp($value.col_link,1) == 0}
                    {$value.col_title}
                    {elseif strlen($value.col_url) > 0}
                    <a href="{$value.col_url}" target="_blank">{$value.col_title}</a>
                    {else}
                    <a href="{$smarty.const.KUJAPANURL}/news/nid/{$value._id}" target="_blank">{$value.col_title}</a>
                    {/if}
                    </li>
                {/foreach}
            </ul>
          </div>
          <div class="ml_10">
            <img alt="" height="5" src="/img/part/news_box2_foot.gif" width="205" />
          </div>
        </div>
        <div>
          <img alt="" height="5" src="/img/part/genre_box3_foot.gif" width="225" />
        </div>
    </div>
{/if}


