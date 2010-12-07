<?php
require_once('fw/formManager.php');
//shop/////////////////////////////////////////////////////////////////
//entryは存在しない

class shopForm extends formManager
{
    function __construct(){
        //エリア
        require_once('area/logic.php');
        $area_logic = new areaLogic(TRUE);
        $areatmp = $area_logic->area_info;
        //form用に成型
        foreach($areatmp as $id => $array){
            $this->area[$id] = $array['col_name_ja'];
        }

        //ジャンル
        require_once('genre/logic.php');
        $genre_logic = new genreLogic(TRUE);
        $genretmp = $genre_logic->genre_info;
        //form用に成型
        foreach($genretmp as $id => $array){
            $this->genre[$id] = $array['col_name_ja'];
        }

        //特徴
        require_once('feature/logic.php');
        $feature_logic = new featureLogic(TRUE);
        $featuretmp = $feature_logic->feature_info;
        foreach($featuretmp as $id => $array){
            $this->feature[$id] = $array['col_name_ja'];
        }
    }
    
    private $mail_remarks = '';
    
    private $profile_form = array
    (
        '店舗情報'=>array
        (
            'エリア'=>array(           'name'=>'aid',             'type'=>'select',  'func'=>'getArea',         'class'=>'',                   'maxlength'=>null,'must'=>TRUE,'front'=>'','back'=>'','remarks'=>null),
            'ジャンル'=>array(         'name'=>'gid',             'type'=>'select',  'func'=>'getGenre',         'class'=>'',                   'maxlength'=>null,'must'=>TRUE,'front'=>'','back'=>'','remarks'=>null),
            '店舗名（日本語）'=>array( 'name'=>'name_ja',        'type'=>'text',    'func'=>null,      'class'=>'form_text_common',null,'must'=>TRUE, 'front'=>'','back'=>'','remarks'=>''),
            '店舗名（簡体字）'=>array( 'name'=>'name_cn',        'type'=>'text',    'func'=>null,      'class'=>'form_text_common',null,'must'=>TRUE, 'front'=>'','back'=>'','remarks'=>''),
            '店舗名（繁体字）'=>array( 'name'=>'name_tw',        'type'=>'text',    'func'=>null,      'class'=>'form_text_common',null,'must'=>TRUE, 'front'=>'','back'=>'','remarks'=>''),

            '詳細（日本語）'=>array(    'name'=>'detail_ja',               'type'=>'textarea','func'=>null,                 'class'=>'form_textarea_little','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'', 'remarks'=>null),
            '詳細（簡体字）'=>array(    'name'=>'detail_cn',               'type'=>'textarea','func'=>null,                 'class'=>'form_textarea_little','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'', 'remarks'=>null),
            '詳細（繁体字）'=>array(    'name'=>'detail_tw',               'type'=>'textarea','func'=>null,                 'class'=>'form_textarea_little','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'', 'remarks'=>null),

            '住所（日本語）'=>array(    'name'=>'address_ja',               'type'=>'textarea','func'=>null,                 'class'=>'form_textarea_little_height','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'', 'remarks'=>null),
            '住所（簡体字）'=>array(    'name'=>'address_cn',               'type'=>'textarea','func'=>null,                 'class'=>'form_textarea_little_height','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'', 'remarks'=>null),
            '住所（繁体字）'=>array(    'name'=>'address_tw',               'type'=>'textarea','func'=>null,                 'class'=>'form_textarea_little_height','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'', 'remarks'=>null),

            '営業時間（日本語）'=>array('name'=>'open_hour_ja',               'type'=>'textarea','func'=>null,                 'class'=>'form_textarea_little_height','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'', 'remarks'=>null),
            '営業時間（簡体字）'=>array('name'=>'open_hour_cn',               'type'=>'textarea','func'=>null,                 'class'=>'form_textarea_little_height','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'', 'remarks'=>null),
            '営業時間（繁体字）'=>array('name'=>'open_hour_tw',               'type'=>'textarea','func'=>null,                 'class'=>'form_textarea_little_height','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'', 'remarks'=>null),

            '定休日（日本語）'=>array(  'name'=>'holiday_ja',               'type'=>'textarea','func'=>null,                 'class'=>'form_textarea_little_height','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'', 'remarks'=>null),
            '定休日（簡体字）'=>array(  'name'=>'holiday_cn',               'type'=>'textarea','func'=>null,                 'class'=>'form_textarea_little_height','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'', 'remarks'=>null),
            '定休日（繁体字）'=>array(  'name'=>'holiday_tw',               'type'=>'textarea','func'=>null,                 'class'=>'form_textarea_little_height','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'', 'remarks'=>null),
            'ホームページ'=>array(      'name'=>'url',         'type'=>'text',    'func'=>null,      'class'=>'form_text_common','maxlength'=>null,'must'=>FALSE, 'front'=>'','back'=>'','remarks'=>'')
        )
    );

    private $feature_form = array
    (
        '特徴'=>array
        (
        '特徴'=>array(    'name'=>'feature','type'=>'checkbox',   'func'=>'getFeature','class'=>'','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'','m_text_style'=>null, 'remarks'=>'')
        )
    );

    public function getArea(){
        return $this->area;
    }

    public function getGenre(){
        return $this->genre;
    }

    public function getFeature(){
        return $this->feature;
    }

    //get
    public function getProfileForm(){
        return parent::getForm($this->profile_form,$this);
    }

    public function getFeatureForm(){
        return parent::getForm($this->feature_form,$this);
    }

    //assign
    public function assignProfileForm(){
        parent::assignForm($this->profile_form,$this);
    }

    public function assignFeatureForm(){
        parent::assignForm($this->feature_form,$this);
    }
}

//shop item/////////////////////////////////////////////////////////////////
class shopItemForm extends formManager
{
    private $form;
    
    function __construct($type){
        switch ($type){
            case SHOP_TYPE_PRODUCT:
                $this->form = $this->product_form;
            break;
            case SHOP_TYPE_GALLERY:
                $this->form = $this->gallery_form;
            break;
        }
    }
    private $product_form = array
    (
        '商品'=>array
        (
            '詳細（日本語）'=>array(    'name'=>'detail_ja','type'=>'textarea','func'=>null,      'class'=>'form_textarea_little','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'','remarks'=>''),
            '詳細（簡体字）'=>array(    'name'=>'detail_cn','type'=>'textarea','func'=>null,      'class'=>'form_textarea_little','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'','remarks'=>''),
            '詳細（繁体字）'=>array(    'name'=>'detail_tw','type'=>'textarea','func'=>null,      'class'=>'form_textarea_little','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'','remarks'=>'')
        )
    );

    private $gallery_form = array
    (
        'ギャラリー'=>array
        (
            '詳細（日本語）'=>array(    'name'=>'detail_ja','type'=>'textarea','func'=>null,      'class'=>'form_textarea_little','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'','remarks'=>''),
            '詳細（簡体字）'=>array(    'name'=>'detail_cn','type'=>'textarea','func'=>null,      'class'=>'form_textarea_little','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'','remarks'=>''),
            '詳細（繁体字）'=>array(    'name'=>'detail_tw','type'=>'textarea','func'=>null,      'class'=>'form_textarea_little','maxlength'=>null,'must'=>TRUE, 'front'=>'','back'=>'','remarks'=>'')
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