<?php
require_once('fw/checkManager.php');
//school user/////////////////////////////////////////////////////////////////


//school/////////////////////////////////////////////////////////////////
//entryは存在しない

class checkShop extends checkManager
{
    static private $check_list = array
    (
/*        'aid'=>array
        (
            array('message'=>'！エリアは必須です。','func'=>'checkMust','arg'=>null)
        ),
        'gid'=>array
        (
            array('message'=>'！ジャンルは必須です。','func'=>'checkMust','arg'=>null)
        ),*/
        'name'=>array
        (
            array('message'=>'！店舗名は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！店舗名は全角で40字(半角80字)以内で入力してください。','func'=>'checkLength','arg'=>array('start'=>1,'end'=>80)),
            array('message'=>null,'func'=>'replaceInput','arg'=>'name_ja')
        ),
        'detail'=>array
        (
            array('message'=>'！詳細は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！詳細は全角で200字(半角400字)以内で入力してください。','func'=>'checkLength','arg'=>array('start'=>1,'end'=>400)),
            array('message'=>null,'func'=>'replaceInput','arg'=>'detail_title')
        ),
        'address'=>array
        (
            array('message'=>'！住所は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！住所は全角で60字(半角120字)以内で入力してください。','func'=>'checkLength','arg'=>array('start'=>1,'end'=>120)),
            array('message'=>null,'func'=>'replaceInput','arg'=>'address_ja')
        ),
        'map'=>array
        (
            array('message'=>'！マップ用住所は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！マップ用住所は全角で60字(半角120字)以内で入力してください。','func'=>'checkLength','arg'=>array('start'=>1,'end'=>120)),
            array('message'=>null,'func'=>'replaceInput','arg'=>'address_ja')
        ),
        'open_hour'=>array
        (
            array('message'=>'！営業時間は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！営業時間は全角で60字(半角120字)以内で入力してください。','func'=>'checkLength','arg'=>array('start'=>1,'end'=>120)),
            array('message'=>null,'func'=>'replaceInput','arg'=>'open_hour_ja')
        ),
        'holiday'=>array
        (
            array('message'=>'！定休日は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！定休日は全角で60字(半角120字)以内で入力してください。','func'=>'checkLength','arg'=>array('start'=>1,'end'=>120)),
            array('message'=>null,'func'=>'replaceInput','arg'=>'holiday_ja')
        ),
        'c_title'=>array
        (
            array('message'=>'！クーポンタイトルは必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！クーポンタイトルは全角で60字(半角120字)以内で入力してください。','func'=>'checkLength','arg'=>array('start'=>1,'end'=>120)),
            array('message'=>null,'func'=>'replaceInput','arg'=>'holiday_ja')
        ),
        'c_header'=>array
        (
            array('message'=>'！face下部のテキストは必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！face下部のテキストは全角で200字(半角400字)以内で入力してください。','func'=>'checkLength','arg'=>array('start'=>1,'end'=>400)),
            array('message'=>null,'func'=>'replaceInput','arg'=>'detail_title')
        ),
        'c_detail'=>array
        (
            array('message'=>'！クーポン詳細は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！クーポン詳細は全角で200字(半角400字)以内で入力してください。','func'=>'checkLength','arg'=>array('start'=>1,'end'=>400)),
            array('message'=>null,'func'=>'replaceInput','arg'=>'detail_title')
        ),
        'c_price'=>array
        (
            array('message'=>'！クーポン価格は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！クーポン価格は全角で60字(半角120字)以内で入力してください。','func'=>'checkLength','arg'=>array('start'=>1,'end'=>120)),
            array('message'=>null,'func'=>'replaceInput','arg'=>'holiday_ja')
        ),
        'c_usual_price'=>array
        (
            array('message'=>'！クーポン通常価格は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！クーポン通常価格は全角で60字(半角120字)以内で入力してください。','func'=>'checkLength','arg'=>array('start'=>1,'end'=>120)),
            array('message'=>null,'func'=>'replaceInput','arg'=>'holiday_ja')
        ),
        'c_discount_rate'=>array
        (
            array('message'=>'！クーポン割引率は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！クーポン割引率は全角で60字(半角120字)以内で入力してください。','func'=>'checkLength','arg'=>array('start'=>1,'end'=>120)),
            array('message'=>null,'func'=>'replaceInput','arg'=>'holiday_ja')
        ),
        'c_discount_value'=>array
        (
            array('message'=>'！クーポン割引額は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！クーポン割引額は全角で60字(半角120字)以内で入力してください。','func'=>'checkLength','arg'=>array('start'=>1,'end'=>120)),
            array('message'=>null,'func'=>'replaceInput','arg'=>'holiday_ja')
        ),
        'c_condition'=>array
        (
            array('message'=>'！クーポン利用条件は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！クーポン利用条件は全角で200字(半角400字)以内で入力してください。','func'=>'checkLength','arg'=>array('start'=>1,'end'=>400)),
            array('message'=>null,'func'=>'replaceInput','arg'=>'detail_title')
        ),
    );

