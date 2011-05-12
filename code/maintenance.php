<?php
header("Content-type: text/html; charset=utf-8");

require_once('fw/define.php');

define('KUJAPANURL',            'http://'.$_SERVER['SERVER_NAME']);
define('KUJAPANURLSSL',         'https://'.$_SERVER['SERVER_NAME']);

$ini = parse_ini_file(SETTING_INI, true);
if($ini['common']['isDebug'] == 0){//本番
    define('SERVER_NAME_JA',      'www.kujapan.net');
    define('SERVER_NAME_CN',      'www.kujapan.com');
    define('SERVER_NAME_TW',      'www.kujapan.net');
}elseif($ini['common']['isDebug'] == 1){//デバッグモード
    if($ini['common']['isStage'] == 1){//ステージングサーバモード
            define('SERVER_NAME_JA',      'ja.kujapan.813.co.jp');
            define('SERVER_NAME_CN',      'cn.kujapan.813.co.jp');
            define('SERVER_NAME_TW',      'tw.kujapan.813.co.jp');
    }else{
        if($ini['common']['country'] == "tw"){
            define('SERVER_NAME_JA',      'ja.kujapan.artemis.corp.813.co.jp');
            define('SERVER_NAME_CN',      'cn.kujapan.artemis.corp.813.co.jp');
            define('SERVER_NAME_TW',      'tw.kujapan.artemis.corp.813.co.jp');
        }else{
            define('SERVER_NAME_JA',      'ja.kujapan.apollon.corp.813.co.jp');
            define('SERVER_NAME_CN',      'cn.kujapan.apollon.corp.813.co.jp');
            define('SERVER_NAME_TW',      'tw.kujapan.apollon.corp.813.co.jp');
        }
    }
}




//メンテナンスモード解除
if($ini['common']['isMaintenance'] == 0){
    header( "HTTP/1.1 301 Moved Permanently" );
    header("Location: ".KUJAPANURL.'/');
    die();
}

switch ($_SERVER['SERVER_NAME']){
    case SERVER_NAME_TW:
        define('LOCALE',LOCALE_TW);//繁体字
    break;

    case SERVER_NAME_JA:
        define('LOCALE',LOCALE_JA);
    break;

    default:
        define('LOCALE',LOCALE_CN);//簡体字
    break;
}

//locale
if(file_exists($_SERVER['DOCUMENT_ROOT'].'/include/locale/'.LOCALE.'/maintenance.php')){
    require_once('locale/'.LOCALE.'/maintenance.php');//ファイル別翻訳ファイル
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="<?php print $locale['lang'] ?>" xml:lang="<?php print $locale['lang'] ?>" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content="" name="Keywords"/>
    <meta content="" name="Description"/>
    <title><?php print $locale['maintenance_title'] ?></title>
    <link href="/css/0-import.css" rel="stylesheet" type="text/css" />
    <link href="/locale/<?php print LOCALE ?>/css/background.css" rel="stylesheet" type="text/css" />
    <link href="/css/sitemap.css" rel="stylesheet" type="text/css" />
    <link href="/css/error.css" rel="stylesheet" type="text/css" />
    <link type="text/css" rel="stylesheet" href="/css/maintenance.css" />
</head>
<body>
    <div id="wrapper">
      <div id="container">
      <div id="header">
        <div id="header_line">
            <h1><?php print $locale['maintenance_title'] ?></h1>
        </div>
        <div id="header_inner">
          <ul>
            <li id="logo">
              <img alt="<?php print $locale['logo'] ?>" height="50" src="/img/visual/logo.gif" width="260" />
            </li>
            <li id="main_copy">
              <img alt="<?php print $locale['main_copy'] ?>" height="73" src="/locale/<?php print LOCALE ?>/img/visual/main_copy.gif" width="445" />
            </li>
          </ul><span class="clear"></span>
        </div>
      </div>
      <!-- /header -->

        <div id="e_main">
            <h2 class="h_title"><?php print $locale['maintenance_title'] ?></h2>

            <div id="error_box">
<?php print $locale['maintenance_time'] ?><br /><br />
<?php print $locale['maintenance_message'] ?>
            </div>
        </div>


    </div>
  </div>

</body>
</html>