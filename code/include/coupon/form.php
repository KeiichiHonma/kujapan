<?php
require_once('fw/formManager.php');
//coupon/////////////////////////////////////////////////////////////////
//entryは存在しない

class couponForm extends formManager
{
    private $mail_remarks = '';
    
    private $form = array
    (
        'クーポン情報'=>array
        (
            '割引数値（円）'=>array(            'name'=>'discount_value',               'type'=>'text','func'=>null,                 'class'=>'form_text_common','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'', 'remarks'=>null),
            '割引（日本語）'=>array(            'name'=>'discount_ja',               'type'=>'text','func'=>null,                 'class'=>'form_text_common','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'', 'remarks'=>null),
            '割引（簡体字）'=>array(            'name'=>'discount_cn',               'type'=>'text','func'=>null,                 'class'=>'form_text_common','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'', 'remarks'=>null),
            '割引（繁体字）'=>array(            'name'=>'discount_tw',               'type'=>'text','func'=>null,                 'class'=>'form_text_common','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'', 'remarks'=>null),
            'タイトル（日本語）'=>array(        'name'=>'title_ja',        'type'=>'textarea',    'func'=>null,      'class'=>'form_textarea_little_height','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'','remarks'=>''),
            'タイトル（簡体字）'=>array(        'name'=>'title_cn',        'type'=>'textarea',    'func'=>null,      'class'=>'form_textarea_little_height','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'','remarks'=>''),
            'タイトル（繁体字）'=>array(        'name'=>'title_tw',        'type'=>'textarea',    'func'=>null,      'class'=>'form_textarea_little_height','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'','remarks'=>''),
            '使用条件（日本語）'=>array(        'name'=>'condition_ja',               'type'=>'textarea','func'=>null,                 'class'=>'form_textarea_little_height','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'', 'remarks'=>null),
            '使用条件（簡体字）'=>array(        'name'=>'condition_cn',               'type'=>'textarea','func'=>null,                 'class'=>'form_textarea_little_height','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'', 'remarks'=>null),
            '使用条件（繁体字）'=>array(        'name'=>'condition_tw',               'type'=>'textarea','func'=>null,                 'class'=>'form_textarea_little_height','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'', 'remarks'=>null)
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