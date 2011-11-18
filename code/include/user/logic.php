<?php
require_once('fw/logicManager.php');
require_once('user/table.php');
define('VALIDATE_TIME_WEEK',  604800);//1week
define('VALIDATE_TIME_DAY',  86400);//1day
define('VALIDATE_TIME_FOUR_DAY',  345600);//4day

define('VALIDATE_TIME_HOUR',  3600);//1day
class userLogic extends logicManager
{
    function getRow($id,$type = COMMON){
        $this->addSelectColumn(userTable::get($type));
        $this->validateCondition();
        return parent::getRow(T_USER,$id);
    }

    function getUser($uid,$type = COMMON){
        $this->addSelectColumn(userTable::get($type));
        $this->setCond('_id',$uid);
        $this->validateCondition();
        return parent::getResult(T_USER);
    }

    //validate無視。メンバー情報の取得で
    function getNotValidateUser($uid,$type = COMMON){
        $this->addSelectColumn(userTable::get($type));
        $this->setCond('_id',$uid);
        return parent::getResult(T_USER);
    }

    function getValidateUser($type = COMMON){
        $this->addSelectColumn(userTable::get($type));
        $this->validateCondition();
        return parent::getResult(T_USER,A_USER);
    }

    //auth用.ログイン用のメールアドレス選択を考慮した上でリターン
    public function getRowForAuth($login_name,$type = COMMON){
        $user = $this->getRowLoginName($login_name,$type);
        if(!$user) return FALSE;
        //ログインタイプがPCだった
        if(strcasecmp($user[0]['col_account'],$login_name) == 0) return $user;
        return FALSE;
    }

    public function getRowLoginName($login_name,$type = COMMON){
        $this->addSelectColumn(userTable::get($type));
        $this->addCondition('(col_account = \''.$login_name.'\')');
        $this->validateCondition();
        return parent::getResult(T_USER);
    }

    //存在チェック.有効化フラグがNGでも存在していたらだめ
    public function isLoginName($login_name,$isRemind = FALSE){
        $this->addSelectColumn(userTable::get(MINIMUM));
        if($isRemind){
            //$time = time() - VALIDATE_TIME_DAY;//1日前
            $time = time() - VALIDATE_TIME_WEEK;//1週間
            $this->addCondition('(col_account = \''.$login_name.'\' AND col_validate = 0) OR (col_account = \''.$login_name.'\' AND col_validate = 1 AND col_ctime >='.$time.')');
        }else{
            $this->addCondition('col_account = \''.$login_name.'\' AND col_validate = 0');
        }
        return parent::getResult(T_USER);
    }
}

class userSystemLogic extends logicManager
{
    protected function getCoreUser($from = 0,$to = FIRSTSP,$order = null){
        $this->addSelectColumn(userTable::get());
        if(!is_null($order)){
            $this->addOrderColumn($order['column'],$order['desc_asc']);
        }else{
            $order = array('column'=>'col_ctime','desc_asc'=>DATABASE_DESC);
            $this->addOrderColumn($order['column'],$order['desc_asc']);
        }
        $this->limit($from,$to);
        $this->setFound();
        return parent::getResult(T_USER);
    }

    //count core
    protected function getCoreCount(){
        $this->addCountColumn('_id','col_user_count');
        return parent::getCount(T_USER,'col_user_count');
    }

    function getOneUser($uid){
        $this->setCond('_id',$uid);
        return $this->getCoreUser(0,1,null);
    }

    function getUser($from = 0,$to = FIRSTSP,$order = null){
        return $this->getCoreUser($from,$to,$order);
    }

    public function getValidateUserCount(){
        $this->validateCondition();
        //$this->setDebug();
        return self::getCoreCount();
    }

    public function getActiveUserCount($time,$isMobile = FALSE){
        $this->setCond('col_last_login',$time,'>=');
        $this->validateCondition();
        //$this->setDebug();
        return self::getCoreCount();
    }
    
    public $keyword;
    
    public function getSearch($keyword,$from = 0,$to = FIRSTSP,$order = null){
        $this->keyword = trim($keyword);
        if(strlen($this->keyword) == 0) return FALSE;
        //完全一致
        $this->setOrCond('col_customer_no',$this->keyword);
        $this->setOrCond('col_account',$this->keyword);
        $this->setOrCond('col_buyer_id',$this->keyword);
        $this->setOrCond('col_trade_no',$this->keyword);
        return $this->getCoreUser($from,$to,$order);
    }

