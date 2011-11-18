<?php
require_once('fw/formManager.php');
require_once('partner/logic.php');
class partnerForm extends formManager
{
    private $form = array
    (
        array
        (
            'パートナー名'=>array( 'name'=>'pid',      'type'=>'select',  'func'=>'getPartner', 'class'=>'',                    'maxlength'=>null,'must'=>TRUE,'front'=>'','back'=>'','remarks'=>null),
            'ユーザー数'=>array(   'name'=>'number',      'type'=>'select',  'func'=>'getNumber', 'class'=>'',                    'maxlength'=>null,'must'=>TRUE,'front'=>'','back'=>'','remarks'=>null)
        )
    );
    
    public function getForm(){
        return parent::getForm($this->form,$this);
    }

    public function assignForm(){
        parent::assignForm($this->form,$this);
    }

    public function getPartner(){
        $r = array();
        
        $p_logic = new partnerLogic();
        foreach ($p_logic->partner_info as $key => $value){
            $r[$value['_id']] = $value['col_name'];
        }
        return $r;
    }

    public function getNumber(){
        return array('100'=>100,'200'=>200,'300'=>300);
    }
}
?>