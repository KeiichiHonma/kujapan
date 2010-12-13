<?php
define('SETTING_INI',         'setting.ini');
define('LOCALE_CN',           'cn');
define('LOCALE_TW',           'tw');
define('LOCALE_JA',           'ja');

define('SITE_NAME'    , '日游酷棒');

//お客様番号
define('CUSTOMER_NO_BASE'    , 101294);//2008 - 0714 + 100000

//ロゴパス
define('LOGO_PATH'    , '/img/logo/');//2008 - 0714 + 100000

//SP
define('FIRSTSP',       10);
//define('GROUPSP',       10);//グループページで表示するクーポンの数

//ファイル系
define('FILES_DIR',       '/files');
//define('FILES_DIR',       '/include/files');
define('FILES_PATH',       $_SERVER['DOCUMENT_ROOT'].FILES_DIR);


//特集ページのテンプレートへのパス
define('SPECIAL_PATH',       $_SERVER['DOCUMENT_ROOT'].'/smarty/templates/special/group/');

//validate
define('VALIDATE_ALLOW',  0);
define('VALIDATE_DENY',  1);

//user status
define('STATUS_USER_REGIST',      0);
define('STATUS_USER_TMP',     1);

//manager status
define('STATUS_MANAGER_ON',      0);
define('STATUS_MANAGER_OFF',     1);

//regist status
define('REGIST_WAIT',         0);//仮登録状態
define('REGIST_FINISH',       1);//完了
define('REGIST_WRONG',        9);//不正

//manager type
define('TYPE_M_MANAGER',      0);
define('TYPE_M_SUPPORT',      8);//サポート
define('TYPE_M_ADMIN',        9);
define('TYPE_M_ADMIN_SHOP',   9);

//店舗のアイテムタイプ
define('SHOP_TYPE_LOGO'    ,  0);
define('SHOP_TYPE_FACE'    ,  1);
define('SHOP_TYPE_VISUAL'  ,  2);
define('SHOP_TYPE_PRODUCT' ,  3);
define('SHOP_TYPE_GALLERY' ,  4);
define('SHOP_TYPE_MAP_JA'  ,  5);//日本語用の地図
define('SHOP_TYPE_MAP_CN'  ,  6);//繁体字用の地図
define('SHOP_TYPE_MAP_TW'  ,  7);//繁体字用の地図
define('SHOP_TYPE_BARCODE' ,  8);//クーポン印刷画面用のバーコード画像

//coupon log method
define('COUPON_LOG_EDIT',     0);
define('COUPON_LOG_DROP',     1);

//お知らせターゲット
define('TARGET_ALL',        0);
define('TARGET_USER',       1);
define('TARGET_BUY_BEFORE', 2);
?>