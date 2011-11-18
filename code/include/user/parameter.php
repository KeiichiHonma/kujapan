<?php
require_once('fw/parameterManager.php');
require_once('user/table.php');
define('VALIDATE_TIME',  7776000);//90days
class userParameter extends parameterManager
{
    public $customer_no;
    public $account;
    public $password;
    public $buy_time;
    public $auth;
    
    public function setAdd($alipay_param){
        $this->buy_time = time();
        parent::readyAddParameter(TRUE,$this->buy_time);
        $this->parameter['customer_no'] = '';
        $this->parameter['account'] = '';

        $this->password = $this->getRandomPassword();
        $hash = $this->static_hashPassword($this->password);
        $this->parameter['password'] = $hash['hash'];
        $this->parameter['salt'] = $hash['salt'];
        $this->parameter['given_name'] = '';//後で更新

        $this->parameter['coupon'] = null;
        $this->parameter['status'] = STATUS_USER_TMP;//仮登録
        
        foreach ($alipay_param as $name => $value){
            $this->parameter[$name] = $value['param'];
        }
        $this->parameter['last_login'] = 0;//後で更新
        $this->parameter['validate_time'] = 0;//開始はまだ
        $this->parameter['validate'] = VALIDATE_ALLOW;
    }

    private function getRandomPassword($nLengthRequired = 8){
        //$sCharList = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_';
        $sCharList = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        mt_srand();
        $sRes = '';
        for($i = 0; $i < $nLengthRequired; $i++)
            $sRes .= $sCharList{mt_rand(0, strlen($sCharList) - 1)};
        return $sRes;
    }

    private function getAuth($nLengthRequired = 5){
        $sCharList = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_';
        mt_srand();
        $sRes = '';
        for($i = 0; $i < $nLengthRequired; $i++)
            $sRes .= $sCharList{mt_rand(0, strlen($sCharList) - 1)};
        return $sRes;
    }

    //管理者のみ実行可能
    public function setUpdate($uid){
        parent::readyUpdateParameter($uid);
        $this->parameter['status'] = $_POST['status'];
        $this->parameter['given_name'] = $_POST['given_name'];
        $this->parameter['buyer_email'] = $_POST['buyer_email'];
        $this->parameter['customer_no'] = $_POST['customer_no'];
        $this->parameter['account'] = $_POST['account'];
        $this->parameter['buyer_id'] = $_POST['buyer_id'];
        $this->parameter['trade_no'] = $_POST['trade_no'];
        $this->parameter['validate'] = $_POST['validate'];
        $this->parameter['validate_time'] = $_POST['validate_time'];
    }

    //管理者のみ実行可能
    public function setResetUpdate($uid){
        parent::readyUpdateParameter($uid);
        $this->parameter['status'] = STATUS_USER_TMP;
        $this->parameter['given_name'] = '';
        $this->parameter['customer_no'] = $_POST['customer_no'];
        $this->parameter['account'] = $_POST['account'];
        $this->password = $this->getRandomPassword();
        $hash = $this->static_hashPassword($this->password);
        $this->parameter['password'] = $hash['hash'];
        $this->parameter['salt'] = $hash['salt'];
        $this->parameter['buyer_id'] = $_POST['buyer_id'];
        $this->parameter['trade_no'] = $_POST['trade_no'];
        $this->parameter['validate'] = $_POST['validate'];
        $this->parameter['validate_time'] = 0;
    }

    public function setAccountUpdate($uid,$pid = 0,$isFree = FALSE){
        parent::readyUpdateParameter($uid);//認証してない
        //$this->account = 'k'.$uid.$this->getAuth();
        $int = CUSTOMER_NO_BASE + $uid;
        if(LOCALE == 'tw'){
            $string = $isFree ? 'fn' : 'n';//.net
        }else{
            $string = $isFree ? 'fc' : 'c';//.com
        }
        $this->customer_no = $string.$int;
        $this->parameter['customer_no'] = $this->customer_no;
        $this->account = 'k'.$this->parameter['customer_no'];
        $this->parameter['account'] = $this->account;
        $this->parameter['pid'] = $pid;
    }

    public function setValidateUpdate($uid,$validate = 0){
        parent::readyUpdateParameter($uid);//認証してない
        $this->setValidateParameter($validate);
    }

    public function setMailUpdate(){
        global $user_auth;//認証されているはず
        parent::readyUpdateParameter($user_auth->uid);
        $this->setMailParameter();
    }

    public function setPasswordUpdate($uid = null){
        if(is_null($uid)){
            //変更
            global $user_auth;//認証されているはず
            $uid = $user_auth->uid;
        }else{
            //再発行
            $uid = $uid;
        }
        parent::readyUpdateParameter($uid);
        $this->setPasswordParameter();
    }

    public function setCustomerUpdate($uid){
        parent::readyUpdateParameter($uid);
        $this->setCustomerParameter();
    }

    public function setRepublishContinue($uid){
        parent::readyUpdateParameter($uid);
        $this->setRepublishContinueParameter();
    }

