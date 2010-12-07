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
        <h2 class="h_title">グループ割り当て</h2>

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
        <form id="couponForm" name="couponForm" method="post" action="{$smarty.const.KUJAPANURLSSL}/system/shop/group/assign/input">
        <table class="suggest">
        <tr>
        <th>所属グループ</th><th></th><th>グループ一覧</th>
        <tr>
            <td>
                <select style="width:200px;height:200px;" name="new_grid[]" id="new_grid" multiple>
                {if $compamny_group}
                {foreach from=$compamny_group key="key" item="value" name="compamny_group"}
                <option value="{$value.col_grid}">{$value.col_name_ja}</option>
                {/foreach}
                {/if}
                </select>
            </td>
            <td align="center">
                <input type="button" name="mv1" value=" ← " onclick="fnMoveSelect(this.form,'state_list','new_grid');"><br><br>
                <input type="button" name="mv2" value=" → " onclick="fnMoveSelect(this.form,'new_grid','state_list');">
            </td>
            <td>
                <select style="width:200px;height:200px;" name="state_list" multiple>
                {foreach from=$group key="key" item="value" name="group"}
                {if !array_search($value._id,$compamny_group)}
                <option value="{$value._id}">{$value.col_name_ja}</option>
                {/if}
                {/foreach}
                </select>
            </td>

        </tr>
        <tr>
            <td></td>
            <td>
                <input type="hidden" name="csrf_ticket" value="{$csrf_ticket}" />
                <input type="hidden" name="operation" value="regist" />
                <input type="submit" value="割り当て" onclick="fnSelectBoxAll(this.form,'new_grid','select');">
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
