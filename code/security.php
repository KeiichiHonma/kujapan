<?php
require_once('user/prepend.php');
//認証は必須
if(!$bl){
    die();
}
//画像出力プログラム/////////////////////////////////////////////////////////////

//各項目データ生成////////////////////////////////////////////////


//  表示する文字を指定
$name = $user_auth->given_name;
$customer_no = $user_auth->customer_no;

/////////////////////////////////////////////////////////////////
//$date = $user_auth->validate_time;

//  フォントの指定
  define("FONT",5);
//  フォントの幅の取得
  define("FONT_WIDTH",imagefontwidth(FONT));
//  フォントの高さの取得
  define("FONT_HEIGHT",imagefontheight(FONT));

//  サンプル表示を合成する画像を指定
  define("IMAGE","./img/coupon/security.jpg");

  $image = imagecreatefromjpeg(IMAGE);

//  画像の幅を取得
  define("IMAGE_WIDTH",imagesx($image));

//  画像の高さを取得
  define("IMAGE_HEIGHT",imagesy($image));

//  文字列の幅を取得
//$kigen_width = strlen($kigen)*FONT_WIDTH;
  //$messegeWidth = strlen(MESSAGE)*FONT_WIDTH;
  //$messegeWidth2 = strlen(MESSAGE2)*FONT_WIDTH;

//  文字列の開始位置の取得(横)
  //$messageStartX = (IMAGE_WIDTH/2)-($messegeWidth/2);

//  文字列の開始位置の取得（高さ）
  //$messageStartY = (IMAGE_HEIGHT/2)-(FONT_HEIGHT/2);

//  文字列の色の指定(RGB)
  $messageColor = imagecolorallocate($image,102,102,102);

//  文字列の描画
  //imagestring($image,FONT,$messageStartX,$messageStartY,MESSAGE,$messageColor);
if(LOCALE == LOCALE_TW){
    $font_path = "./DFHei-B5Otf-W9.otf";
}else{
    $font_path = "./DFHei-GBOtf-W9.otf";
}

$font_path2 = "./Helvetica-Black.ttf";


//ImageTTFText ($image, 30, 0, 10, 70, $messageColor, $font_path, MESSAGE);
//画像、フォントサイズ、角度、x座標、y座標

//有効期限
//ImageTTFText ($image, 20, 0, 10, 30, $messageColor, $font_path, $kigen);
//ImageTTFText ($image, 22, 0, 140, 30, $messageColor, $font_path2, $date);

//名前
//ImageTTFText ($image, 20, 0, 10, 60, $messageColor, $font_path, $namae);
//ImageTTFText ($image, 22, 0, 140, 60, $messageColor, $font_path2, $name);

ImageTTFText ($image, 20, 0, 10, 30, $messageColor, $font_path, '姓名');//2言語統一
ImageTTFText ($image, 22, 0, 140, 30, $messageColor, $font_path2, $name);

//お客様番号
ImageTTFText ($image, 20, 0, 10, 60, $messageColor, $font_path, $con->locale['customer_no']);
ImageTTFText ($image, 22, 0, 140, 60, $messageColor, $font_path2, $customer_no);

//印刷日時
ImageTTFText ($image, 20, 0, 335, 90, $messageColor, $font_path, $con->locale['print_out_time']);
ImageTTFText ($image, 22, 0, 455, 90, $messageColor, $font_path2, date("Y/n/d",time()));

//  画像を出力
  header("Content-type: image/jpeg");
  imagejpeg($image);

//  メモリ上から解放
  imagedestroy($image);
?>
