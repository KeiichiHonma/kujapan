<?php
require_once('manager/prepend.php');
$pid = $con->base->getPath('pid',TRUE);//リダイレクトあり
$number = $con->base->getPath('number',TRUE);//リダイレクトあり

require_once('user/logic.php');
$tmp_logic = new tmpRegistLogic();

$user = $tmp_logic->getPartnerTmpRegist($pid,$number);

if(!$user){
    die();
}

$csv = array();
foreach ($user as $key => $value){
    $csv[$key]['account'] = $value['col_account'];
    $csv[$key]['password'] = $value['col_password'];
    $csv[$key]['customer_no'] = $value['col_customer_no'];
}



require_once('fw/csv.php');
require_once('fw/download.php');
$temp_filename = csv::csvWriter($csv);
download::prepare_download( 'user_pid_'.$pid.'.csv', 'application/csv', FALSE);

$fp = fopen( $temp_filename, 'rb' );
if( ( $size = filesize( $temp_filename ) ) > 0 ){
        echo fread( $fp, $size );
}
fclose( $fp );
// 一時ファイルの削除
unlink( $temp_filename );
?>