    public function setRepublishReset($uid){
        parent::readyUpdateParameter($uid);
        $this->setRepublishResetParameter();
    }

    public function setLastLoginUpdate($uid){
        //認証される前のため、uid直指定
        parent::readyUpdateParameter($uid);
        $this->setLastLoginParameter();
    }

    public function setDelete(){
        parent::readyDeleteParameter($user_auth->uid);
    }

    //validate
    public function setValidateParameter($validate){
        $this->parameter['validate'] = $validate;//on
    }

    //password
    public function setPasswordParameter(){
        $columns = userTable::getPassword();//特殊な形できます
        foreach($columns as $column){
            if($column == 'password'){
                $hash = $this->static_hashPassword($_POST[$column]);
                $this->parameter[$column] = $hash['hash'];
                $this->parameter['salt'] = $hash['salt'];
            }else{
                $this->parameter[$column] = $_POST[$column];
            }
        }
    }

    //customer
    public function setCustomerParameter(){
        $columns = userTable::getCustomer();//特殊な形できます
        foreach($columns as $column){
            $this->parameter[$column] = $_POST[$column];
        }
        $this->parameter['validate_time'] = $this->getValidateTerm();
        $this->parameter['status'] = STATUS_USER_REGIST;//本登録
    }

    //republish Continue
    public function setRepublishContinueParameter(){
        $this->password = $this->getRandomPassword();
        $hash = $this->static_hashPassword($this->password);
        $this->parameter['password'] = $hash['hash'];
        $this->parameter['salt'] = $hash['salt'];
    }

    //republish Continue
    public function setRepublishResetParameter(){
        $this->password = $this->getRandomPassword();
        $hash = $this->static_hashPassword($this->password);
        $this->parameter['password'] = $hash['hash'];
        $this->parameter['salt'] = $hash['salt'];
        $this->parameter['given_name'] = '';
        $this->parameter['status'] = STATUS_USER_TMP;//仮登録
        $this->parameter['validate_time'] = 0;//0に戻す
    }

    public function setLastLoginParameter(){
        $this->parameter['last_login'] = time();
    }
    
    //アカウントの有効期間
    private function getValidateTerm(){
        return time() + VALIDATE_TIME;
    }
}

class autoLoginParameter extends parameterManager
{
    public $passport;
    
    public function setAdd($uid){
        parent::readyAddParameter();
        $this->setParameter($uid);
    }
    
    public function setUpdate($alid,$uid){
        parent::readyUpdateParameter($alid);
        $this->setParameter($uid);
    }
    
    public function setDelete($alid){
        parent::readyDeleteParameter($alid);
    }
    
    private function getPassport(){
        return $this->passport;
    }

    private function setPassport(){
        $this->passport = md5(uniqid( rand(), true ) );
    }

    //checkが済んでいる前提なのでNOチェック
    public function setParameter($uid){
        $this->setPassport();
        $this->parameter['uid'] = $uid;
        $this->parameter['passport'] = $this->getPassport();
    }
}

class tmpRegistParameter extends parameterManager
{
    public $rand;
    
    public function setAdd($uid,$customer_no,$account,$password,$pid){
        parent::readyAddParameter();
        $this->setParameter($uid);
        $this->parameter['customer_no'] = $customer_no;
        $this->parameter['account'] = $account;
        $this->parameter['password'] = $password;
        $this->parameter['pid'] = $pid;
    }
    
    public function setUpdate($trid,$uid){
        parent::readyUpdateParameter($trid);
        $this->setParameter($uid);
    }

    public function setRollbackUpdate($trid,$account,$password){
        parent::readyUpdateParameter($trid);
        $this->parameter['account'] = $account;
        $this->parameter['password'] = $password;
        $this->parameter['status'] = REGIST_WAIT;//仮登録状態に戻す
    }

    public function setStatusPaymentUpdate($trid){
        parent::readyUpdateParameter($trid);//認証してない
        $this->setStatusPaymentParameter();
    }

    public function setStatusFinishUpdate($trid){
        parent::readyUpdateParameter($trid);//認証してない
        $this->setStatusFinishParameter();
    }

    public function setDelete($trid){
        parent::readyDeleteParameter($trid);
    }
    
    private function getRand(){
        $this->rand = md5(uniqid( rand(), true ) );
        return $this->rand;
    }
    
    //checkが済んでいる前提なのでNOチェック
    public function setParameter($uid){
         $this->parameter['uid'] = $uid;
         $this->parameter['rand'] = $this->getRand();
         $this->parameter['status'] = REGIST_WAIT;//仮登録
    }

    //payment
    public function setStatusPaymentParameter(){
        $this->parameter['status'] = REGIST_PAYMENT;//決済待ち
    }

    //finish
    public function setStatusFinishParameter(){
        $this->parameter['status'] = REGIST_FINISH;//完了
        $this->parameter['password'] = '';//delete
        $this->parameter['account'] = '';//delete
    }

    //wrong
    public function setStatusWrongParameter(){
        $this->parameter['status'] = REGIST_WRONG;//決済待ち
    }
}
?>