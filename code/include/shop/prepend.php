<?php
require_once('manager/prepend.php');
require_once('shop/logic.php');
$co_logic = new shopLogic(TRUE);

//all対応
$sid = $con->base->getPath('sid',FALSE);


if($sid && $con->session->get(SESSION_M_TYPE) == TYPE_M_ADMIN){
    $shop = $co_logic->getOneShop($sid);
    //店舗になりすますための情報をセット
    $con->session->set($manager_auth->session_key_oid,$shop[0]['col_mid']);
    $con->session->set($manager_auth->session_key_sid,$shop[0]['shop_id']);
    
    //sid除去-loopしてしまう
    $url = explode('/sid',$_SERVER['REQUEST_URI']);
    header("Location: ".$url[0]);
    die();
    //if(isset($manager_auth->sid) && isset($manager_auth->mid)) $shop = $co_logic->getOneShop($manager_auth->sid);
}else{
    if(isset($manager_auth->sid) && isset($manager_auth->mid)) $shop = $co_logic->getOneShopForSystem($manager_auth->sid,$manager_auth->mid);
}
if(!$shop){
    require_once('fw/errorManager.php');
    errorManager::throwError(E_CMMN_SHOP_EXISTS);
}
$con->t->assign('shop',$shop);
$con->t->assign('sid',$shop[0]['_id']);
?>