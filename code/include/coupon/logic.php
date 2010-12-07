<?php
require_once('fw/logicManager.php');
require_once('coupon/table.php');
require_once('file/table.php');
class couponLogic extends logicManager
{
    public $isSystem = FALSE;
    public $isLocale = FALSE;
    
    function __construct($isSystem = FALSE){
        $this->isSystem = $isSystem;
        if(!$this->isSystem) $this->isLocale = TRUE;//TRUEの場合LOCALEの変数が必須
    }

    private function makeShopJoin($type){
        require_once('shop/table.php');
        $this->addJoin( T_SHOP, A_SHOP.'._id = '.A_COUPON.'.col_sid',A_SHOP,DATABASE_INNER_JOIN);
        $this->addSelectColumn($this->isLocale ? shopTable::getLocaleAlias($type) : shopTable::getAlias($type));
        if(!$this->isSystem) $this->validateCondition(A_SHOP);
        $this->makeFileJoin('SHOP','col_face');
    }

    private function makeGroupRelationJoin(){
        require_once('group/table.php');
        $this->addJoin( T_GROUP_RELATION, A_GROUP_RELATION.'.col_sid = '.A_COUPON.'.col_sid',A_GROUP_RELATION,DATABASE_INNER_JOIN);
        $this->addSelectColumn(groupRelationTable::getAlias());
    }

    //coupon用条件
    private function setCouponCondition($alias = null){
        if(!$this->isSystem){
            $this->validateCondition($alias);
            is_null($alias) ? $this->setCond('col_validate_time',time(),'>=') : $this->setCondAlias('col_validate_time',time(),$alias,'>=');
        }
    }

    public function getOneCoupon($cid,$type = COMMON){
        $this->addSelectColumn($this->isLocale ? couponTable::getLocale($type) : couponTable::get($type));
        $this->setCond('_id',$cid);
        $this->setCouponCondition();
        //return parent::getDebug(T_COUPON);
        return parent::getResult(T_COUPON);
    }

    public function getViewCoupon($cid,$type = COMMON){
        $this->addSelectColumn($this->isLocale ? couponTable::getLocaleAlias($type) : couponTable::getAlias($type));
        $this->setCondAlias('_id',$cid,A_COUPON);
        $this->setCouponCondition(A_COUPON);
        $this->makeShopJoin($type);
        //return parent::getDebug(T_COUPON,A_COUPON);
        return parent::getResult(T_COUPON,A_COUPON);
    }

    //店舗に紐づくクーポン一覧
    public function getShopCoupon($sid,$type = COMMON){
        $this->addSelectColumn($this->isLocale ? couponTable::getLocale($type) : couponTable::get($type));
        $this->setCond('col_sid',$sid);
        $this->setCouponCondition();
        return parent::getResult(T_COUPON);
    }

    //クーポン印刷用。日本語も含めて取得
    public function getShopCouponForPrint($sid,$type = COMMON){
        $this->addSelectColumn(couponTable::get($type));
        $this->setCond('col_sid',$sid);
        $this->setCouponCondition();
        return parent::getResult(T_COUPON);
    }

    //指定したアイテムがログイン店舗のものであるか
    public function checkOwner($cid){
        global $manager_auth;
        $this->addSelectColumn(couponTable::get(MINIMUM));
        $this->setCond('_id',$cid);
        $this->setCond('col_sid',$manager_auth->sid);
        parent::getResult(T_COUPON);
        return $this->intResultRows == 0 ? FALSE : TRUE;
    }
    
    //core
    protected function getCoreCoupon($from = 0,$to = FIRSTSP,$order = null){
        $this->addSelectColumn($this->isLocale ? couponTable::getLocaleAlias() : couponTable::getAlias());
        $this->setCouponCondition(A_COUPON);
        $this->makeShopJoin(COMMON);
/*        if(!is_null($order)){
            $this->addOrderColumn($order['column'],$order['desc_asc']);
        }else{
            $this->addOrderColumn(A_COUPON.'.col_ctime',DATABASE_ASC);
        }*/
        $this->addOrderColumn(A_COUPON.'.col_discount_value',DATABASE_DESC);//割引高い順
        
        $this->setFound();
        if(!is_null($from) && !is_null($to)) $this->limit($from,$to);
        //return parent::getDebug(T_COUPON,A_COUPON);
        return parent::getResult(T_COUPON,A_COUPON);
    }

    public function getCoupon($from = 0,$to = FIRSTSP,$order = null){
        //return parent::getDebug(T_COUPON);
        return self::getCoreCoupon($from,$to,$order);
    }

    //エリアに紐づくクーポン一覧
    public function getAreaCoupon($aid,$from = 0,$to = FIRSTSP,$order = null){
        $this->setCondAlias('col_aid',$aid,A_SHOP);
        return $this->getCoreCoupon($from,$to,$order);
    }

