<?php
require_once('fw/handleManager.php');
require_once('group/parameter.php');
class groupHandle extends handleManager
{
    public $parameter;
    
    function __construct(){
        $this->parameter = new groupParameter();
    }
    
    public function addRow(){
        $this->parameter->setAdd();
        //$this->setDebug();
        return parent::addRow(T_GROUP,$this->parameter);
    }

    public function updateRow($grid){
        $this->parameter->setUpdate($grid);
        return parent::updateRow(T_GROUP,$this->parameter);
    }

    public function deleteRow($grid){
        $this->parameter->setDelete($grid);
        return parent::deleteRow(T_GROUP,$this->parameter);
    }

    public function assignCoupon($grid,$new_cid){
        $this->parameter->setSerializeSpecialCoouponUpdate($grid,$new_cid);
        return parent::updateRow(T_GROUP,$this->parameter);
    }
}

class groupRelationHandle extends handleManager
{
    public $parameter;
    
    function __construct(){
        $this->parameter = new groupRelationParameter();
    }
    
    public function addRow($sid,$grid){
        $this->parameter->setAdd($sid,$grid);
        //$this->setDebug();
        return parent::addRow(T_GROUP_RELATION,$this->parameter);
    }

    public function updateRow($sid,$grid){
        $this->parameter->setUpdate($sid,$grid);
        return parent::updateRow(T_GROUP_RELATION,$this->parameter);
    }

    public function deleteRow($pair){
        //$this->parameter->setDelete($grrid);
        return parent::deleteSpecialRow(T_GROUP_RELATION,$pair);
    }
    
    public function assignGroup($old_grid,$new_grid){
        global $manager_auth;
        $drop_list = array();
        
        //delete add 判断
        if($old_grid !== FALSE){
            foreach ($old_grid as $key => $grid){
                if(isset($new_grid) && FALSE !== $index = array_search($grid,$new_grid)){
                    //維持するグループ
                    unset($new_grid[$index]);//追加リストから除去
                }else{
                    //外れるグループ
                    $drop_list[] = $grid;
                }
            }
        }
        //追加処理
        if(count($new_grid) > 0){
            foreach ($new_grid as $key => $grid){
                $this->addRow($manager_auth->sid,$grid);
            }
        }
        
        //削除処理
        if(count($drop_list) > 0){
            foreach ($drop_list as $key => $grid){
                $this->deleteRow(array('col_sid'=>$manager_auth->sid,'col_grid'=>$grid));
            }
        }
    }
}
?>
