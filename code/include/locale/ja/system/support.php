<?php
require_once('locale/ja/common.php');//共通翻訳ファイル
$page_locale = array(
    'user_app_name'=>'ユーザー検索',
    'user_search_btn'=>'検索',
    'user_search_help'=>'※nから始まるお客様番号は中国向けサービスではありません。ハチワンまでご連絡ください。',
    'user_search_title'=>'ユーザー検索',
    'user_search_keyword'=>'キーワード ',
    'user_search_item'=>'検索項目',
    //'user_search_item_value'=>'客户编号,登录账户,アリペイ番号',
    'user_search_reset'=>'全条件解除',
    'user_search_none'=>'ユーザーが存在しません',
    
    'user_search_result_title'=>'検索結果',
    'user_recent_title'=>'最新ユーザー一覧',
    
    'user_given_name_title'=>'姓名',
    'user_status_title'=>'ステータス',
    //'user_customer_no_title'=>'客户编号',
    //'user_account_title'=>'登录账户',
    //'user_trade_no_title'=>'アリペイ番号',
    //'user_validate_time_title'=>'账户有效期',
    'user_validate_title'=>'有効/停止',
    'user_create_date_title'=>'作成日時',
    'user_last_login_title'=>'最終ログイン日',
    'user_mail_title'=>'邮箱地址',
    'user_new_password_title'=>'新しいパスワード',
    
    'user_given_name_value_default'=>'使用者登録されていません',
    'user_validate_value_on'=>'有効',
    'user_validate_value_off'=>'停止',
    
    //user status
    'user_status_value_error1'=>'エラーL1',
    'user_status_value_error2'=>'エラーL2',
    'user_status_value_alert'=>'注意',
    'user_status_value_tmp'=>'未登録',
    'user_status_value_normal'=>'利用中',
    'user_status_value_deadline'=>'期限切',
    'user_status_value_deny'=>'停止',
    
    'user_republish_title'=>'再発行',
    'user_republish_done_title'=>'再発行完了',
    
    'user_republish_alert1'=>'本ページから移動するとパスワードが閲覧できなくなります。必ず控えてください。',
    'user_republish_alert2'=>'使用者登録が済んでいるお客様のため、使用者名、有効期限は以前のままです。ご注意ください。',
    'user_republish_alert3'=>'使用者登録が済んでいないお客様のため、使用者名、有効期限は変更されません。',

    'coupon_app_name'=>'クーポン確認',
    'coupon_search_btn'=>'検索',
    'coupon_search_title'=>'クーポン確認',
    'coupon_search_keyword'=>'クーポン番号',
    'coupon_search_item'=>'検索項目',
    'coupon_search_item_value'=>'過去のクーポン情報',
    'coupon_search_reset'=>'全条件解除',
    'coupon_search_none'=>'クーポンが存在しません',
    'coupon_display_title'=>'に印刷したユーザーが見ているクーポン情報',
    'coupon_current_title'=>'最新のクーポン情報との違い',
    'coupon_error1'=>'お客様番号はc又はnから始まります。',
);
$locale = array_merge($common_locale,$page_locale);
?>
