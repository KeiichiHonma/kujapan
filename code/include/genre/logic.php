<?php
require_once('fw/logicManager.php');
require_once('genre/table.php');
class genreLogic extends logicManager
{
    public $genre_info = null;
    public $isSystem = FALSE;
    public $isLocale = FALSE;
    
    function __construct($isSystem = FALSE){
        $this->isSystem = $isSystem;
        if(!$this->isSystem) $this->isLocale = TRUE;//TRUEの場合LOCALEの変数が必須
        
        $this->setIndexColumn(DATABASE_OID_NAME);//index入れ替え
        $this->genre_info = $this->getResult();
    }

    function get($gid){
        return (array_key_exists($gid,$this->genre_info) ? $this->genre_info[$gid] : FALSE);
    }

    function getResult($type = COMMON,$alias = null){
        $this->addSelectColumn($this->isLocale ? genreTable::getLocale($type) : genreTable::get($type),$alias);
        return parent::getResult(T_GENRE,$alias);
    }

    function getRow($id){
        $this->addSelectColumn($this->isLocale ? genreTable::getLocale($type) : genreTable::get($type));
        return parent::getRow(T_GENRE,$id);
    }
}
?>