<?php
require_once('locale/tw/common.php');//共通翻訳ファイル
$page_locale = array(
    'user_app_name'=>'会员',//ユーザー
    'user_search_btn'=>'搜索',//検索
    'user_search_help'=>'',//※nから始まるお客様番号は中国向けサービスではありません。ハチワンまでご連絡ください。
    'user_search_title'=>'会员查看',//ユーザー検索
    'user_search_keyword'=>'关键词语',//キーワード
    'user_search_item'=>'项目查看',//検索項目
    //'user_search_item_value'=>'客户编号,登录账户,アリペイ番号',//お客様番号,ログインアカウント,アリペイID
    'user_search_reset'=>'clear',//全条件解除
    'user_search_none'=>'会员不存在',//ユーザーが存在しません
    
    'user_search_result_title'=>'查看结果',//検索結果
    'user_recent_title'=>'最新会员一览表',//最新ユーザー一覧
    
    'user_given_name_title'=>'姓名',//姓名
    'user_status_title'=>'会员状态 ',//ステータス
    //'user_customer_no_title'=>'客户编号',//
    //'user_account_title'=>'登录账户',//
    //'user_trade_no_title'=>'アリペイ番号',//
    //'user_validate_time_title'=>'账户有效期',//
    'user_validate_title'=>'有效/停止',//有効/停止
    'user_create_date_title'=>'制作时间',//作成日時
    'user_last_login_title'=>'最后登录时间',//最終ログイン日
    'user_mail_title'=>'邮箱地址',//メールアドレス
    'user_new_password_title'=>'新的密码',//新しいパスワード
    
    'user_given_name_value_default'=>'使用者未登录',//使用者登録されていません
    'user_validate_value_on'=>'有效',//有効
    'user_validate_value_off'=>'停止',//停止
    
    //user status
    'user_status_value_error1'=>'errorL1',//エラーL1
    'user_status_value_error2'=>'errorL2',//エラーL2
    'user_status_value_error3'=>'errorL3',//エラーL3
    'user_status_value_tmp'=>'未登录',//未登録
    'user_status_value_normal'=>'使用中',//利用中
    'user_status_value_deadline'=>'过期',//期限切
    'user_status_value_deny'=>'停止',//停止
    
    'user_republish_title'=>'再发行',//再発行
    'user_republish_done_title'=>'再发行完毕',//再発行完了
    
    'user_republish_alert1'=>'从本页开始移动的话，将不能看到密码。所以请务必记下密码',//本ページから移動するとパスワードが閲覧できなくなります。必ず控えてください。
    'user_republish_alert2'=>'请注意为了登录结束的顾客着想，请保持和原有相同的使用者姓名，有效期限',//使用者登録が済んでいるお客様のため、使用者名、有効期限は以前のままです。ご注意ください。
    'user_republish_alert3'=>'为了未登录结束的顾客着想，请不要变更使用者姓名及有效期限',//使用者登録が済んでいないお客様のため、使用者名、有効期限は変更されません。

    'coupon_app_name'=>'优惠券',//クーポン
    'coupon_search_btn'=>'查看',//検索
    'coupon_search_title'=>'确认优惠券',//クーポン確認
    'coupon_search_keyword'=>'优惠券号码',//クーポン番号
    'coupon_search_item'=>'项目查看',//検索項目
    'coupon_search_item_value'=>'过去的优惠券信息',//過去のクーポン情報
    'coupon_search_reset'=>'clear',//全条件解除
    'coupon_search_none'=>'优惠券不存在',//クーポンが存在しません
    'coupon_display_title'=>'打印的会员看的优惠券信息',//に印刷したユーザーが見ているクーポン情報
    'coupon_current_title'=>'和最新优惠券信息的差异',//最新のクーポン情報との違い
    'coupon_error_1'=>'顾客号码从C或者N开始',//お客様番号はc又はnから始まります。
);
$locale = array_merge($common_locale,$page_locale);
?>