    //ジャンルに紐づくクーポン一覧
    public function getGenreCoupon($gid,$from = 0,$to = FIRSTSP,$order = null){
        $this->setCondAlias('col_gid',$gid,A_SHOP);
        return $this->getCoreCoupon($from,$to,$order);
    }

    //グループに紐づくクーポン一覧
    public function getGroupCoupon($grid,$from = 0,$to = FIRSTSP,$order = null){
        $this->makeGroupRelationJoin();
        $this->setCondAlias('col_grid',$grid,A_GROUP_RELATION);
        return $this->getCoreCoupon($from,$to,$order);
    }

    //特集ページに表示するクーポン一覧
    public function getSpecialCoupon($grid,$special_array,$order = null){
        $this->makeGroupRelationJoin();
        $this->setCondAlias('col_grid',$grid,A_GROUP_RELATION);
        foreach ($special_array as $key => $cid){
            $this->setOrCondAlias('_id',$cid,A_COUPON);
        }
        return $this->getCoreCoupon(null,null,$order);
    }

    //値引き率系
    public function getIndexCoupon($cid_array,$from = 0,$to = FIRSTSP,$order = null){
        foreach ($cid_array as $key => $cid){
            $this->setOrCondAlias('_id',$cid,A_COUPON);
        }
        $this->setIndexColumn('coupon_id');//index入れ替え
        return $this->getCoreCoupon($from,$to,$order);
    }
    
    //core
    protected function getCoreMaxDiscountCoupon(){
        //max指定するカラムを検索
        $this->addSelectColumn($this->isLocale ? couponTable::getLocaleAlias() : couponTable::getAlias());
        $this->setCouponCondition(A_COUPON);
        $index = array_search('c.col_discount_value',$this->_select_columns[0]);
        $this->_select_columns[0][$index] = 'MAX(c.col_discount_value) AS col_discount_value';
        
        $this->makeShopJoin(COMMON);
        //if(!is_null($from) && !is_null($to)) $this->limit($from,$to);
        //return parent::getDebug(T_COUPON,A_COUPON);
        return parent::getResult(T_COUPON,A_COUPON);
    }
    
    //ジャンルの値引き率最大クーポン
    public function getMaxDiscountGenreCoupon(){
        $this->addGroupByColumn(A_SHOP.'.col_gid');
        $this->addOrderColumn(A_SHOP.'.col_gid',DATABASE_ASC);
        return $this->getCoreMaxDiscountCoupon();
    }

    //エリアの値引き率最大クーポン
    public function getMaxDiscountAreaCoupon(){
        $this->addGroupByColumn(A_SHOP.'.col_aid');
        $this->addOrderColumn(A_SHOP.'.col_aid',DATABASE_ASC);
        return $this->getCoreMaxDiscountCoupon();
    }

    //count core
    public function getCouponCount(){
        global $manager_auth;
        $this->addCountColumn('_id','col_coupon_count');
        $this->setCond('col_sid',$manager_auth->sid);
        $this->setCouponCondition();
        return parent::getCount(T_COUPON,'col_coupon_count');
    }

    /*
    指定日付より小さいクーポン一覧。つまりユーザーが見ていたクーポン
    要するにここで取得されたクーポンは変更がかかったということ。
    必ず現在表示されているクーポンと異なっている箇所がある
    逆もしかりでで取得されない可能性もある。
    */
    public function getShopCouponForLog($sid,$type = COMMON){
        $this->addSelectColumn(couponTable::get($type));
        $this->setCond('col_sid',$sid);
        $this->setCouponCondition();
        return parent::getResult(T_COUPON);
    }
}

class couponLogLogic extends logicManager
{
    /*
    指定日付より小さいクーポン一覧。つまりユーザーが見ていたクーポン
    要するにここで取得されたクーポンは変更がかかったということ。
    必ず現在表示されているクーポンと異なっている箇所がある
    逆もしかりでで取得されない可能性もある。
    */
    public function getShopCouponLog($sid,$print_time,$type = COMMON){
        //ハードコードします。申し訳ない
        $query = '
            SELECT * FROM kujapan.tab_kujapan_coupon_log AS x WHERE col_coupon_mtime=(SELECT MAX(col_coupon_mtime) FROM kujapan.tab_kujapan_coupon_log WHERE x.col_cid=col_cid AND (col_sid = '.$this->checkValueType($sid).')AND (col_coupon_mtime <= \''.$print_time.'\')AND (col_validate_time >= '.$this->checkValueType($print_time).')AND (col_validate = \''.VALIDATE_ALLOW.'\'))';
        $this->execute($query);
        return $this->intResultRows == 0 ? FALSE : $this->sqlData;
    }
}
?>