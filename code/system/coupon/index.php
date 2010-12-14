<?php
//--[ 前処理 ]--------------------------------------------------------------
require_once('manager/prepend.php');
//require_once('./locale.php');

//debug//
if($con->isDebug){
    $_GET['sid'] = 5;
    $_GET['customer_no'] = 'c101296';
    $_GET['last_no'] = '75639555';
}


$con->append();
?>
