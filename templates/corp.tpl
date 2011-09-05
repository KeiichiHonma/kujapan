<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="{$locale.lang}" xml:lang="{$locale.lang}" xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
{*seo*}
{include file="include/header/seo.inc"}
    <link href="/css/0-import.css" rel="stylesheet" type="text/css" />
    <link href="/css/divide_format.css" rel="stylesheet" type="text/css" />
    <link href="/locale/{$smarty.const.LOCALE}/css/background.css" rel="stylesheet" type="text/css" />
    <meta content="text/javascript" http-equiv="Content-Script-Type" />
    <script src="/js/smartRollover.js" type="text/javascript"></script>
    <script src="/js/alphafilter.js" type="text/javascript"></script>
  </head>
  <body id="coupon">
    <div id="wrapper">
      <div id="container">
{*ロゴ、グローバルナビ*}
{include file="include/header/header.inc"}
{*ポジション*}
{include file="include/common/position.inc"}
        <div class="clear" id="s_sub">
{*ログインボックス*}
{include file="include/common/login_box.inc"}
{*エリアボックス*}
{include file="include/common/area_box.inc"}
{*ジャンルボックス*}
{include file="include/common/genre_box.inc"}
{*全ページバナー*}
{include file="include/common/all_banner.inc"}
        </div>
        <div id="s_main">
          <h2 class="list">{$locale.footer_corp}</h2>
            <p id="divide_format_title">{$locale.corp_title}</p>
            <div id="divide_format_message">&nbsp;</div>


                <div class="float-l">
                    <img src="/img/corp/teleweb.gif" width="247" height="55" alt="" />
                    <table class="teleweb">
                    <tbody>
                    <tr>
                        <th>{$locale.corp_th_company}</th>
                        <td>{$locale.corp_td_company_teleweb}</td>
                    </tr>
                    <tr>
                        <th>{$locale.corp_th_address}</th>
                        <td>
                        <p>{$locale.corp_td_address_teleweb}</p>
                        <p>URL:&nbsp;<a href="http://www.95teleweb.com" target="_blank">http://www.95teleweb.com</a></p>
                        </td>
                    </tr>
                    <tr>
                    <th>{$locale.corp_th_publish}</th>
                    <td>{$locale.corp_td_publish_teleweb}</td>
                    </tr>
                    <tr>
                    <th>{$locale.corp_th_business}</th>
                    <td>
                    {$locale.corp_td_business_teleweb}
                    </td>
                    </tr>
                    </tbody>
                    </table>
                </div>
                <div class="float-r">
                    <img src="/img/corp/logo_81.gif" width="250" height="55" alt="ハチワンロゴ" />
                    <table class="hachione">
                    <tbody>
                    <tr>
                    <th>{$locale.corp_th_company}</th>
                    <td>{$locale.corp_td_company_iluna}</td>
                    </tr>
                    <tr>
                    <th>{$locale.corp_th_address}</th>
                    <td>
                    <p>{$locale.corp_td_address_iluna}</p>
                    <p>URL:&nbsp;<a href="http://www.813.co.jp/" target="_blank">http://www.813.co.jp/</a></p></td>
                    </tr>
                    <tr>
                    <th>{$locale.corp_th_publish}</th>
                    <td>{$locale.corp_td_publish_iluna}</td>
                    </tr>
                    <tr>
                    <th>{$locale.corp_th_business}</th>
                    <td>
                    {$locale.corp_td_business_iluna}
                    </td>
                    </tr>
                    </tbody>
                    </table>
                </div>
        </div>


{*フッター*}
{include file="include/header/footer.inc"}
    </div>
  </div>
  </body>
</html>