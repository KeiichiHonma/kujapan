<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="{$locale.lang}" xml:lang="{$locale.lang}" xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
{*seo*}
{include file="include/header/seo.inc"}
    <link href="/css/0-import.css" rel="stylesheet" type="text/css" />
    <link href="/css/divide_format.css" rel="stylesheet" type="text/css" />
    <link href="/css/payment.css" rel="stylesheet" type="text/css" />
    <link href="/locale/{$smarty.const.LOCALE}/css/background.css" rel="stylesheet" type="text/css" />

    <meta content="text/javascript" http-equiv="Content-Script-Type" />
    <script src="/js/smartRollover.js" type="text/javascript"></script>
    <script src="/js/alphafilter.js" type="text/javascript"></script>
  </head>
  <body id="divide_format">
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
        </div>
        <div id="s_main">
          <h2 class="list">新規ご購入一時停止のお知らせ</h2>
            <p id="divide_format_title">新規ご購入一時停止予定時間</p>
            <div id="divide_format_message">
日ごろより『日游酷棒』をご利用頂き、誠にありがとうございます。<br />
『日游酷棒』サイトのメンテンスを下記時間帯で予定しており、メンテナンス予定時間の1時間前から新規ご購入を一時的に停止させていただいております。<br />
新規ご購入一時停止予定時間<br />
            <ul class="indentbox">
                <li>2010/12/13 2:00 - 2010/12/13 3:00</li>
            </ul>
皆様にはご迷惑をおかけしますことを深くお詫び申し上げます。<br />
メンテナンスが終了次第、サービスを復旧いたしますので、今しばらくお待ち下さいますようお願い申し上げます。<br />
『日游酷棒』運営事務局
            </div>
        </div>


{*フッター*}
{include file="include/header/footer.inc"}
    </div>
  </div>
  </body>
</html>