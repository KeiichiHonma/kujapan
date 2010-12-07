<?php
require_once('fw/logicManager.php');
require_once('group/table.php');
class groupLogic extends logicManager
{
    //public $group_info = null;
    public $isSystem = FALSE;
    public $isLocale = FALSE;
    
    function __construct($isSystem = FALSE){
        $this->isSystem = $isSystem;
        if(!$this->isSystem) $this->isLocale = TRUE;//TRUEの場合LOCALEの変数が必須
    }

    private function makeRelationJoin($type = COMMON){
        $this->addJoin( T_GROUP_RELATION, A_GROUP_RELATION.'.col_grid = '.A_GROUP.'._id',A_GROUP_RELATION,DATABASE_INNER_JOIN);
        $this->addSelectColumn(groupRelationTable::getAlias($type));
    }

    //core
    protected function getCoreGroup($from = 0,$to = FIRSTSP,$order = null){
        $this->setIndexColumn('group_id');//index入れ替え
        $this->addSelectColumn($this->isLocale ? groupTable::getLocaleAlias() : groupTable::getAlias());
        if(!is_null($order)){
            $this->addOrderColumn(A_GROUP.'.'.$order['column'],$order['desc_asc']);
        }
        $this->setFound();
        if(!is_null($from) && !is_null($to)) $this->limit($from,$to);
        return parent::getResult(T_GROUP,A_GROUP);
    }

    function get($grid){
        return (array_key_exists($grid,$this->group_info) ? $this->group_info[$grid] : FALSE);
    }

    function getResult($type = COMMON,$alias = null){
        $this->addSelectColumn($this->isLocale ? groupTable::getLocale($type) : groupTable::get($type),$alias);
        return parent::getResult(T_GROUP,$alias);
    }

    function getRow($grid,$type = COMMON){
        $this->addSelectColumn($this->isLocale ? groupTable::getLocale($type) : groupTable::get($type));
        return parent::getRow(T_GROUP,$grid);
    }

    //グループ取得
    public function getGroup($from = null,$to = null,$order = null){
        return $this->getCoreGroup($from,$to,$order);
    }

    //店舗の所属グループ取得
    public function getShopGroup($sid,$from = null,$to = null,$order = null){
        $this->makeRelationJoin();
        $this->setCondAlias('col_sid',$sid,A_GROUP_RELATION);
        return $this->getCoreGroup($from,$to,$order);
    }
}
?>