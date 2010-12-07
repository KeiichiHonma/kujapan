<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
{include file="include/system/seo.inc"}
{include file="include/system/css.inc"}
{include file="include/system/js.inc"}
</head>
<body>
<div id="wrapper">
    {*サイトポジション*}
    {include file="include/system/position.inc"}
    <div id="page">
        <div id="main_l">
            <div id="roof_l_white">
                <div class="inside_l">
                {include file="include/system/shop_navi.inc"}
                <h2 class="h_title">掲載 or 停止</h2>
                
                {if $isDisplay}
                    <form id="shopStatusForm" name="shopStatusForm" action= "{$smarty.const.KUJAPANURLSSL}/system/shop/validate" method="post" style="display:inline;margin-top:0em; margin-bottom:0em">
                    <div id="form_btn">
                    <input type="hidden" name="csrf_ticket" value="{$csrf_ticket}" />
                    
                    <input type="hidden" name="operation" value="regist" />
                    {if strcasecmp($shop.0.col_validate,$smarty.const.VALIDATE_DENY) == 0}
                        現在掲載されていません<br />
                        <input type="image" src="/img/system/b_keisai.gif" value="submit" class="btn" onClick="return form_submit('shopStatusForm')" />
                        <input type="hidden" name="operation" value="" />
                        <input type="hidden" name="validate" value="{$smarty.const.VALIDATE_ALLOW}" />
                    {else}
                        現在掲載中です<br />
                        <input type="image" src="/img/system/b_teishi.gif" value="submit" class="btn" onClick="return form_submit('shopStatusForm')" />
                        <input type="hidden" name="operation" value="" />
                        <input type="hidden" name="validate" value="{$smarty.const.VALIDATE_DENY}" />
                    {/if}
                    
                    </div>
                    </form>
                {else}
                    {if strcasecmp($shop.0.col_validate,$smarty.const.VALIDATE_ALLOW) == 0}
                    <p class="attention">店舗が掲載されているにも関わらず、必要な情報が登録されておりません。<br />掲載を停止して情報を登録してください。<br />以下の項目が登録されている必要があります。</p>
                    <form id="shopStatusForm" name="shopStatusForm" action= "{$smarty.const.KUJAPANURLSSL}/system/shop/validate" method="post" style="display:inline;margin-top:0em; margin-bottom:0em">
                    <div id="form_btn">
                    <input type="hidden" name="csrf_ticket" value="{$csrf_ticket}" />
                    
                    <input type="hidden" name="operation" value="regist" />
                        現在掲載中です<br />
                        <input type="image" src="/img/system/b_teishi.gif" value="submit" class="btn" onClick="return form_submit('shopStatusForm')" />
                        <input type="hidden" name="operation" value="" />
                        <input type="hidden" name="validate" value="{$smarty.const.VALIDATE_DENY}" />
                    
                    </div>
                    </form>
                    {else}
                    <p class="attention">店舗を掲載する為に必要な情報が登録されておりません。<br />以下の項目が登録されている必要があります。</p>
                    {/if}
                    <div id="infomation">
                    <ul>
                    <li>・店舗名(全言語)</li>
                    <li>・店舗詳細(全言語)</li>
                    <li>・住所(全言語)</li>
                    <li>・営業時間(全言語)</li>
                    <li>・定休日(全言語)</li>
                    <li>・1つ以上の紹介情報</li>
                    <li>・1つ以上の商品情報</li>
                    <li>・1つ以上のクーポン情報</li>
                    <li>・ロゴ(小)画像</li>
                    <li>・ロゴ(中)画像</li>
                    <li>・外観(小)画像</li>
                    <li>・外観(大)画像</li>
                    <li>・地図(全言語)画像</li>
                    </ul>
                    </div>
                {/if}

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
