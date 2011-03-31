<?php
require_once('fw/logicManager.php');
require_once('shop/table.php');
require_once('file/table.php');

class shopLogic extends logicManager
{
    public $isSystem = FALSE;
    public $isLocale = FALSE;
    
    function __construct($isSystem = FALSE){
        $this->isSystem = $isSystem;
        if(!$this->isSystem) $this->isLocale = TRUE;//TRUEの場合LOCALEの変数が必須
    }

    protected function getResult($table,$alias = null){
        return parent::getResult($table,$alias);
    }

    private function validateConditionForShop($alias = null){
        if(!$this->isSystem) $this->validateCondition($alias);
    }

    private function setShopCondition($img_type = 'col_face'){
        $this->makeFileJoin('SHOP',$img_type);
        $this->validateConditionForShop(A_SHOP);
    }

    //core
    protected function getCoreShop($from = 0,$to = FIRSTSP,$order = null){
        $this->setIndexColumn('shop_id');//index入れ替え
        $this->addSelectColumn($this->isLocale ? shopTable::getLocaleAlias() : shopTable::getAlias());
        $this->setShopCondition();
        if(!is_null($order)){
            $this->addOrderColumn(A_SHOP.'.'.$order['column'],$order['desc_asc']);
        }else{
            $this->addOrderColumn(A_SHOP.'._id',DATABASE_DESC);//数字の小さい方が一番下にくる仕様
        }
        $this->setFound();
        if(!is_null($from) && !is_null($to)) $this->limit($from,$to);
        return parent::getResult(T_SHOP,A_SHOP);
    }

    public function getOneShopForMID($mid,$type = COMMON){
        $this->addSelectColumn($this->isLocale ? shopTable::getLocale($type) : shopTable::get($type));
        $this->setCond('col_mid',$mid);
        $this->validateConditionForShop();
        //return parent::getDebug(T_SHOP);
        return parent::getResult(T_SHOP);
    }

    //sid,midの両方に合致した学校のみ
    public function getOneShopForSystem($sid,$mid,$type = COMMON){
        $this->addSelectColumn($this->isLocale ? shopTable::getLocale($type) : shopTable::get($type));
        $this->setCond('_id',$sid);
        $this->setCond('col_mid',$mid);
        $this->validateConditionForShop();
        //return parent::getDebug(T_SHOP);
        return parent::getResult(T_SHOP);
    }

    function getShop($from = 0,$to = FIRSTSP,$order = null){
        //return parent::getDebug(T_SHOP);
        return self::getCoreShop($from,$to,$order);
    }

    //エリアに紐づく学校一覧
    public function getAreaShop($aid,$from = 0,$to = FIRSTSP,$order = null){
        $this->setCondAlias('col_aid',$aid,A_SHOP_HUB);
        return $this->getCoreShop($from,$to,$order);
    }

    //サブエリアに紐づく学校一覧
    public function getSubAreaShop($said,$from = 0,$to = FIRSTSP,$order = null){
        $this->setCondAlias('col_said',$said,A_SHOP_HUB);
        return $this->getCoreShop($from,$to,$order);
    }

    public function getOneShop($sid,$type = COMMON){
        $this->addSelectColumn($this->isLocale ? shopTable::getLocaleAlias($type) : shopTable::getAlias($type));
        $this->setCondAlias('_id',$sid,A_SHOP);
        $this->validateConditionForShop(A_SHOP);
        $this->makeFileJoin('SHOP','col_face');
        //return parent::getDebug(T_SHOP);
        return parent::getResult(T_SHOP,A_SHOP);
    }

    //indexのバナー
    public function getIndexShop($sid_array,$from = 0,$to = FIRSTSP,$order = null){
        foreach ($sid_array as $key => $sid){
            $this->setOrCondAlias('_id',$sid,A_SHOP);
        }
        return $this->getCoreShop($from,$to,$order);
    }
}

class shopItemLogic extends logicManager
{
    public $isSystem = FALSE;
    public $isLocale = FALSE;
    
    function __construct($isSystem = FALSE){
        $this->isSystem = $isSystem;
        if(!$this->isSystem) $this->isLocale = TRUE;//TRUEの場合LOCALEの変数が必須
    }

    //自由アイテム系
    //fileも一緒に
    public function getOneShopItem($siid,$method = SHOP_TYPE_PRODUCT,$type = COMMON){
        $this->addSelectColumn($this->isLocale ? shopItemTable::getLocaleAlias($type) : shopItemTable::getAlias($type));
        //$this->setCondAlias('_id',$siid,A_SHOP_ITEM);
        $this->setCondAlias('_id',$siid,A_SHOP_ITEM);
        $this->setCondAlias('col_type',$method,A_SHOP_ITEM);
        $this->makeFileJoin('SHOP_ITEM');
        //return parent::getDebug(T_SHOP_ITEM,A_SHOP_ITEM);
        return parent::getResult(T_SHOP_ITEM,A_SHOP_ITEM);
    }

