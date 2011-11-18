<?php
require_once('manager/prepend.php');
$pid = $con->base->getPath('pid',TRUE);//リダイレクトあり
$number = $con->base->getPath('number',TRUE);//リダイレクトあり

$con->t->assign('pid',$pid);
$con->t->assign('number',$number);

$con->append();
?>
