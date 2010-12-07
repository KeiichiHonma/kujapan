<?php
require_once('fw/logicManager.php');
require_once('file/table.php');
class filesLogic extends logicManager
{
    function getRow($fid,$type = COMMON){
        $this->addSelectColumn(filesTable::get($type));
        return parent::getRow(T_FILES,$fid);
    }
}
?>