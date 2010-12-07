<?php
require_once('fw/logicManager.php');
require_once('area/table.php');
class areaLogic extends logicManager
{
    public $area_info = null;
    public $isSystem = FALSE;
    public $isLocale = FALSE;
    
    function __construct($isSystem = FALSE){
        $this->isSystem = $isSystem;
        if(!$this->isSystem) $this->isLocale = TRUE;//TRUEの場合LOCALEの変数が必須
        
        $this->setIndexColumn(DATABASE_OID_NAME);//index入れ替え
        $this->area_info = $this->getResult();
    }

    function get($aid){
        return (array_key_exists($aid,$this->area_info) ? $this->area_info[$aid] : FALSE);
    }

    function getResult($type = COMMON,$alias = null){
        $this->addSelectColumn($this->isLocale ? areaTable::getLocale($type) : areaTable::get($type),$alias);
        return parent::getResult(T_AREA,$alias);
    }

    function getRow($id){
        $this->addSelectColumn($this->isLocale ? areaTable::getLocale($type) : areaTable::get($type));
        return parent::getRow(T_AREA,$id);
    }
}
?>