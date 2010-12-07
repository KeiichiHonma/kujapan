<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('shop/prepend.php');

$page = 'input';
if ( $con->isPost ){
    $from = $_FILES['file']['tmp_name'];
    $to = $_SERVER['DOCUMENT_ROOT'].LOGO_PATH.$shop[0]['_id'].'m.gif';

    if($_FILES['file']['error'] != 0){
        require_once('fw/errorManager.php');
        errorManager::throwError(E_SYSTEM_FILE_4);
    }
    
    if(is_uploaded_file($from)){
        //ディレクトリチェック
        $dir = $_SERVER['DOCUMENT_ROOT'].LOGO_PATH;
        //is_writable -- ファイルが書き込み可能かどうかを調べる
        if( !is_writable( $dir ) )
        {
            require_once('fw/errorManager.php');
            errorManager::throwError(E_SYSTEM_DIR_NO_WRITE);
        }
        
        //ファイルチェック
        if ( is_file( $to ) &&
        !is_writable( $to ) )
        {
            require_once('fw/errorManager.php');
            errorManager::throwError(E_SYSTEM_FILE_NO_WRITE);
        }
            
        if(move_uploaded_file($from,$to)){
            chmod($to,0666);
        }else{
            require_once('fw/errorManager.php');
            errorManager::throwError(E_SYSTEM_FILE_NOT_COPY);
        }
    }else{
        require_once('fw/errorManager.php');
        errorManager::throwError(E_SYSTEM_FILE_4);
    }
    
    $con->safeExitRedirect('/system/shop/base/',TRUE);
}else{
    //logoの存在チェック
    $logo_m = file_exists($_SERVER['DOCUMENT_ROOT'].LOGO_PATH.$shop[0]['_id'].'m.gif');//リトルサイズ
    if($logo_m){
        $con->t->assign('logo_m',$logo_m);
    }
}

//position 店舗及びADMINで見るページが違います
systemPosition::makeShopPosition($shop[0]['col_name_ja']);

//共通処理////////////////////////

$con->append('system/shop/base/logo_m/'.$page);
?>
