<?php
require_once('fw/parameterManager.php');
require_once('news/table.php');
class newsParameter extends parameterManager
{
    public $target = array
    (
        TARGET_ALL=>'全て',
        TARGET_USER=>'ユーザー向け',
        TARGET_BUY_BEFORE=>'一般向け'
    );
    
    public function setAdd(){
        parent::readyAddParameter();
        $this->setParameter();
    }

    public function setUpdate($nid){
        parent::readyUpdateParameter($nid);
        $this->setParameter();
    }
    
    public function setDelete($nid){
        parent::readyDeleteParameter($nid);
    }

    //checkが済んでいる前提なのでNOチェック
    public function setParameter(){
        $columns = newsTable::getInput();//特殊な形できます
        foreach($columns as $column){
            $this->parameter[$column] = $_POST[$column];
        }
    }
}
?>