    static private $check_feature_list = array
    (
        'feature'=>array
        (
            array('message'=>'！特徴は必須です。','func'=>'checkMust','arg'=>null)
        )
    );

    static public function checkError(){
        parent::checkSystemError(self::$check_list);
    }

    static public function checkFeatureError(){
        parent::checkSystemError(self::$check_feature_list);
    }
}

class checkShopFile extends checkManager
{
    static private $check_face_list = array
    (
        'file'=>array
        (
            array('message'=>null,'func'=>'checkFileReady','arg'=>null,'is_file'=>TRUE),//必須
            array('message'=>'！画像は必須です。','func'=>'checkFileMust','arg'=>'fid','is_file'=>TRUE),
            array('message'=>null,'func'=>'checkFileBase','arg'=>'file','is_file'=>TRUE),//baseのチェック
            array('message'=>'！アップロード可能なファイルサイズは5Mバイトまでです。','func'=>'checkFileSize','arg'=>5000000,'is_file'=>TRUE),
            array('message'=>'！アップロード可能なファイルは横480px,縦320px以内です。','func'=>'checkFileImageSize','arg'=>array('type'=>WIDTH_HEIGHT_WITHIN,'width'=>480,'height'=>320),'is_file'=>TRUE),
            array('message'=>'！アップロード可能なファイルの種類はgif,jpg,pngのみです。','func'=>'checkFileType','arg'=>array('gif','jpg','png'),'is_file'=>TRUE)
        )
    );

    static public function checkLogoError(){
        parent::checkSystemError(self::$check_logo_list);
    }

    static public function checkFaceError(){
        parent::checkSystemError(self::$check_face_list);
    }
}

//shop item/////////////////////////////////////////////////////////////////
class checkShopItem extends checkManager
{
    static private $check_gallery_list = array
    (
        'file'=>array
        (
            array('message'=>null,'func'=>'checkFileReady','arg'=>null,'is_file'=>TRUE),//必須
            array('message'=>'！写真は必須です。','func'=>'checkFileMust','arg'=>'fid','is_file'=>TRUE),
            array('message'=>null,'func'=>'checkFileBase','arg'=>'file','is_file'=>TRUE),//baseのチェック
            array('message'=>'！アップロード可能なファイルサイズは5Mバイトまでです。','func'=>'checkFileSize','arg'=>5000000,'is_file'=>TRUE),
            array('message'=>'！アップロード可能なファイルは横330px以内,縦500px以内です。','func'=>'checkFileImageSize','arg'=>array('type'=>WIDTH_HEIGHT_WITHIN,'width'=>330,'height'=>500),'is_file'=>TRUE),
            array('message'=>'！アップロード可能なファイルの種類はgif,jpg,pngのみです。','func'=>'checkFileType','arg'=>array('gif','jpg','png'),'is_file'=>TRUE)
        )
    );

    static public function checkProductError(){
        parent::checkSystemError(self::$check_product_list);
    }

    static public function checkGalleryError(){
        parent::checkSystemError(self::$check_gallery_list);
    }
}
?>