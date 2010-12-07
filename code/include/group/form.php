<?php
require_once('fw/formManager.php');
//coupon/////////////////////////////////////////////////////////////////

class groupForm extends formManager
{
    private $form = array
    (
        'グループ情報'=>array
        (
            'グループ名（日本語）'=>array(            'name'=>'name_ja',               'type'=>'text','func'=>null,  'class'=>'form_text_common','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'', 'remarks'=>null),
            'グループ名（簡体字）'=>array(            'name'=>'name_cn',               'type'=>'text','func'=>null,  'class'=>'form_text_common','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'', 'remarks'=>null),
            'グループ名（繁体字）'=>array(            'name'=>'name_tw',               'type'=>'text','func'=>null,  'class'=>'form_text_common','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'', 'remarks'=>null),
            'テンプレート名'=>array(                  'name'=>'template_name',         'type'=>'text','func'=>null,  'class'=>'form_text_common','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'', 'remarks'=>null)
        )
    );

    //get
    public function getForm(){
        return parent::getForm($this->form,$this);
    }
    //assign
    public function assignForm(){
        parent::assignForm($this->form,$this);
    }
}
?>