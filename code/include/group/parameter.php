<?php
require_once('fw/parameterManager.php');
require_once('group/table.php');
class groupParameter extends parameterManager
{
    public function setAdd(){
        parent::readyAddParameter();
        $this->setParameter();
    }

    public function setUpdate($grid){
        parent::readyUpdateParameter($grid);
        $this->setParameter();
    }

    public function setSerializeSpecialCoouponUpdate($grid,$new_cid){
        parent::readyUpdateParameter($grid);
        $this->parameter['serialize_special_cooupon'] = serialize($new_cid);
    }

    public function setDelete($grid){
        parent::readyDeleteParameter($grid);
    }
    
    //checkが済んでいる前提なのでNOチェック
    public function setParameter(){
        $columns = groupTable::getInput();//特殊な形できます
        foreach($columns as $column){
            $this->parameter[$column] = $_POST[$column];
        }
        //$this->parameter['serialize_special_cooupon'] = '';
        
    }
}

class groupRelationParameter extends parameterManager
{
    public function setAdd($sid,$grid){
        parent::readyAddParameter(FALSE);//timeなし
        $this->parameter['sid'] = $sid;
        $this->parameter['grid'] = $grid;
    }

/*    public function setUpdate($sid){
        parent::readyUpdateParameter($cid);
        $this->setParameter();
    }*/

/*    public function setValidateUpdate($cid,$validate){
        parent::readyUpdateParameter($cid);
        $this->parameter['validate'] = $validate;
    }*/

/*    public function setDelete(){
        parent::readyDeleteParameter();
    }*/
    
    //checkが済んでいる前提なのでNOチェック
/*    public function setParameter(){
        global $manager_auth;
        $columns = groupTable::getInput();//特殊な形できます
        foreach($columns as $column){
            $this->parameter[$column] = $_POST[$column];
        }
        $this->parameter['sid'] = $manager_auth->sid;
    }*/

}
?>