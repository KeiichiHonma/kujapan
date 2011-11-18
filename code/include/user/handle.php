<?php
require_once('fw/handleManager.php');
require_once('user/parameter.php');
class userHandle extends handleManager
{
    public $parameter;
    
    function __construct(){
        $this->parameter = new userParameter();
    }
    
    public function addRow($alipay_param){
        $this->parameter->setAdd($alipay_param);
        //return parent::addDebug(T_USER,$this->parameter);
        return parent::addRow(T_USER,$this->parameter);
    }

    public function updateRow($uid){
        $this->parameter->setUpdate($uid);
        return parent::updateRow(T_USER,$this->parameter);
    }

    public function updateResetRow($uid){
        $this->parameter->setResetUpdate($uid);
        return parent::updateRow(T_USER,$this->parameter);
    }

    public function updateAccountRow($uid,$pid = 0,$isFree = FALSE){
        $this->parameter->setAccountUpdate($uid,$pid,$isFree);
        //$this->setDebug();
        return parent::updateRow(T_USER,$this->parameter);
    }

    //アカウント仮登録⇒本登録
    public function updateValidateRow($uid){
        $this->parameter->setCustomerUpdate($uid);
        //$this->setDebug();
        return parent::updateRow(T_USER,$this->parameter);
    }

    //アカウント継続再発行
    public function republishContinueRow($uid){
        $this->parameter->setRepublishContinue($uid);
        //$this->setDebug();
        return parent::updateRow(T_USER,$this->parameter);
    }

    //アカウントリセット再発行
    public function republishResetRow($uid){
        $this->parameter->setRepublishReset($uid);
        //$this->setDebug();
        return parent::updateRow(T_USER,$this->parameter);
    }

    //有効化
/*    public function updateValidateRow($uid,$validate = 0){
        $this->parameter->setValidateUpdate($uid,$validate);
        //$this->setDebug();
        return parent::updateRow(T_USER,$this->parameter);
    }*/
    
    //user情報は個別に更新される
/*    public function updatePasswordRow($uid = null){
        $this->parameter->setPasswordUpdate($uid);
        //$this->setDebug();
        return parent::updateRow(T_USER,$this->parameter);
    }*/

/*    public function updateCustomerRow(){
        $this->parameter->setCustomerUpdate();
        //$this->setDebug();
        return parent::updateRow(T_USER,$this->parameter);
    }*/

    public function updateLastLoginRow($uid){
        $this->parameter->setLastLoginUpdate($uid);
        //$this->setDebug();
        return parent::updateRow(T_USER,$this->parameter);
    }

    public function deleteRow(){
        return parent::deleteRow(T_USER,$this->parameter);
    }

}

class autoLoginHandle extends handleManager
{
    public $parameter;
    
    function __construct(){
        $this->parameter = new autoLoginParameter();
    }
    
    public function addRow($uid){
        $this->parameter->setAdd($uid);
        return parent::addRow(T_AUTO,$this->parameter);
    }

    public function updateRow(){
        return parent::updateRow(T_AUTO,$this->parameter);
    }

    public function deleteRow(){
        return parent::deleteRow(T_AUTO,$this->parameter);
    }

    public function deletePassport($passport){
        $this->addCondition('col_passport = \''.$passport.'\'');
        $query = $this->delete(T_AUTO);
        $this->execute($query);
    }

}

class tmpRegistHandle extends handleManager
{
    public $parameter;
    
    function __construct(){
        $this->parameter = new tmpRegistParameter();
    }
    
    public function addRow($uid,$customer_no,$account,$password,$pid = 0){
        $this->parameter->setAdd($uid,$customer_no,$account,$password,$pid);
        return parent::addRow(T_REGIST,$this->parameter);
    }

    public function rollbackRow($trid,$account,$password){
        $this->parameter->setRollbackUpdate($trid,$account,$password);
        
        //return parent::updateDebug(T_REGIST,$this->parameter);
        return parent::updateRow(T_REGIST,$this->parameter);
    }

    public function updateStatusPaymentRow($trid){
        $this->parameter->setStatusPaymentUpdate($trid);
        return parent::updateRow(T_REGIST,$this->parameter);
    }

    //有効化
    public function updateStatusFinishRow($trid){
        $this->parameter->setStatusFinishUpdate($trid);
        return parent::updateRow(T_REGIST,$this->parameter);
    }

    public function updateRow(){
        return parent::updateRow(T_REGIST,$parameter);
    }

    public function deleteRow(){
        return parent::deleteRow(T_REGIST,$parameter);
    }

}
?>
