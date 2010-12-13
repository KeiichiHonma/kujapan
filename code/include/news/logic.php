<?php
require_once('fw/logicManager.php');
require_once('news/table.php');
class newsLogic extends logicManager
{
    public $isSystem = FALSE;
    public $isLocale = FALSE;
    
    function __construct($isSystem = FALSE){
        $this->isSystem = $isSystem;
        if(!$this->isSystem) $this->isLocale = TRUE;//TRUEの場合LOCALEの変数が必須
    }
    
    //条件なし
    public function getOneNews($nid,$type = COMMON){
        $this->addSelectColumn($this->isLocale ? newsTable::getLocale($type) : newsTable::get($type));
        $this->setCond('_id',$nid);
        //return parent::getDebug(T_NEWS);
        return parent::getResult(T_NEWS);
    }

    public function getOneAllNews($nid,$type = COMMON){
        $this->addSelectColumn($this->isLocale ? newsTable::getLocale($type) : newsTable::get($type));
        $this->setCond('_id',$nid);
        $this->setAllTargetCond();
        //return parent::getDebug(T_NEWS);
        return parent::getResult(T_NEWS);
    }

    public function getOneUserNews($nid,$type = COMMON){
        $this->addSelectColumn($this->isLocale ? newsTable::getLocale($type) : newsTable::get($type));
        $this->setCond('_id',$nid);
        $this->setUserTargetCond();
        //return parent::getDebug(T_NEWS);
        return parent::getResult(T_NEWS);
    }

    public function getOneBuyBeforeNews($nid,$type = COMMON){
        $this->addSelectColumn($this->isLocale ? newsTable::getLocale($type) : newsTable::get($type));
        $this->setCond('_id',$nid);
        $this->setBuyBeforeTargetCond();
        //return parent::getDebug(T_NEWS);
        return parent::getResult(T_NEWS);
    }
    
    //core
    protected function getCoreNews($from = 0,$to = FIRSTSP,$order = null){
        //$this->addSelectColumn(newsTable::get());
        $this->addSelectColumn($this->isLocale ? newsTable::getLocale() : newsTable::get());
        if(!is_null($order)){
            $this->addOrderColumn($order['column'],$order['desc_asc']);
        }else{
            $this->addOrderColumn('col_date',DATABASE_DESC);//開始が遅い順
            $this->addOrderColumn('_id',DATABASE_DESC);//開始が遅い順
        }
        $this->setFound();
        $this->limit($from,$to);
        //return parent::getDebug(T_NEWS);
        return parent::getResult(T_NEWS);
    }

    //条件
    private function setAllTargetCond(){
        $this->setOrCond('col_target',TARGET_ALL);
        $this->setOrCond('col_target',TARGET_BUY_BEFORE);
        $this->setOrCond('col_target',TARGET_USER);
    }
    
    private function setBuyBeforeTargetCond(){
        $this->setOrCond('col_target',TARGET_BUY_BEFORE);
        $this->setOrCond('col_target',TARGET_ALL);
    }

    protected function setUserTargetCond(){
        $this->setOrCond('col_target',TARGET_USER);
        $this->setOrCond('col_target',TARGET_ALL);
    }

    function getAllNews($from = 0,$to = FIRSTSP,$order = null){
        $time = time();
        //$this->setAllTargetCond();
        $this->setCond('col_from',$time,'<=');
        $this->setCond('col_to',$time,'>=');
        return self::getCoreNews($from,$to,$order);
    }

    function getUserNews($from = 0,$to = FIRSTSP,$order = null){
        $time = time();
        $this->setUserTargetCond();
        $this->setCond('col_from',$time,'<=');
        $this->setCond('col_to',$time,'>=');
        return self::getCoreNews($from,$to,$order);
    }

    function getBuyBeforeNews($from = 0,$to = FIRSTSP,$order = null){
        $time = time();
        $this->setBuyBeforeTargetCond();
        $this->setCond('col_from',$time,'<=');
        $this->setCond('col_to',$time,'>=');
        return self::getCoreNews($from,$to,$order);
    }

    public function getAllNewsForsystem($from = 0,$to = FIRSTSP,$order = null){
        $this->addOrderColumn('col_mtime',DATABASE_DESC);
        return self::getCoreNews($from,$to,$order);
    }
}
?>