    private function makeSearchCondition($keyword){
        $condition = '';
        $keyword = trim($keyword);//全角スペースを半角にしてからtrim
        if(strlen($keyword) == 0) return FALSE;
        
/*        $words = explode(' ',$keyword);
        $toPutComma = FALSE;
        foreach( $this->words as $word )
        {
            $b_query = '(';
            $escape_word = $this->escapeForLike($word);//\,%,_等々をエスケープしまくり
            $b_query .= A_BULLETIN.'.col_title LIKE \'%'.$escape_word.'%\' OR ';
            $b_query .= A_BULLETIN.'.col_bulletin LIKE \'%'.$escape_word.'%\' OR ';
            $b_query .= A_COMMENTS.'.col_comment LIKE \'%'.$escape_word.'%\'';
            $b_query .= ')';
            $this->and[] = $b_query;
            if ( $toPutComma ) {
                $this->words_commma .= ',';
            } else {
                $toPutComma = TRUE;
            }
            $this->words_commma .= htmlspecialchars($word);
        }*/
    }

}

class autoLoginLogic extends logicManager
{
    function getRow($id,$type = COMMON){
        $this->addSelectColumn(tmpRegistTable::get($type));
        $this->validateCondition();
        return parent::getRow(T_REGIST,$id);
    }
    
    //有効期限内のPASSPORT値が存在するか
    function getVaridateRow($passport,$expire,$type = COMMON){
        $this->addSelectColumn(autoLoginTable::get($type));
        $this->setCond('col_passport',$passport);
        $validateTime = time() - $expire;
        $this->setCond('col_ctime',$validateTime,'>=');
        //return parent::getDebug(T_AUTO);
        return parent::getResult(T_AUTO);
    }

    //指定のuidが存在するか
    function getUser($uid,$type = COMMON){
        $this->addSelectColumn(autoLoginTable::get($type));
        $this->setCond('col_uid',$uid);
        //return parent::getDebug(T_AUTO);
        return parent::getResult(T_AUTO);
    }

}

class tmpRegistLogic extends logicManager
{
    function getRow($id,$type = COMMON){
        $this->addSelectColumn(tmpRegistTable::get($type));
        return parent::getRow(T_REGIST,$id);
    }

    //uid指定で情報を取得
    function getUserTmpRegist($uid,$type = COMMON){
        $this->addSelectColumn(tmpRegistTable::get($type));
        $this->setCond('col_uid',$uid);
        //$this->setDebug();
        return parent::getResult(T_REGIST);
    }

    //指定のRAND値が存在するか
    function getTmpRegist($rand,$type = COMMON){
        $this->addSelectColumn(tmpRegistTable::get($type));
        $this->setCond('col_rand',$rand);
        
        //$time = time() - VALIDATE_TIME_DAY;//1日前
        //$time = time() - VALIDATE_TIME_WEEK;//1週間
        //$this->setCond('col_ctime',$time,'>=');//1週間たっていない
        //$this->setDebug();
        return parent::getResult(T_REGIST);
    }

    //reset用指定のRAND値が存在するか
    function getTmpResetRegist($rand,$type = COMMON){
        $this->addSelectColumn(tmpRegistTable::get($type));
        $this->setCond('col_rand',$rand);
        
        //$time = time() - VALIDATE_TIME_HOUR;//1時間
        //$this->setCond('col_ctime',$time,'>=');//1時間たっていない
        //$this->setDebug();
        return parent::getResult(T_REGIST);
    }

    //指定のアカウントとパスワードのrandを取得する
    function getTmpRegistRand($account,$password,$type = COMMON){
        $this->addSelectColumn(tmpRegistTable::get($type));
        $this->setCond('col_account',$account);
        $this->setCond('col_password',$password);
        $this->setCond('col_status',REGIST_WAIT);
        //$this->setDebug();
        $r = parent::getResult(T_REGIST);
        
        return $r ? $r[0]['col_rand'] : FALSE;
    }
    
    //パートナー用CSV抽出用
    function getPartnerTmpRegist($pid,$number,$type = COMMON){
        $this->addSelectColumn(tmpRegistTable::get($type));
        $this->setCond('col_pid',$pid);

        $order = array('column'=>'_id','desc_asc'=>DATABASE_DESC);
        $this->addOrderColumn($order['column'],$order['desc_asc']);
        $this->limit(0,$number);
        //$this->setDebug();

        return parent::getResult(T_REGIST);
    }
    
    private function setAlertCond($time){
        $from = mktime(0, 0, 0, date("m",$time),date("d",$time),date("Y",$time));
        $to = mktime(23, 59, 59, date("m",$time),date("d",$time),date("Y",$time));
        
        $this->setCondAlias('col_ctime',$from,A_REGIST,'>=');
        $this->setCondAlias('col_ctime',$to,A_REGIST,'<');
    }

    public function getTodayAlert(){
        $this->setAlertCond(time() - VALIDATE_TIME_WEEK);//1週間前に登録した人がアラート対象
        return $this->getCoreEntryAlert();
    }

    public function getThreeDayAlert(){
        $this->setAlertCond(time() - VALIDATE_TIME_FOUR_DAY);//4日前に登録した人がアラート対象
        return $this->getCoreEntryAlert();
    }

}
?>