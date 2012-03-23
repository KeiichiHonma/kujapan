<?php
require_once('user/prepend.php');

if($bl){
    $con->append('payment/done');
    die();
}
$con->append();
?>