    //指定したアイテムがログイン学校のものであるか
    public function checkOwner($siid){
        global $manager_auth;
        $this->addSelectColumn(shopItemTable::get(MINIMUM));
        $this->setCond('_id',$siid);
        $this->setCond('col_sid',$manager_auth->sid);
        parent::getResult(T_SHOP_ITEM);
        return $this->intResultRows == 0 ? FALSE : TRUE;
    }
    
    //core
    protected function getCoreShopItem($from = 0,$to = FIRSTSP,$order = null){
        $this->addSelectColumn($this->isLocale ? shopItemTable::getLocaleAlias() : shopItemTable::getAlias());
        $this->makeFileJoin('SHOP_ITEM');
        if(!is_null($order)){
            $this->addOrderColumn($order['column'],$order['desc_asc']);
        }else{
            $this->addOrderColumn(A_SHOP_ITEM.'.col_ctime',DATABASE_ASC);
        }
        $this->setFound();
        if(!is_null($from) && !is_null($to)) $this->limit($from,$to);
        //return parent::getDebug(T_SHOP_ITEM,A_SHOP_ITEM);
        return parent::getResult(T_SHOP_ITEM,A_SHOP_ITEM);
    }
    
    //システム用
    public function getItem($from = 0,$to = FIRSTSP,$types){
        if(is_array($types)){
            foreach ($types as $key => $value){
                $this->setOrCondAlias('col_type',$value,A_SHOP_ITEM);
            }
        }else{
            $this->setCondAlias('col_type',$types,A_SHOP_ITEM);
        }

        require_once('shop/table.php');
        $this->addJoin( T_SHOP, A_SHOP.'._id = '.A_SHOP_ITEM.'.col_sid',A_SHOP,DATABASE_INNER_JOIN);
        $this->addSelectColumn($this->isLocale ? shopTable::getLocaleAlias(COMMON) : shopTable::getAlias(COMMON));
        if(!$this->isSystem) $this->validateCondition(A_SHOP);

        //return parent::getDebug(T_SHOP_ITEM);
        return self::getCoreShopItem($from,$to,array('column'=>A_SHOP_ITEM.'.col_mtime','desc_asc'=>DATABASE_DESC));
    }

    public function getShopItem($sid,$types){
        $this->setCondAlias('col_sid',$sid,A_SHOP_ITEM);
        if(is_array($types)){
            foreach ($types as $key => $value){
                $this->setOrCondAlias('col_type',$value,A_SHOP_ITEM);
            }
        }else{
            $this->setCondAlias('col_type',$types,A_SHOP_ITEM);
        }
        //return parent::getDebug(T_SHOP_ITEM);
        return self::getCoreShopItem(null,null);
    }

    //店舗の全アイテム取得
    public function getAllShopItem($sid){
        $this->setCondAlias('col_sid',$sid,A_SHOP_ITEM);
        return $this->getCoreShopItem(null,null);
    }
/*
    //logo
    public function getLogoShopItem($sid,$type = COMMON){
        $this->setCondAlias('col_sid',$sid,A_SHOP_ITEM);
        $this->setCondAlias('col_type',SHOP_TYPE_LOGO,A_SHOP_ITEM);
        return $this->getCoreShopItem(null,null);
    }

    //map
    public function getMapShopItem($sid,$type = COMMON){
        $this->setCondAlias('col_sid',$sid,A_SHOP_ITEM);
        $this->setOrCondAlias('col_type',SHOP_TYPE_MAP_JA,A_SHOP_ITEM);
        $this->setOrCondAlias('col_type',SHOP_TYPE_MAP_CN,A_SHOP_ITEM);
        $this->setOrCondAlias('col_type',SHOP_TYPE_MAP_TW,A_SHOP_ITEM);
        return $this->getCoreShopItem(null,null);
    }*/

    //count core
    public function getProductCount(){
        global $manager_auth;
        $this->addCountColumn('_id','col_product_count');
        $this->setCond('col_sid',$manager_auth->sid);
        $this->setCond('col_type',SHOP_TYPE_PRODUCT);
        return parent::getCount(T_SHOP_ITEM,'col_product_count');
    }
    
    public function getGalleryCount(){
        global $manager_auth;
        $this->addCountColumn('_id','col_gallery_count');
        $this->setCond('col_sid',$manager_auth->sid);
        $this->setCond('col_type',SHOP_TYPE_GALLERY);
        return parent::getCount(T_SHOP_ITEM,'col_gallery_count');
    }
}
?>