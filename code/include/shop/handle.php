<?php
require_once('fw/handleManager.php');
require_once('shop/parameter.php');
class shopHandle extends handleManager
{
    public $parameter;
    
    function __construct(){
        $this->parameter = new shopParameter();
    }
    
    public function addRow($mid){
        $this->parameter->setAdd($mid);
        //$this->setDebug();
        return parent::addRow(T_SHOP,$this->parameter);
    }

    public function addRowForManager($mid,$name){
        $this->parameter->setAddForManager($mid,$name);
        //$this->setDebug();
        return parent::addRow(T_SHOP,$this->parameter);
    }

    public function updateRow($parameter){
        return parent::updateRow(T_SHOP,$parameter);
    }

    public function updateProfileRow(){
        $this->parameter->setProfileUpdate();
        //$this->setDebug();
        return parent::updateRow(T_SHOP,$this->parameter);
    }

    public function updateSettingRow($serialize,$key,$array){
        $this->parameter->setSettingUpdate($serialize,$key,$array);
        return parent::updateRow(T_SHOP,$this->parameter);
    }

/*    public function updateLogoRow($fid){
        $this->parameter->setLogoUpdate($fid);
        //$this->setDebug();
        return parent::updateRow(T_SHOP,$this->parameter);
    }*/

    public function updateFaceRow($fid){
        $this->parameter->setFaceUpdate($fid);
        //$this->setDebug();
        return parent::updateRow(T_SHOP,$this->parameter);
    }

    public function deleteRow($parameter){
        return parent::deleteRow(T_SHOP,$parameter);
    }

    public function updateIndexRow($sid,$index){
        $this->parameter->setIndexUpdate($sid,$index);
        return parent::updateRow(T_SHOP,$this->parameter);
    }

    //有効化、無効化
    public function updateValidateRow($sid,$validate){
        $this->parameter->setValidateUpdate($sid,$validate);
        return parent::updateRow(T_SHOP,$this->parameter);
    }
}

class shopItemHandle extends handleManager
{
    public $parameter;
    
    function __construct(){
        $this->parameter = new shopItemParameter();
    }
    
    public function addRow($type,$fid = null){
        $this->parameter->setAdd($type,$fid);
        //parent::addDebug(T_SHOP_ITEM,$this->parameter);
        return parent::addRow(T_SHOP_ITEM,$this->parameter);
    }
    
    //以下adminだけの権限
    public function updateRow($siid,$type,$fid = null){
        $this->parameter->setUpdate($siid,$type,$fid);
        //parent::updateDebug(T_SHOP_ITEM,$this->parameter);
        return parent::updateRow(T_SHOP_ITEM,$this->parameter);
    }
    
    //fidのみ0に戻す
    public function updateFileIdRow($siid,$fid = 0){
        $this->parameter->setFileIdUpdate($siid,$fid);
        //parent::updateDebug(T_SHOP_ITEM,$this->parameter);
        return parent::updateRow(T_SHOP_ITEM,$this->parameter);
    }

    public function deleteRow($siid){
        $this->parameter->setDelete($siid);
        return parent::deleteRow(T_SHOP_ITEM,$this->parameter);
    }

}
?>
