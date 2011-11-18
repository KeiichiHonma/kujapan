<?php
require_once('fw/positionManager.php');
class systemPosition extends positionManager
{
    static protected $page = array
    (
    'index'=>array('name'=>'サイトトップ','func'=>null,'ssl'=>FALSE,'gnavi'=>'index','snavi'=>null),
    'system'=>array
        (
        'index'=>array('name'=>'管理画面トップ','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'index'),
        'login'=>array('name'=>'管理画面トップ','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'index'),
        'logout'=>array('name'=>'管理画面トップ','func'=>null,'access'=>TYPE_M_SUPPORT,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'index'),
        'alipay_debug'=>array
            (
            'index'=>array('name'=>'アリペイデバッグ','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'index'),
            'alipayto'=>array('name'=>'アリペイデバッグ','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'index')
            ),
        'manager'=>array
            (
            'index'=>array('name'=>'マネージャー管理','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'manager'),
            'view'=>array('name'=>'マネージャー詳細','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'manager'),
            'change'=>array('name'=>'店舗にログイン','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'manager'),
            'entry'=>array
                (
                'input'=>array('name'=>'マネージャー追加','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'manager')
                ),
            'edit'=>array
                (
                'input'=>array('name'=>'マネージャー変更','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'manager'),
                'password'=>array
                    (
                    'input'=>array('name'=>'パスワード変更','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'manager')
                    )
                ),
            'drop'=>array
                (
                'input'=>array('name'=>'マネージャー削除','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'manager')
                )
            ),
        'user'=>array
            (
            'index'=>array('name'=>'ユーザー管理','func'=>null,'access'=>TYPE_M_SUPPORT,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'user'),
            'view'=>array('name'=>'ユーザー詳細','func'=>null,'access'=>TYPE_M_SUPPORT,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'user'),
            'search'=>array('name'=>'ユーザー検索','func'=>null,'access'=>TYPE_M_SUPPORT,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'user'),
            'republish'=>array('name'=>'ユーザー再発行','func'=>null,'access'=>TYPE_M_SUPPORT,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'user'),
            'finish'=>array('name'=>'ユーザー再発行完了','func'=>null,'access'=>TYPE_M_SUPPORT,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'user'),
            'entry'=>array
                (
                'input'=>array('name'=>'ユーザー追加','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'user'),
                'finish'=>array('name'=>'ユーザー追加完了','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'user'),
                'mail'=>array('name'=>'メール送信','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'user'),
                ),
            'edit'=>array
                (
                'input'=>array('name'=>'ユーザー変更','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'user'),
                'finish'=>array('name'=>'ユーザー再発行完了','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'user'),
                ),
            'partner'=>array(
                'entry'=>array
                    (
                    'input'=>array('name'=>'パートナー用ユーザー追加','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'user'),
                    'finish'=>array('name'=>'パートナー用ユーザー追加完了','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'user'),
                    'export'=>array('name'=>'パートナー用書き出し','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'user'),
                    ),
                )
            ),
        'coupon'=>array
            (
            'index'=>array('name'=>'クーポン管理','func'=>null,'access'=>TYPE_M_SUPPORT,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'coupon'),
            'view'=>array('name'=>'クーポン詳細','func'=>null,'access'=>TYPE_M_SUPPORT,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'coupon'),
            'search'=>array('name'=>'クーポン検索','func'=>null,'access'=>TYPE_M_SUPPORT,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'coupon')
            ),
        'all'=>array
            (
            'shop'=>array
                (
                'index'=>array('name'=>'店舗一覧','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop_all'),
                
                ),
            'coupon'=>array
                (
                'index'=>array('name'=>'クーポン一覧','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'coupon_all'),
                ),
            'gallery'=>array
                (
                'index'=>array('name'=>'紹介一覧','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'gallery_all'),
                
                ),
            'product'=>array
                (
                'index'=>array('name'=>'商品一覧','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'product_all'),
                
                ),
                
            ),
        'shop'=>array
            (
            'index'=>array('name'=>'店舗トップ','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop'),
            'logout'=>array('name'=>'管理画面ログアウト','func'=>null,'access'=>TYPE_M_MANAGER,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>null),
            'validate'=>array('name'=>'店舗テータス変更','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop'),
            'login'=>array
                (
                'index'=>array('name'=>'店舗ログイン情報','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop_login'),
                'mail'=>array
                    (
                    'input'=>array('name'=>'メールアドレス変更','func'=>null,'access'=>TYPE_M_MANAGER,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop_login')
                    ),
                'password'=>array
                    (
                    'input'=>array('name'=>'パスワード変更','func'=>null,'access'=>TYPE_M_MANAGER,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop_login')
                    )
                ),
            'base'=>array
                (
                'index'=>array('name'=>'店舗基本情報','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop_base'),
                'logo_s'=>array
                    (
                    'input'=>array('name'=>'ロゴ(小)画像変更','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop_base')
                    ),
                'logo_m'=>array
                    (
                    'input'=>array('name'=>'ロゴ(中)画像変更','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop_base')
                    ),
                'face'=>array
                    (
                    'input'=>array('name'=>'外観(小)画像変更','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop_base')
                    ),
                'visual'=>array
                    (
                    'input'=>array('name'=>'外観(大)画像変更','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop_base')
                    ),
                'barcode'=>array
                    (
                    'input'=>array('name'=>'バーコード画像変更','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop_base')
                    ),
                'feature'=>array
                    (
                    'input'=>array('name'=>'特徴変更','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop_base')
                    ),
                'profile'=>array
                    (
                    'input'=>array('name'=>'情報変更','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop_base')
                    )
                ),
            'group'=>array
                (
                'index'=>array('name'=>'グループ','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop_group'),
                'assign'=>array
                    (
                    'input'=>array('name'=>'グループ割り当て','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop_group')
                    )
                ),
            'gallery'=>array
                (
                'index'=>array('name'=>'ギャラリー','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop_gallery'),
                'entry'=>array
                    (
                    'input'=>array('name'=>'ギャラリー追加','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop_gallery')
                    ),
                'reuse'=>array
                    (
                    'input'=>array('name'=>'ギャラリー再利用追加','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop_gallery')
                    ),
                'edit'=>array
                    (
                    'input'=>array('name'=>'ギャラリー変更','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop_gallery')
                    ),
                'drop'=>array
                    (
                    'input'=>array('name'=>'ギャラリー削除','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop_gallery')
                    )
                ),
            'product'=>array
                (
                'index'=>array('name'=>'商品','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop_product'),
                'entry'=>array
                    (
                    'input'=>array('name'=>'商品追加','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop_product')
                    ),
                'reuse'=>array
                    (
                    'input'=>array('name'=>'商品再利用追加','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop_product')
                    ),
                'edit'=>array
                    (
                    'input'=>array('name'=>'商品変更','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop_product')
                    ),
                'drop'=>array
                    (
                    'input'=>array('name'=>'商品削除','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop_product')
                    )
                ),
            'coupon'=>array
                (
                'index'=>array('name'=>'クーポン','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop_coupon'),
                'view'=>array('name'=>'クーポン詳細','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop_coupon'),
                'entry'=>array
                    (
                    'input'=>array('name'=>'クーポン追加','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop_coupon')
                    ),
                'reuse'=>array
                    (
                    'input'=>array('name'=>'クーポン再利用追加','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop_coupon')
                    ),
                'edit'=>array
                    (
                    'input'=>array('name'=>'クーポン変更','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop_coupon')
                    ),
                'drop'=>array
                    (
                    'input'=>array('name'=>'クーポン削除','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop_coupon')
                    )
                ),
            'map'=>array
                (
                'index'=>array('name'=>'地図情報','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop_map'),
                'ja'=>array
                    (
                    'input'=>array('name'=>'日本語地図変更','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop_map')
                    ),
                'cn'=>array
                    (
                    'input'=>array('name'=>'簡体字地図変更','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop_map')
                    ),
                'tw'=>array
                    (
                    'input'=>array('name'=>'繁体字地図変更','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'shop_map')
                    )
                )
            ),
        'group'=>array
            (
            'index'=>array('name'=>'グループ管理','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'group'),
            'view'=>array('name'=>'グループ閲覧','func'=>null,'access'=>TYPE_M_MANAGER,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'group'),
            'entry'=>array
                (
                'input'=>array('name'=>'グループ追加','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'group'),
                ),
            'edit'=>array
                (
                'input'=>array('name'=>'グループ変更','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'group'),
                ),
            'drop'=>array
                (
                'input'=>array('name'=>'グループ削除','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'group'),
                ),
            'coupon'=>array
                (
                'assign'=>array
                    (
                    'input'=>array('name'=>'表示クーポン管理','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'group')
                    )
                ),
            ),
        'news'=>array
            (
            'index'=>array('name'=>'お知らせ管理','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'news'),
            'view'=>array('name'=>'お知らせ詳細','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'news'),
            'entry'=>array
                (
                'input'=>array('name'=>'お知らせ追加','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'news'),
                ),
            'edit'=>array
                (
                'input'=>array('name'=>'お知らせ変更','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'news'),
                ),
            'drop'=>array
                (
                'input'=>array('name'=>'お知らせ削除','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'news'),
                )
            ),
        'analyze'=>array
            (
            'index'=>array('name'=>'基本項目の分析','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'analyze'),
            'shop'=>array('name'=>'学校項目の分析','func'=>null,'access'=>TYPE_M_ADMIN,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>'analyze')
            )
        )
    );

    static public function makeSitePosition(){
        parent::$page = self::$page;
        parent::makeSitePosition(TRUE);
    }

    static public function makeMessagePosition($msid,$title,$view = TRUE){
        //ユーザー向けのお知らせはお知らせ管理を抜いて作る
        if($view){
            unset(parent::$position[3]);
            parent::$position[2] = parent::makePositionPair('/system/message/view/msid/'.$msid,self::positionTrim($title));
        }else{
            parent::$position[3] = parent::makePositionPair('/system/message/detail/msid/'.$msid,self::positionTrim($title));
        }
        
    }

    static public function makeThirdPosition($url,$title){
        parent::$position[3] = parent::makePositionPair($url,self::positionTrim($title));
    }
    
    static public function makeFourthPosition($url,$title){
        parent::$position[4] = parent::$position[3];
        parent::$position[3] = parent::makePositionPair($url,self::positionTrim($title));
        ksort(parent::$position);
    }

    /*
    店舗用のサイトポジション生成関数
    管理者と学校では画面が異なるため
    ※Admin
    教えてCA！トップ > 管理画面トップ > 学校一覧 > 学校詳細
    ※学校
    教えてCA！トップ > 学校名-管理画面トップ（実際は学校詳細） > 各操作(学校メールアドレス変更等)
    */
    
    static public function makeShopPosition($shop_name,$positions = null){
        global $manager_auth;
        $count = count(parent::$position);

        for ($i=2;$i<$count;$i++){
            if($i > 2 && strcasecmp($manager_auth->manager_type,TYPE_M_MANAGER) == 0) parent::$position[$i-1] = parent::$position[$i];
            if($i == 2){
                parent::$position[$i]['name'] = self::positionTrim($shop_name.parent::$position[$i]['name']);
            }
        }

        ksort(parent::$position);
        
        if(!is_null($positions)){
            $i = $count-2;
            foreach ($positions as $key => $array){
                parent::$position[$i] = parent::makePositionPair($array['url'],self::positionTrim($array['name']));
                $i++;
            }
        }
    }

    static public function makeMessageChildPosition($msid,$title){
        parent::$position[4] = parent::$position[3];
        //question detail
        parent::$position[3] = parent::makePositionPair('/system/message/detail/msid/'.$msid,self::positionTrim($title));
        ksort(parent::$position);
    }

    //アクセス権////////////////////////////////////////
    static function getAccess(){
        parent::$page = self::$page;
        return self::getCurrentValue('access');
    }

    static function getName(){
        parent::$page = self::$page;
        return self::getCurrentValue('name');
    }
}
?>
