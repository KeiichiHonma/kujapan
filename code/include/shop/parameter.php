<?php
require_once('fw/parameterManager.php');
require_once('shop/table.php');
class shopParameter extends parameterManager
{
    public function setAdd($mid){
        parent::readyAddParameter();
        $this->setParameter($mid);
    }

    //ユーザー登録時の情報。空及び無効状態で
    public function setAddForManager($mid,$name){
        parent::readyAddParameter();
        $columns = shopTable::getInput();//特殊な形できます
        foreach($columns as $column){
            if($column == 'name_ja'){
                $this->parameter[$column] = $name;
            }else{
                $this->parameter[$column] = '';
            }
        }
        $this->parameter['mid'] = $mid;
        //$this->parameter['index'] = $index;
        $this->parameter['validate'] = STATUS_MANAGER_OFF;//登録時は表示させない
    }

    public function setUpdate($mid){
        global $manager_auth;
        parent::readyUpdateParameter($manager_auth->sid);
        $this->setParameter($mid);
    }

    public function setProfileUpdate(){
        global $manager_auth;
        parent::readyUpdateParameter($manager_auth->sid);
        $this->setProfileParameter();
    }

    //feature serialize
    public function setSettingUpdate($serialize,$key,$array){
        global $manager_auth;
        parent::readyUpdateParameter($manager_auth->sid);
        $setting = unserialize($serialize);
        if(!isset($setting[$key])) $setting[$key] = array();
        $setting[$key] = $array;//feid
        asort($setting[$key]);
        $this->parameter['setting'] = serialize($setting);
    }

/*    public function setLogoUpdate($fid){
        global $manager_auth;
        parent::readyUpdateParameter($manager_auth->sid);
        $this->setLogoParameter($fid);
    }*/

    public function setFaceUpdate($fid){
        global $manager_auth;
        parent::readyUpdateParameter($manager_auth->sid);
        $this->setFaceParameter($fid);
    }

    public function setValidateUpdate($sid,$validate){
        parent::readyUpdateParameter($sid);
        $this->parameter['validate'] = $validate;
    }

    public function setDelete(){
        global $manager_auth;
        parent::readyDeleteParameter($manager_auth->sid);
    }
    
    //checkが済んでいる前提なのでNOチェック
    public function setParameter($mid){
        $columns = shopTable::getInput();//特殊な形できます
        foreach($columns as $column){
            $this->parameter[$column] = $_POST[$column];
        }
        $this->parameter['mid'] = $mid;
    }
    
    //Profile
    public function setProfileParameter(){
        $columns = shopTable::getProfile();//特殊な形できます
        foreach($columns as $column){
            $this->parameter[$column] = $_POST[$column];
        }
    }

    //Logo
    public function setLogoParameter($fid){
        $this->parameter['logo'] = $fid;
    }

    //Face
    public function setFaceParameter($fid){
        $this->parameter['face'] = $fid;
    }

    //index
    public function setIndexUpdate($sid,$index){
        parent::readyUpdateParameter($sid);
        $this->parameter['index'] = $index;
    }
}

class shopItemParameter extends parameterManager
{
    public function setAdd($type,$fid){
        parent::readyAddParameter();
        $this->setParameter($type,$fid);
    }

    public function setUpdate($siid,$type,$fid){
        parent::readyUpdateParameter($siid);
        $this->setParameter($type,$fid);
    }

    public function setFileIdUpdate($siid,$fid){
        parent::readyUpdateParameter($siid);
        $this->parameter['fid'] = $fid;
    }

    public function setDelete($siid){
        parent::readyDeleteParameter($siid);
    }

    //checkが済んでいる前提なのでNOチェック
    public function setParameter($type,$fid){
        global $manager_auth;
        $columns = shopItemTable::getInput();//特殊な形できます
        foreach($columns as $column){
            $this->parameter[$column] = $_POST[$column];
        }
        $this->parameter['sid'] = $manager_auth->sid;
        if(!is_null($fid)) $this->parameter['fid'] = $fid;//テキストのみの更新
        $this->parameter['type'] = $type;
    }
}
?>