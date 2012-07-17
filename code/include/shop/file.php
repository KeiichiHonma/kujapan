<?php
require_once('fw/fileManager.php');
require_once('shop/check.php');
class shopFile extends inputManager
{
    public $handle;
    private $is_check = FALSE;
    public $is_result = FALSE;
    
    //必要パラメータ
    private $title = null;
    private $subtitle = null;
    private $detail = null;
    private $aiid = 0;
    private $type;
    function __construct($type){
        $this->type = $type;
        switch ($type){
            case SHOP_TYPE_FACE:
                $check_function = 'checkFaceError';
                $this->model_name = 'shopFace';//親クラスにセット
            break;
            default:
                return FALSE;
            break;
        }
        
        $this->any_key = 'sid';
        $this->class_obj = $this;//call_user_func用
        $this->is_any = TRUE;//親クラスにセット
        
        call_user_func(array('checkShopFile',$check_function));
        if(!$this->is_check = checkShopFile::safeExit()) return FALSE;//クラスを抜けます
        parent::__construct(checkShopFile::$file_upload);
        require_once('shop/handle.php');
        $this->handle = new shopHandle();
        parent::input();
        $this->is_result = TRUE;
        return TRUE;
    }

    //shop item model//////////////
    
    //updateのみ
    public function shopFaceUpdateModel(){
        $this->handle->updateFaceRow($_POST['sid'],$this->fid);
    }

    public function shopFaceUpdateFileIdModel(){
        $this->handle->updateFaceRow(0);//0に戻す
    }
}

class shopItemFile extends inputManager
{
    public $handle;
    private $is_check = FALSE;
    public $is_result = FALSE;
    
    //必要パラメータ
    function __construct($type){
        $this->type = $type;
        switch ($type){
            case SHOP_TYPE_PRODUCT:
                $check_function = 'checkProductError';
            break;
            
            case SHOP_TYPE_GALLERY:
                $check_function = 'checkGalleryError';
            break;

            default:
                return FALSE;
            break;
        }
        
        $this->any_key = 'siid';
        $this->class_obj = $this;//call_user_func用
        $this->is_any = TRUE;//親クラスにセット
        $this->model_name = 'shopItem';//親クラスにセット

        //セクション自体の削除かどうかチェック
        if(isset($_POST[$this->section_delete_key]) && isset($_POST[$this->file_delete_key]) && strcasecmp($_POST[$this->file_delete_key],'on') == 0){
            //サクションの削除はチェックなし
        }else{
            call_user_func(array('checkShopItem',$check_function));
            if(!$this->is_check = checkShopItem::safeExit()) return FALSE;//クラスを抜けます
        }
        parent::__construct(checkShopItem::$file_upload);
        require_once('shop/handle.php');
        $this->handle = new shopItemHandle();
        parent::input();
        $this->is_result = TRUE;
        return TRUE;
    }

    //shop item model//////////////
    public function shopItemAddModel(){
        $this->handle->addRow($_POST['sid'],$this->type,$this->fid);
    }

    public function shopItemUpdateModel(){
        $this->handle->updateRow($_POST['sid'],$_POST[$this->any_key],$this->type,$this->fid);
    }

    public function shopItemUpdateFileIdModel(){
        $this->handle->updateFileIdRow($_POST[$this->any_key],0);//0に戻す
    }

    public function shopItemDeleteModel(){
        $this->handle->deleteRow($_POST[$this->any_key]);
    }
}
?>
