{if $sp_manager}
<div id="sp">
{if isset($sp_manager.before)}
    <p class="page_txt"><a href="{$sp_manager.before.url}">{$locale.sp_before}</a></p>
{else}
    <p class="page_txt"><span class="unlink">{$locale.sp_before}</span></p>
{/if}
    <div class="numbering">
{foreach from=$sp_manager.list key="number" item="array" name="sp_list"}
{if $array.isCurrent}
    <p class="here">{$number}</p>
{else}
    <a href="{$array.url}">{$number}</a>
{/if}
{/foreach}
    </div>
{if isset($sp_manager.next)}
    <p class="page_txt"><a href="{$sp_manager.next.url}">{$locale.sp_next}</a></p>
{else}
    <p class="page_txt"><span class="unlink">{$locale.sp_next}</span></p>
{/if}
</div>
{/if}
