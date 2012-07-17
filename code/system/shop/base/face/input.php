<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('shop/prepend.php');

$page = 'input';
if ( $con->isPost ){
    $_POST['alt'] = $shop[0]['col_name'];

    require_once('shop/file.php');
    $shop_file = new shopFile(SHOP_TYPE_FACE);
    if($shop_file->is_result) $con->safeExitRedirect('/system/shop/base/index/sid/'.$shop[0]['_id'],TRUE);
}else{
    require_once('file/logic.php');//area
    $file_logic = new filesLogic();
    //lface画像
    $shop_face = $file_logic->getRow($shop[0]['col_face']);

    if($shop_face){
        $shop_face[0]['path'] = $con->base->getFilePath($shop_face[0]['_id'],$shop_face[0]['col_extension']) ;
        $con->t->assign('shop_face',$shop_face);
    }
}

//position 店舗及びADMINで見るページが違います
systemPosition::makeShopPosition($shop[0]['col_name']);

//共通処理////////////////////////
$con->append('system/shop/base/face/'.$page);
?>
