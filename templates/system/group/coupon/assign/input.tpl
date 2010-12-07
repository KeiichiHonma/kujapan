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
    {include file="include/system/navi.inc"}
{if $error_cid}
表示指定されているのに、グループではないクーポンが検出されました。このまま更新してください。<br />
{foreach from=$error_cid key="key" item="cid" name="error_cid"}
ID:{$cid}<br />
{/foreach}
{/if}

        <h2 class="h_title">クーポン割り当て</h2>
        {literal}
        <script type="text/javascript">
        <!--
        function fnMoveSelect(fm, sel1, sel2) {
            for (i = 0; i < fm[sel1].length; i++) {
                if (fm[sel1].options[i].selected) {
                    fm[sel2].options[fm[sel2].length] = new Option(fm[sel1].options[i].text, fm[sel1].options[i].value);
                    fm[sel1].options[fm[sel1].selectedIndex] = null;
                    i--;
                }
            }
        }

        function fnSelectBoxAll(fm, sel, mode) {
            for (i = 0; i < fm[sel].options.length; i++) {
                if (mode == "select") {
                    fm[sel].options[i].selected = true;
                } else {
                    fm[sel].options[i].selected = false;
                }
            }
        }
        -->
        </script>
        {/literal}
        "Ctrlキー"もしくは"Shiftキー"を押しながらクリックすると、複数選択できます。
        <form id="couponForm" name="couponForm" method="post" action="{$smarty.const.KUJAPANURLSSL}/system/group/coupon/assign/input/grid/{$grid}">
        <table class="suggest">
        <tr>
        <th>現在表示しているクーポン</th><th></th><th>表示可能なクーポン</th>
        <tr>
            <td>
                <select style="width:300px;height:300px;" name="new_cid[]" id="new_cid" multiple>
                {if $old_coupon}
                {foreach from=$old_coupon key="key" item="value" name="old_coupon"}
                <option value="{$value.coupon_id}">{$value.shop_name} - {$value.coupon_title}</option>
                {/foreach}
                {/if}
                </select>
            </td>
            <td align="center">
                <input type="button" name="mv1" value=" ← " onclick="fnMoveSelect(this.form,'state_list','new_cid');"><br><br>
                <input type="button" name="mv2" value=" → " onclick="fnMoveSelect(this.form,'new_cid','state_list');">
            </td>
            <td>
                <select style="width:300px;height:300px;" name="state_list" multiple>
                {foreach from=$group_coupon key="key" item="value" name="group_coupon"}
                <option value="{$value.coupon_id}">{$value.shop_name} - {$value.coupon_title}</option>
                {/foreach}
                </select>
            </td>

        </tr>
        <tr>
            <td></td>
            <td>
                <input type="hidden" name="csrf_ticket" value="{$csrf_ticket}" />
                <input type="hidden" name="operation" value="regist" />
                <input type="submit" value="割り当て" onclick="fnSelectBoxAll(this.form,'new_cid','select');">
            </td>
        </tr>
        </table>
        </form>
    </div>
</div>
</div>
</div>
</div>
</body>
</html>
