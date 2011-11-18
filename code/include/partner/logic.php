<?php
require_once('fw/logicManager.php');
require_once('partner/table.php');
class partnerLogic extends logicManager
{
    public $partner_info = null;
    public $isSystem = FALSE;
    public $isLocale = FALSE;
    
    function __construct($isSystem = FALSE){
        $this->isSystem = $isSystem;
        if(!$this->isSystem) $this->isLocale = TRUE;//TRUEの場合LOCALEの変数が必須
        
        $this->setIndexColumn(DATABASE_OID_NAME);//index入れ替え
        $this->partner_info = $this->getResult();
    }

    function get($pid){
        return (array_key_exists($pid,$this->partner_info) ? $this->partner_info[$pid] : FALSE);
    }

    function getResult($type = COMMON,$alias = null){
        $this->addSelectColumn($this->isLocale ? partnerTable::getLocale($type) : partnerTable::get($type),$alias);
        return parent::getResult(T_PARTNER,$alias);
    }

    function getRow($id){
        $this->addSelectColumn($this->isLocale ? partnerTable::getLocale($type) : partnerTable::get($type));
        return parent::getRow(T_PARTNER,$id);
    }
}
?>