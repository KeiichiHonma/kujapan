<?php
require_once('fw/handleManager.php');
require_once('news/parameter.php');

/*一度、投稿したものは原則として削除・編集ができません。
変更、削除できるのはadminだけです。*/
class newsHandle extends handleManager
{
    public $parameter;
    
    function __construct(){
        $this->parameter = new newsParameter();
    }
    
    public function addRow(){
        $this->parameter->setAdd();
        //parent::addDebug(T_NEWS,$this->parameter);
        return parent::addRow(T_NEWS,$this->parameter);
    }
    
    //以下adminだけの権限
    public function updateRow($msid){
        $this->parameter->setUpdate($msid);
        return parent::updateRow(T_NEWS,$this->parameter);
    }


    public function deleteRow($msid){
        $this->parameter->setDelete($msid);
        return parent::deleteRow(T_NEWS,$this->parameter);
    }

}
?>
