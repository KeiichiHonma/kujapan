<?php
require_once('fw/formManager.php');
class inquiryForm extends formManager
{
    public $trigger = array
    (
        'search_check'=>'サーチエンジンでの検索',
        'sales_check'=>'弊社営業を通じて',
        'friend_check'=>'知人からの紹介',
        'press_check'=>'弊社プレスリリース',
        'media_check'=>'TV、新聞などのメディア媒体',
        'etc_check'=>'その他'
    );
    
    private $form = array
    (
        'お問い合わせ情報'=>array
        (
            '会社名'=>array(            'name'=>'company',       'type'=>'text',    'func'=>null,                 'class'=>'form_text_common',   'maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'','remarks'=>null),
            '部署名'=>array(            'name'=>'division',       'type'=>'text',    'func'=>null,                 'class'=>'form_text_common',   'maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'','remarks'=>null),
            
            '氏名'=>array(            'name'=>'name',       'type'=>'text',    'func'=>null,                 'class'=>'form_text_common',   'maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'','remarks'=>null),
            '氏名（フリガナ）'=>array('name'=>'kana',             'type'=>'text',    'func'=>null,                 'class'=>'form_text_common',   'maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'','remarks'=>null),
            '貴社サイトURL'=>array(            'name'=>'url',       'type'=>'text',    'func'=>null,                 'class'=>'form_text_common',   'maxlength'=>null,'must'=>FALSE, 'front'=>'','back'=>'','remarks'=>null),
            'メールアドレス'=>array('name'=>'mail',             'type'=>'text',    'func'=>null,                 'class'=>'form_text_common',   'maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'','remarks'=>null),
            '電話番号'=>array
            (
                array(                  'name'=>'telephone1',   'type'=>'text',    'func'=>null,                 'class'=>'form_text_number','maxlength'=>'3','must'=>TRUE, 'front'=>'','back'=>'－','remarks'=>null),
                array(                  'name'=>'telephone2',  'type'=>'text',    'func'=>null,                 'class'=>'form_text_number','maxlength'=>'4','must'=>TRUE, 'front'=>'','back'=>'－','remarks'=>null),
                array(                  'name'=>'telephone3',    'type'=>'text',    'func'=>null,                 'class'=>'form_text_number','maxlength'=>'4','must'=>TRUE, 'front'=>'','back'=>'','remarks'=>null)
            ),
            'FAX番号'=>array
            (
                array(                  'name'=>'fax1',   'type'=>'text',    'func'=>null,                 'class'=>'form_text_number','maxlength'=>'3','must'=>FALSE, 'front'=>'','back'=>'－','remarks'=>null),
                array(                  'name'=>'fax2',  'type'=>'text',    'func'=>null,                 'class'=>'form_text_number','maxlength'=>'4','must'=>FALSE, 'front'=>'','back'=>'－','remarks'=>null),
                array(                  'name'=>'fax3',    'type'=>'text',    'func'=>null,                 'class'=>'form_text_number','maxlength'=>'4','must'=>FALSE, 'front'=>'','back'=>'','remarks'=>null)
            ),
            '郵便番号'=>array
            (
                array(                  'name'=>'postcode1',        'type'=>'text',    'func'=>null,                 'class'=>'form_text_postcode1','maxlength'=>'3','must'=>FALSE, 'front'=>'','back'=>'','remarks'=>null),
                array(                  'name'=>'postcode2',        'type'=>'text',    'func'=>null,                 'class'=>'form_text_postcode2','maxlength'=>'4','must'=>FALSE, 'front'=>'－','back'=>'','remarks'=>null)
            ),
            '住所'=>array(              'name'=>'address',          'type'=>'text',    'func'=>null,                 'class'=>'form_text_common',   'maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'','remarks'=>null),
            //'日遊酷棒を知ったきっかけ'=>array(    'name'=>'trigger','type'=>'checkbox',   'func'=>'getTrigger','class'=>'','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'','m_text_style'=>null, 'remarks'=>''),
            //'ご質問など'=>array('name'=>'remarks','type'=>'textarea','func'=>null,      'class'=>'form_textarea_common','maxlength'=>null,'must'=>FALSE, 'front'=>'','back'=>'','remarks'=>'')
        )
    );

    public function getJob(){
        return $this->job;
    }
    public function getForm(){
        return parent::getForm($this->form,$this);
    }

    public function assignForm(){
        parent::assignForm($this->form,$this);
    }
}
?>