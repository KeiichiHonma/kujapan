<?php
// --------------------------
// 共通エラー
// --------------------------

//エラー宣言
define('E_CMMN_URL_WRONG',                 'KUJAPAN_CMMN_00001');
define('E_CMMN_TOKEN_WRONG',               'KUJAPAN_CMMN_00002');
define('E_CMMN_SHOP_EXISTS',               'KUJAPAN_CMMN_00003');
define('E_CMMN_UNKNOWN_ERROR',             'KUJAPAN_CMMN_00004');
define('E_CMMN_INITIALIZE_RAND',           'KUJAPAN_CMMN_00005');
define('E_CMMN_VALIDATE_TIME',             'KUJAPAN_CMMN_00006');

//エラーメッセージ
define('KUJAPAN_CMMN_00001',               'URL不正确');//URLが不正です。
define('KUJAPAN_CMMN_00002',               '请求错误。Cookie可能处于无效状态。请查看浏览器设置');//不正なリクエストです。cookie設定が有効になっていない可能性があります。ブラウザの設定をご確認ください。
define('KUJAPAN_CMMN_00003',               '店铺已删除或不存在');//店舗が削除されたか存在しません。
define('KUJAPAN_CMMN_00004',               '服务器现在正忙，请稍候再试');//現在、サーバーが混んでおります。しばらく経ってから、もう一度お試しください。
define('KUJAPAN_CMMN_00005',               '初始化过程中出现不明原因的错误。请联系日游酷棒客服中心');
//define('KUJAPAN_CMMN_00006',               'クーポン発行可能な期間が過ぎています。<br />発行可能な期間は初回ログイン時より3か月となっております。<br />再度ご購入いただきますようお願いいたします。');
define('KUJAPAN_CMMN_00006',               '账户名已过期。<br />优惠券发放的有效期为初始登陆三个月内。<br />请重新购买。');//ログインアカウントの有効期間が過ぎております。<br />クーポン券発行可能な期間は初回ログイン時より3か月となっております。<br />再度ご購入いただきますようお願いいたします。

// --------------------------
// USERエラー 認証
// --------------------------
//エラー宣言
define('E_AUTH_NG',                        'KUJAPAN_AUTH_00001');

//エラーメッセージ
define('KUJAPAN_AUTH_00001',               '登录账户名或登录密码错误');//ログインアカウント、あるいは、ログインパスワードが間違っています。


// --------------------------
// ファイルシステムエラー
// --------------------------
define('E_SYSTEM_DIR_NO_EXIST',            'KUJAPAN_SYSTEM_00001');
define('E_SYSTEM_DIR_NO_WRITE',            'KUJAPAN_SYSTEM_00002');
define('E_SYSTEM_FILE_NO_WRITE',           'KUJAPAN_SYSTEM_00003');
define('E_SYSTEM_FILE_EXIST',              'KUJAPAN_SYSTEM_00004');

define('E_SYSTEM_FILE_1',                  'KUJAPAN_SYSTEM_00005');//E_SYSTEM_FILE_BASE_SIZE
define('E_SYSTEM_FILE_2',                  'KUJAPAN_SYSTEM_00006');//E_SYSTEM_FILE_FORM_SIZE
define('E_SYSTEM_FILE_3',                  'KUJAPAN_SYSTEM_00007');//E_SYSTEM_FILE_PART_UPLOAD
define('E_SYSTEM_FILE_4',                  'KUJAPAN_SYSTEM_00008');//E_SYSTEM_FILE_ALL_UPLOAD

define('E_SYSTEM_FILE_NOT_COPY',           'KUJAPAN_SYSTEM_00009');
define('E_CODE_EMPTY',                     'KUJAPAN_SYSTEM_00010');
define('E_CODE_DUPLICATION',               'KUJAPAN_SYSTEM_00011');
define('E_MAIL_NOT_SEND',                  'KUJAPAN_SYSTEM_00012');
define('E_SYSTEM_CSV_WRONG',               'KUJAPAN_SYSTEM_00014');
define('E_SYSTEM_PARAM_WRONG',             'KUJAPAN_SYSTEM_00015');



define('KUJAPAN_SYSTEM_00001',              'ディレクトリが存在しません');
define('KUJAPAN_SYSTEM_00002',              'ディレクトリへの書き込み権限がありません');
define('KUJAPAN_SYSTEM_00003',              'ファイルへの書き込み権限がありません');
define('KUJAPAN_SYSTEM_00004',              '既にファイルが存在しています');
define('KUJAPAN_SYSTEM_00005',              '！基本ファイルサイズの制限値を超えています');
define('KUJAPAN_SYSTEM_00006',              '！フォームファイルサイズの制限値を超えています');
define('KUJAPAN_SYSTEM_00007',              '！一部分のみしかアップロードされていませんでした');
define('KUJAPAN_SYSTEM_00008',              '！ファイルは必須です。ファイルがアップロードされませんでした');
define('KUJAPAN_SYSTEM_00009',              'ファイルコピーに失敗しました');
define('KUJAPAN_SYSTEM_00010',              'コードが入力されていません');
define('KUJAPAN_SYSTEM_00011',              'コードが重複しています');
define('KUJAPAN_SYSTEM_00012',              'メールの送信に失敗しました．');
define('KUJAPAN_SYSTEM_00014',              'CSVファイルが不正です');
define('KUJAPAN_SYSTEM_00015',              'パラメータが不正です');

?>
