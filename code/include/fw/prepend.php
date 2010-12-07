<?php
header("Content-type: text/html; charset=utf-8");
require_once('fw/container.php');
$con = new container();
$con->checkPostCsrf();
?>