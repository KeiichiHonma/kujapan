<?php
require_once('shop/prepend.php');
if ( $con->isPost ){
    if(isset($_POST['validate'])){
        require_once('shop/handle.php');
        $shop_handle = new shopHandle();
        switch ($_POST['validate']){
            //有効化したい場合
            case VALIDATE_ALLOW:
                if(strcasecmp(VALIDATE_DENY,$shop[0]['col_validate']) == 0){
                    $shop_handle->updateValidateRow($shop[0]['_id'],VALIDATE_ALLOW);
                }
            break;
            //無効化したい場合
            case VALIDATE_DENY:
                if(strcasecmp(VALIDATE_ALLOW,$shop[0]['col_validate']) == 0){
                    $shop_handle->updateValidateRow($shop[0]['_id'],VALIDATE_DENY);
            }
            break;
        }
        
    }
}
$con->safeExitRedirect('/system/shop/',TRUE);
?>