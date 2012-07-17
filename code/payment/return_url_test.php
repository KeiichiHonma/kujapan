<?php
require_once('fw/container.php');
$con = new container();//dbアクセスします

if(!isset($_GET['uid']) || !is_numeric($_GET['uid'])){
    require_once('fw/errorManager.php');
    errorManager::throwError(E_CMMN_USER_EXISTS);
}

require_once('./make.php');
//header("Location: ".'https://'.$_SERVER['SERVER_NAME'].'/payment/make?'.$_SERVER["QUERY_STRING"]);
//die();
?>