<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('shop/prepend.php');


//logoの存在チェック
$logo_m = file_exists($_SERVER['DOCUMENT_ROOT'].LOGO_PATH.$shop[0]['_id'].'m.gif');//ミドルサイズ

if($logo_m){
    $con->t->assign('logo_m',$logo_m);
}

$logo_s = file_exists($_SERVER['DOCUMENT_ROOT'].LOGO_PATH.$shop[0]['_id'].'s.gif');//リトルサイズ
if($logo_s){
    $con->t->assign('logo_s',$logo_s);
}

//face画像
require_once('file/logic.php');
$file_logic = new filesLogic();
$shop_face = $file_logic->getRow($shop[0]['col_face']);
if($shop_face){
    $shop_face[0]['path'] = $con->base->getFilePath($shop_face[0]['_id'],$shop_face[0]['col_extension']) ;
    $con->t->assign('shop_face',$shop_face);
}

//visual + barcode
$item_logic = new shopItemLogic(TRUE);
$shop_item = $item_logic->getShopItem($shop[0]['_id'],array(SHOP_TYPE_VISUAL,SHOP_TYPE_BARCODE));
if($shop_item) $con->t->assign('shop_item',utilManager::getShopItemArray($shop_item));

//店舗情報
//form情報アサイン
require_once('shop/form.php');
$form = new shopForm();
$form->assignProfileForm();

$_POST['aid'] = $shop[0]['col_aid'];
$_POST['gid'] = $shop[0]['col_gid'];
utilManager::setLocalePostPram('name',$shop[0]);
utilManager::setLocalePostPram('detail',$shop[0]);
utilManager::setLocalePostPram('address',$shop[0]);
$_POST['google_map'] = $shop[0]['col_google_map'];
utilManager::setLocalePostPram('open_hour',$shop[0]);
utilManager::setLocalePostPram('holiday',$shop[0]);
utilManager::setLocalePostPram('comment',$shop[0]);
$_POST['url'] = $shop[0]['col_url'];
utilManager::setLocalePostPram('remark',$shop[0]);
//feature
require_once('feature/logic.php');
$feature_logic = new featureLogic(TRUE);

$unserialize = unserialize($shop[0]['col_setting']);

if($feature = $unserialize['feature']){
    foreach ($feature_logic->feature_info as $feid => $value){
        if(in_array($feid,$feature)){
            $feature_name[] = $value['col_name_ja'];
        }
    }
    $con->t->assign('feature_name',implode(',',$feature_name));
}

//学校及びADMINで見るページが違います
//position
systemPosition::makeShopPosition($shop[0]['col_name_ja']);


$con->append();
?>
