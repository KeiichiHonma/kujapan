<?php
require_once('fw/logicManager.php');
require_once('feature/table.php');
class featureLogic extends logicManager
{
    public $feature_info = null;
    public $isSystem = FALSE;
    public $isLocale = FALSE;
    
    function __construct($isSystem = FALSE){
        $this->isSystem = $isSystem;
        if(!$this->isSystem) $this->isLocale = TRUE;//TRUEの場合LOCALEの変数が必須
        
        $this->setIndexColumn(DATABASE_OID_NAME);//index入れ替え
        $this->feature_info = $this->getResult();
    }

    function get($feid){
        return (array_key_exists($feid,$this->feature_info) ? $this->feature_info[$feid] : FALSE);
    }

    function getResult($type = COMMON,$alias = null){
        $this->addSelectColumn($this->isLocale ? featureTable::getLocale($type) : featureTable::get($type),$alias);
        return parent::getResult(T_FEATURE,$alias);
    }

    function getRow($id){
        $this->addSelectColumn($this->isLocale ? featureTable::getLocale($type) : featureTable::get($type));
        return parent::getRow(T_FEATURE,$id);
    }
}
?>