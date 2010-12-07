        <div class="clear" id="topicPath">
          <ul>
{foreach from=$position key="key" item="array" name="position"}
<li>{if $smarty.foreach.position.last}<strong>{$array.name}</strong>{else}<a href="{$array.url}">{$array.name}</a> > {/if}</li>
{/foreach}
          </ul>
        </div>
