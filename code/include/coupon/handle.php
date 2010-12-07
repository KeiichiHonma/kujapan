<?php
require_once('fw/handleManager.php');
require_once('coupon/parameter.php');
class couponHandle extends handleManager
{
    public $parameter;
    
    function __construct(){
        $this->parameter = new couponParameter();
    }
    
    public function addRow(){
        $this->parameter->setAdd();
        //$this->setDebug();
        return parent::addRow(T_COUPON,$this->parameter);
    }

    public function updateRow($cid){
        $this->parameter->setUpdate($cid);
        return parent::updateRow(T_COUPON,$this->parameter);
    }

    public function deleteRow($cid){
        $this->parameter->setDelete($cid);
        return parent::deleteRow(T_COUPON,$this->parameter);
    }

    //有効化、無効化
    public function updateValidateRow($cid,$validate){
        $this->parameter->setValidateUpdate($cid,$validate);
        return parent::updateRow(T_COUPON,$this->parameter);
    }
}

class couponLogHandle extends handleManager
{
    public $parameter;
    
    function __construct(){
        $this->parameter = new couponLogParameter();
    }
    
    public function addRow($coupon,$method){
        $this->parameter->setAdd($coupon,$method);
        //$this->setDebug();
        return parent::addRow(T_COUPON_LOG,$this->parameter);
    }

/*    public function updateRow($cid){
        $this->parameter->setUpdate($cid);
        return parent::updateRow(T_COUPON,$this->parameter);
    }

    public function deleteRow($cid){
        $this->parameter->setDelete($cid);
        return parent::deleteRow(T_COUPON,$this->parameter);
    }

    //有効化、無効化
    public function updateValidateRow($cid,$validate){
        $this->parameter->setValidateUpdate($cid,$validate);
        return parent::updateRow(T_COUPON,$this->parameter);
    }*/
}
?>
