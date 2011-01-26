<?php
require_once('fw/formManager.php');
class newsForm extends formManager
{
    private $form = array
    (
        array
        (
            '対象'=>array( 'name'=>'target',      'type'=>'select',  'func'=>'getTarget', 'class'=>'',                    'maxlength'=>null,'must'=>TRUE,'front'=>'','back'=>'','remarks'=>null),
            'タイトル（日本語）'=>array( 'name'=>'title_ja',    'type'=>'text',    'func'=>null,          'class'=>'form_text_common',    'maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'','remarks'=>'全角で40字(半角80字)以内'),
            'タイトル（簡体字）'=>array( 'name'=>'title_cn',    'type'=>'text',    'func'=>null,          'class'=>'form_text_common',    'maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'','remarks'=>'全角で40字(半角80字)以内'),
            'タイトル（繁体字）'=>array( 'name'=>'title_tw',    'type'=>'text',    'func'=>null,          'class'=>'form_text_common',    'maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'','remarks'=>'全角で40字(半角80字)以内'),
            '内容（日本語）'=>array(         'name'=>'detail_ja', 'type'=>'textarea','func'=>null,          'class'=>'form_textarea_common','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'','remarks'=>null),
            '内容（簡体字）'=>array(         'name'=>'detail_cn', 'type'=>'textarea','func'=>null,          'class'=>'form_textarea_common','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'','remarks'=>null),
            '内容（繁体字）'=>array(         'name'=>'detail_tw', 'type'=>'textarea','func'=>null,          'class'=>'form_textarea_common','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'','remarks'=>null),
            'URL（日本）'=>array( 'name'=>'url_ja',       'type'=>'text',    'func'=>null,          'class'=>'form_text_common',    'maxlength'=>null,'must'=>FALSE, 'front'=>'','back'=>'','remarks'=>null),
            'URL（中国）'=>array( 'name'=>'url_cn',       'type'=>'text',    'func'=>null,          'class'=>'form_text_common',    'maxlength'=>null,'must'=>FALSE, 'front'=>'','back'=>'','remarks'=>null),
            'URL（台湾・香港）'=>array( 'name'=>'url_tw',       'type'=>'text',    'func'=>null,          'class'=>'form_text_common',    'maxlength'=>null,'must'=>FALSE, 'front'=>'','back'=>'','remarks'=>null),
            'リンクする？'=>array(    'name'=>'link','type'=>'radio',   'func'=>'getLink','class'=>'',                   'maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'','m_text_style'=>null, 'remarks'=>'リンクする必要がないもの'),
        )
    );
    
    public function getForm(){
        return parent::getForm($this->form,$this);
    }

    public function assignForm(){
        parent::assignForm($this->form,$this);
    }

    public function getTarget(){
        require_once('news/parameter.php');
        $parameter = new newsParameter();
        return $parameter->target;
    }

    public function getLink(){
        return array('0'=>'リンクする','1'=>'リンクしない');
    }
}
?>