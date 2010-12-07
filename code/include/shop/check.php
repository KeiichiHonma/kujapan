<?php
require_once('fw/checkManager.php');
//school user/////////////////////////////////////////////////////////////////


//school/////////////////////////////////////////////////////////////////
//entryは存在しない

class checkShop extends checkManager
{
    static private $check_list = array
    (
        'aid'=>array
        (
            array('message'=>'！エリアは必須です。','func'=>'checkMust','arg'=>null)
        ),
        'gid'=>array
        (
            array('message'=>'！ジャンルは必須です。','func'=>'checkMust','arg'=>null)
        ),
        'name_ja'=>array
        (
            array('message'=>'！店舗名（日本語）は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！店舗名（日本語）は全角で40字(半角80字)以内で入力してください。','func'=>'checkLength','arg'=>array('start'=>1,'end'=>80)),
            array('message'=>null,'func'=>'replaceInput','arg'=>'name_ja')
        ),
        'name_cn'=>array
        (
            array('message'=>'！店舗名（簡体字）は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！店舗名（簡体字）は全角で40字(半角80字)以内で入力してください。','func'=>'checkLength','arg'=>array('start'=>1,'end'=>80)),
            array('message'=>null,'func'=>'replaceInput','arg'=>'name_cn')
        ),
        'name_tw'=>array
        (
            array('message'=>'！店舗名（繁体字）は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！店舗名（繁体字）は全角で40字(半角80字)以内で入力してください。','func'=>'checkLength','arg'=>array('start'=>1,'end'=>80)),
            array('message'=>null,'func'=>'replaceInput','arg'=>'name_tw')
        ),
        'detail_ja'=>array
        (
            array('message'=>'！詳細（日本語）は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！詳細（日本語）は全角で200字(半角400字)以内で入力してください。','func'=>'checkLength','arg'=>array('start'=>1,'end'=>400)),
            array('message'=>null,'func'=>'replaceInput','arg'=>'detail_title')
        ),
        'detail_cn'=>array
        (
            array('message'=>'！詳細（簡体字）は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！詳細（簡体字）は全角で200字(半角400字)以内で入力してください。','func'=>'checkLength','arg'=>array('start'=>1,'end'=>400)),
            array('message'=>null,'func'=>'replaceInput','arg'=>'detail_title')
        ),
        'detail_tw'=>array
        (
            array('message'=>'！詳細（繁体字）は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！詳細（繁体字）は全角で200字(半角400字)以内で入力してください。','func'=>'checkLength','arg'=>array('start'=>1,'end'=>400)),
            array('message'=>null,'func'=>'replaceInput','arg'=>'detail_title')
        ),
        'address_ja'=>array
        (
            array('message'=>'！住所（日本語）は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！住所（日本語）は全角で60字(半角120字)以内で入力してください。','func'=>'checkLength','arg'=>array('start'=>1,'end'=>120)),
            array('message'=>null,'func'=>'replaceInput','arg'=>'address_ja')
        ),
        'address_cn'=>array
        (
            array('message'=>'！住所（簡体字）は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！住所（簡体字）は全角で60字(半角120字)以内で入力してください。','func'=>'checkLength','arg'=>array('start'=>1,'end'=>120)),
            array('message'=>null,'func'=>'replaceInput','arg'=>'address_cn')
        ),
        'address_tw'=>array
        (
            array('message'=>'！住所（繁体字）は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！住所（繁体字）は全角で60字(半角120字)以内で入力してください。','func'=>'checkLength','arg'=>array('start'=>1,'end'=>120)),
            array('message'=>null,'func'=>'replaceInput','arg'=>'address_tw')
        ),
        'open_hour_ja'=>array
        (
            array('message'=>'！営業時間（日本語）は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！営業時間（日本語）は全角で60字(半角120字)以内で入力してください。','func'=>'checkLength','arg'=>array('start'=>1,'end'=>120)),
            array('message'=>null,'func'=>'replaceInput','arg'=>'open_hour_ja')
        ),
        'open_hour_cn'=>array
        (
            array('message'=>'！営業時間（簡体字）は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！営業時間（簡体字）は全角で60字(半角120字)以内で入力してください。','func'=>'checkLength','arg'=>array('start'=>1,'end'=>120)),
            array('message'=>null,'func'=>'replaceInput','arg'=>'open_hour_cn')
        ),
        'open_hour_tw'=>array
        (
            array('message'=>'！営業時間（繁体字）は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！営業時間（繁体字）店舗は全角で60字(半角120字)以内で入力してください。','func'=>'checkLength','arg'=>array('start'=>1,'end'=>120)),
            array('message'=>null,'func'=>'replaceInput','arg'=>'open_hour_tw')
        ),
        'holiday_ja'=>array
        (
            array('message'=>'！定休日（日本語）は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！定休日（日本語）は全角で60字(半角120字)以内で入力してください。','func'=>'checkLength','arg'=>array('start'=>1,'end'=>120)),
            array('message'=>null,'func'=>'replaceInput','arg'=>'holiday_ja')
        ),
        'holiday_cn'=>array
        (
            array('message'=>'！定休日（簡体字）は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！定休日（簡体字）は全角で60字(半角120字)以内で入力してください。','func'=>'checkLength','arg'=>array('start'=>1,'end'=>120)),
            array('message'=>null,'func'=>'replaceInput','arg'=>'holiday_cn')
        ),
        'holiday_tw'=>array
        (
            array('message'=>'！定休日（繁体字）は必須です。','func'=>'checkMust','arg'=>null),
            array('message'=>'！定休日（繁体字）店舗は全角で60字(半角120字)以内で入力してください。','func'=>'checkLength','arg'=>array('start'=>1,'end'=>120)),
            array('message'=>null,'func'=>'replaceInput','arg'=>'holiday_tw')
        )
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
/*    static private $check_logo_list = array
    (
        'file'=>array
        (
            array('message'=>null,'func'=>'checkFileReady','arg'=>null,'is_file'=>TRUE),//必須
            array('message'=>'！画像は必須です。','func'=>'checkFileMust','arg'=>'fid','is_file'=>TRUE),
            array('message'=>null,'func'=>'checkFileBase','arg'=>'file','is_file'=>TRUE),//baseのチェック
            array('message'=>'！アップロード可能なファイルサイズは5Mバイトまでです。','func'=>'checkFileSize','arg'=>5000000,'is_file'=>TRUE),
            array('message'=>'！アップロード可能なファイルは横180px,縦200px以内です。','func'=>'checkFileImageSize','arg'=>array('type'=>WIDTH_HEIGHT_WITHIN,'width'=>180,'height'=>200),'is_file'=>TRUE),
            array('message'=>'！アップロード可能なファイルの種類はgif,jpg,pngのみです。','func'=>'checkFileType','arg'=>array('gif','jpg','png'),'is_file'=>TRUE)
        )
    );*/

    static private $check_face_list = array
    (
        'file'=>array
        (
            array('message'=>null,'func'=>'checkFileReady','arg'=>null,'is_file'=>TRUE),//必須
            array('message'=>'！画像は必須です。','func'=>'checkFileMust','arg'=>'fid','is_file'=>TRUE),
            array('message'=>null,'func'=>'checkFileBase','arg'=>'file','is_file'=>TRUE),//baseのチェック
            array('message'=>'！アップロード可能なファイルサイズは5Mバイトまでです。','func'=>'checkFileSize','arg'=>5000000,'is_file'=>TRUE),
            array('message'=>'！アップロード可能なファイルは横300px,縦300px以内です。','func'=>'checkFileImageSize','arg'=>array('type'=>WIDTH_HEIGHT_WITHIN,'width'=>300,'height'=>300),'is_file'=>TRUE),
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
    static private $check_logo_list = array
    (
        'file'=>array
        (
            array('message'=>null,'func'=>'checkFileReady','arg'=>null,'is_file'=>TRUE),//必須
            array('message'=>'！画像は必須です。','func'=>'checkFileMust','arg'=>'fid','is_file'=>TRUE),
            array('message'=>null,'func'=>'checkFileBase','arg'=>'file','is_file'=>TRUE),//baseのチェック
            array('message'=>'！アップロード可能なファイルサイズは5Mバイトまでです。','func'=>'checkFileSize','arg'=>5000000,'is_file'=>TRUE),
            array('message'=>'！アップロード可能なファイルは横180px,縦200px以内です。','func'=>'checkFileImageSize','arg'=>array('type'=>WIDTH_HEIGHT_WITHIN,'width'=>180,'height'=>200),'is_file'=>TRUE),
            array('message'=>'！アップロード可能なファイルの種類はgif,jpg,pngのみです。','func'=>'checkFileType','arg'=>array('gif','jpg','png'),'is_file'=>TRUE)
        )
    );
    
    static private $check_visual_list = array
    (
        'file'=>array
        (
            array('message'=>null,'func'=>'checkFileReady','arg'=>null,'is_file'=>TRUE),//必須
            array('message'=>null,'func'=>'checkFileBase','arg'=>'file','is_file'=>TRUE),//baseのチェック
            array('message'=>'！アップロード可能なファイルサイズは5Mバイトまでです。','func'=>'checkFileSize','arg'=>5000000,'is_file'=>TRUE),
            array('message'=>'！アップロード可能なファイルは横330px,縦500px以内です。','func'=>'checkFileImageSize','arg'=>array('type'=>WIDTH_HEIGHT_WITHIN,'width'=>330,'height'=>500),'is_file'=>TRUE),
            array('message'=>'！アップロード可能なファイルの種類はgif,jpg,pngのみです。','func'=>'checkFileType','arg'=>array('gif','jpg','png'),'is_file'=>TRUE)
        )
    );
    
    static private $check_product_list = array
    (
        'file'=>array
        (
            array('message'=>null,'func'=>'checkFileReady','arg'=>null,'is_file'=>TRUE),//必須
            array('message'=>null,'func'=>'checkFileBase','arg'=>'file','is_file'=>TRUE),//baseのチェック
            array('message'=>'！アップロード可能なファイルサイズは5Mバイトまでです。','func'=>'checkFileSize','arg'=>5000000,'is_file'=>TRUE),
            array('message'=>'！アップロード可能なファイルは横330px,縦500px以内です。','func'=>'checkFileImageSize','arg'=>array('type'=>WIDTH_HEIGHT_WITHIN,'width'=>330,'height'=>500),'is_file'=>TRUE),
            array('message'=>'！アップロード可能なファイルの種類はgif,jpg,pngのみです。','func'=>'checkFileType','arg'=>array('gif','jpg','png'),'is_file'=>TRUE)
        ),
        'detail_ja'=>array
        (
            array('message'=>'！詳細（日本語）は必須です。','func'=>'checkMust','arg'=>null),
        ),
        'detail_cn'=>array
        (
            array('message'=>'！詳細（簡体字）は必須です。','func'=>'checkMust','arg'=>null),
        ),
        'detail_tw'=>array
        (
            array('message'=>'！詳細（繁体字）は必須です。','func'=>'checkMust','arg'=>null),
        ),
    );

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
        ),
        'detail_ja'=>array
        (
            array('message'=>'！詳細（日本語）は必須です。','func'=>'checkMust','arg'=>null),
        ),
        'detail_cn'=>array
        (
            array('message'=>'！詳細（簡体字）は必須です。','func'=>'checkMust','arg'=>null),
        ),
        'detail_tw'=>array
        (
            array('message'=>'！詳細（繁体字）は必須です。','func'=>'checkMust','arg'=>null),
        ),
    );

    static private $check_map_list = array
    (
        'file'=>array
        (
            array('message'=>null,'func'=>'checkFileReady','arg'=>null,'is_file'=>TRUE),//必須
            array('message'=>'！画像は必須です。','func'=>'checkFileMust','arg'=>'fid','is_file'=>TRUE),
            array('message'=>null,'func'=>'checkFileBase','arg'=>'file','is_file'=>TRUE),//baseのチェック
            array('message'=>'！アップロード可能なファイルサイズは5Mバイトまでです。','func'=>'checkFileSize','arg'=>5000000,'is_file'=>TRUE),
            array('message'=>'！アップロード可能なファイルは横684px,縦500px以内です。','func'=>'checkFileImageSize','arg'=>array('type'=>WIDTH_HEIGHT_WITHIN,'width'=>684,'height'=>500),'is_file'=>TRUE),
            array('message'=>'！アップロード可能なファイルの種類はgif,jpg,pngのみです。','func'=>'checkFileType','arg'=>array('gif','jpg','png'),'is_file'=>TRUE)
        )
    );

    static private $check_barcode_list = array
    (
        'file'=>array
        (
            array('message'=>null,'func'=>'checkFileReady','arg'=>null,'is_file'=>TRUE),//必須
            array('message'=>'！画像は必須です。','func'=>'checkFileMust','arg'=>'fid','is_file'=>TRUE),
            array('message'=>null,'func'=>'checkFileBase','arg'=>'file','is_file'=>TRUE),//baseのチェック
            array('message'=>'！アップロード可能なファイルサイズは5Mバイトまでです。','func'=>'checkFileSize','arg'=>5000000,'is_file'=>TRUE),
            array('message'=>'！アップロード可能なファイルは横200px,縦200px以内です。','func'=>'checkFileImageSize','arg'=>array('type'=>WIDTH_HEIGHT_WITHIN,'width'=>200,'height'=>200),'is_file'=>TRUE),
            array('message'=>'！アップロード可能なファイルの種類はgif,jpg,pngのみです。','func'=>'checkFileType','arg'=>array('gif','jpg','png'),'is_file'=>TRUE)
        )
    );

    static public function checkLogoError(){
        parent::checkSystemError(self::$check_logo_list);
    }

/*    static public function checkFaceError(){
        parent::checkSystemError(self::$check_face_list);
    }*/

    static public function checkVisualError(){
        parent::checkSystemError(self::$check_visual_list);
    }

    static public function checkProductError(){
        parent::checkSystemError(self::$check_product_list);
    }

    static public function checkGalleryError(){
        parent::checkSystemError(self::$check_gallery_list);
    }

    static public function checkMapError(){
        parent::checkSystemError(self::$check_map_list);
    }

    static public function checkBarcodeError(){
        parent::checkSystemError(self::$check_barcode_list);
    }
}
?>