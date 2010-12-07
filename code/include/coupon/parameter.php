<?php
require_once('fw/parameterManager.php');
require_once('coupon/table.php');
class couponParameter extends parameterManager
{
    public function setAdd(){
        parent::readyAddParameter();
        $this->setParameter();
    }

    public function setUpdate($cid){
        parent::readyUpdateParameter($cid);
        $this->setParameter();
    }

    public function setValidateUpdate($cid,$validate){
        parent::readyUpdateParameter($cid);
        $this->parameter['validate'] = $validate;
    }

    public function setDelete($cid){
        parent::readyDeleteParameter($cid);
    }
    
    //checkが済んでいる前提なのでNOチェック
    public function setParameter(){
        global $manager_auth;
        $columns = couponTable::getInput();//特殊な形できます
        foreach($columns as $column){
            $this->parameter[$column] = $_POST[$column];
        }
        $this->parameter['sid'] = $manager_auth->sid;
    }
}

class couponLogParameter extends parameterManager
{
    public function setAdd($coupon,$method){
        parent::readyAddParameter();
        $this->setParameter($coupon,$method);
    }

/*    public function setUpdate($cid){
        parent::readyUpdateParameter($cid);
        $this->setParameter();
    }

    public function setValidateUpdate($cid,$validate){
        parent::readyUpdateParameter($cid);
        $this->parameter['validate'] = $validate;
    }

    public function setDelete($cid){
        parent::readyDeleteParameter($cid);
    }*/
    
    //checkが済んでいる前提なのでNOチェック
    public function setParameter($coupon,$method){
        //coupon table をコピー
        $this->parameter['cid'] = $coupon[0]['_id'];
        $this->parameter['coupon_ctime'] = $coupon[0]['col_ctime'];
        $this->parameter['coupon_mtime'] = $coupon[0]['col_mtime'];
        $columns = couponLogTable::getInput();//特殊な形できます
        foreach($columns as $column){
            $this->parameter[$column] = $coupon[0]['col_'.$column];
        }
        $this->parameter['method'] = $method;//どのような方法で記録されたか
    }
}
?>