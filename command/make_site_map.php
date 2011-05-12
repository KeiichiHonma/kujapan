<?php
$ini = parse_ini_file('/usr/local/apache2/htdocs/kujapan/include/setting.ini', true);

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

switch ($ini['common']['country']){
    case 'tw':
        define('SERVER_NAME',SERVER_NAME_TW);
    break;

    case 'ja':
        define('SERVER_NAME',SERVER_NAME_JA);
    break;

    default:
        define('SERVER_NAME',SERVER_NAME_CN);
    break;
}

define('KUJAPANURL',            'http://'.SERVER_NAME);
define('KUJAPANURLSSL',         'https://'.SERVER_NAME);

set_include_path('/usr/local/apache2/htdocs/kujapan/include/');

//本番用///////////////////////////////////////////////////////////////////////////
$root = '/usr/local/apache2/htdocs/kujapan/';

header("Content-type: text/html; charset=utf-8");
require_once('fw/container.php');
$con = new container();

$real = 'http://www.oshiete-ca.com';
$realssl = 'https://www.oshiete-ca.com';
$real_m = 'http://m.oshiete-ca.com';


//--[ メイン処理 ]------------------------------------------------------------------
//pc
$contents = '';
$contents .= '<?xml version="1.0" encoding="UTF-8" ?>'."\n";
$contents .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";
$contents .= makeURL(KUJAPANURL.'/',TRUE);
$contents .= makeURL(KUJAPANURL.'/about');
$contents .= makeURL(KUJAPANURL.'/rules');
$contents .= makeURL(KUJAPANURL.'/corp');
$contents .= makeURL(KUJAPANURL.'/site_map');
$contents .= makeURL(KUJAPANURL.'/contact');
$contents .= makeURL(KUJAPANURL.'/payment/bridge');

//area////////////////////////////////////////////////////////////////
require_once('coupon/logic.php');
$c_logic = new couponLogic();
foreach ($con->area->area_info as $key => $value){
    $con->base->makeLimitTo();
    $coupon = $c_logic->getAreaCoupon($value['_id'],null,null);
    $an = ceil($c_logic->rows/FIRSTSP);
    for ($i=0;$i<$an;$i++){
        if($i == 0){
            $contents .= makeURL(KUJAPANURL.'/area/aid/'.$value['_id']);
        }else{
            $contents .= makeURL(KUJAPANURL.'/area/aid/'.$value['_id'].'/sp/'.$i*FIRSTSP);
        }
    }
}

//genre////////////////////////////////////////////////////////////////
foreach ($con->genre->genre_info as $key => $value){
    $coupon = $c_logic->getGenreCoupon($value['_id'],null,null);
    $an = ceil($c_logic->rows/FIRSTSP);
    for ($i=0;$i<$an;$i++){
        if($i == 0){
            $contents .= makeURL(KUJAPANURL.'/genre/gid/'.$value['_id']);
        }else{
            $contents .= makeURL(KUJAPANURL.'/genre/gid/'.$value['_id'].'/sp/'.$i*FIRSTSP);
        }
    }
}

//shop////////////////////////////////////////////////////////////////
require_once('shop/logic.php');
$s_logic = new shopLogic();
$shop = $s_logic->getShop(null,null);
foreach ($shop as $key => $value){
    $contents .= makeURL(KUJAPANURL.'/shop/sid/'.$value['shop_id']);
}

//end
$contents .= '</urlset>';

$fp = fopen( $root.'sitemap.xml', "w+" );
fputs($fp,$contents);
fclose( $fp );

print 'sitemap.xml:done';
die();
function makeURL($url,$isIndex = FALSE){
    $string = '';
    $string .= '    <url>'."\n";
    $string .= '        <loc>'.$url.'</loc>'."\n";
    $string .= '        <lastmod>'.date("Y-m-d").'</lastmod>'."\n";
    if($isIndex){
    $string .= '        <changefreq>daily</changefreq>'."\n";
    $string .= '        <priority>1.0</priority>'."\n";
    }else{
    $string .= '        <changefreq>weekly</changefreq>'."\n";
    $string .= '        <priority>0.5</priority>'."\n";
    }
    $string .= '    </url>'."\n";
    return $string;
}
?>