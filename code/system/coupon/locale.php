<?php
//user画面はパラメータで表示言語判定
$lang = $con->base->getPath('lang',FALSE);

if($lang == 'ja'){
    require_once('locale/ja/system/support.php');
    $con->t->assign('lang','ja');
}else{
    require_once('locale/cn/system/support.php');
    $con->t->assign('lang','cn');
}

$con->locale = $locale;//翻訳内容
?>
