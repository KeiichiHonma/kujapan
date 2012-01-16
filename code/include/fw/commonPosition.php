<?php
require_once('fw/positionManager.php');
class commonPosition extends positionManager
{
    static protected $page = array
    (
    'index'=>array
    (
        'name_ja'=>'日游酷棒',
        'name_cn'=>'日游酷棒',
        'name_tw'=>'日游酷棒',
        'func'=>null,'ssl'=>FALSE,'gnavi'=>'index','snavi'=>null
    ),
    'news'=>array
    (
        'name_ja'=>'お知らせ',
        'name_cn'=>'通知',
        'name_tw'=>'通知',
        'func'=>null,'ssl'=>FALSE,'gnavi'=>null,'snavi'=>null
    ),
    'about'=>array
    (
        'name_ja'=>'使い方',
        'name_cn'=>'何谓日游酷棒',
        'name_tw'=>'什麼是日游酷棒',
        'func'=>null,'ssl'=>FALSE,'gnavi'=>'about','snavi'=>null
    ),
    'area'=>array
    (
        'name_ja'=>'買い物エリア',
        'name_cn'=>'购物区域',
        'name_tw'=>'購物地區',
        'func'=>null,'ssl'=>FALSE,'gnavi'=>'area','snavi'=>null
    ),
    'genre'=>array
    (
        'name_ja'=>'買い物ジャンル',
        'name_cn'=>'购物种类',
        'name_tw'=>'購物種類',
        'func'=>null,'ssl'=>FALSE,'gnavi'=>'genre','snavi'=>null
    ),
    'special'=>array
    (
        'group'=>array
        (
            'name_ja'=>'グループ',
            'name_cn'=>'group',
            'name_tw'=>'group',
            'func'=>null,'ssl'=>FALSE,'gnavi'=>'index','snavi'=>null
        )
    ),
    'campaign'=>array
    (
        'name_ja'=>'关注日游酷棒微博',
        'name_cn'=>'关注日游酷棒微博',
        'name_tw'=>'关注日游酷棒微博',
        'func'=>null,'ssl'=>FALSE,'gnavi'=>'about','snavi'=>null
    ),
    'shop'=>array
    (
        'name_ja'=>'店舗',
        'name_cn'=>'店铺',
        'name_tw'=>'店舖',
        'func'=>null,'ssl'=>FALSE,'gnavi'=>null,'snavi'=>null
    ),
    'print'=>array
    (
        'name_ja'=>'印刷',
        'name_cn'=>'打印',
        'name_tw'=>'列印',
        'func'=>null,'ssl'=>FALSE,'gnavi'=>'index','snavi'=>null
    ),
    'security'=>array
    (
        'name_ja'=>'印刷security',
        'name_cn'=>'打印security',
        'name_tw'=>'列印security',
        'func'=>null,'ssl'=>FALSE,'gnavi'=>'index','snavi'=>null
    ),
    'login'=>array
    (
        'name_ja'=>'ログイン',
        'name_cn'=>'登录',
        'name_tw'=>'賬戶',
        'func'=>null,'ssl'=>TRUE,'gnavi'=>'index','snavi'=>null
    ),
    'logout'=>array
    (
        'name_ja'=>'ログアウト',
        'name_cn'=>'登出',
        'name_tw'=>'登出',
        'func'=>null,'ssl'=>TRUE,'gnavi'=>'index','snavi'=>null
    ),
    'rule'=>array
    (
        'name_ja'=>'会員サービス規約',
        'name_cn'=>'会员服务条款',
        'name_tw'=>'會員服務條款',
        'func'=>null,'ssl'=>FALSE,'gnavi'=>'index','snavi'=>null
    ),
    'corp'=>array
    (
        'name_ja'=>'運営',
        'name_cn'=>'运营',
        'name_tw'=>'營運',
        'func'=>null,'ssl'=>FALSE,'gnavi'=>'index','snavi'=>null
    ),
    'contact'=>array
    (
        'name_ja'=>'お問い合わせ',
        'name_cn'=>'联系我们',
        'name_tw'=>'聯繫我們',
        'func'=>null,'ssl'=>FALSE,'gnavi'=>'index','snavi'=>null
    ),
    'site_map'=>array
    (
        'name_ja'=>'サイトマップ',
        'name_cn'=>'网站地图',
        'name_tw'=>'網站地圖',
        'func'=>null,'ssl'=>FALSE,'gnavi'=>'index','snavi'=>null
    ),
    'inquiry'=>array
        (

            'input'=>array
            (
                'name_ja'=>'<span lang="ja">掲載をご検討の企業様</span>',
                'name_cn'=>'<span lang="ja">掲載をご検討の企業様</span>',
                'name_tw'=>'<span lang="ja">掲載をご検討の企業様</span>',
                'func'=>null,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>null
            ),
            'finish'=>array
            (
                'name_ja'=>'<span lang="ja">掲載をご検討の企業様</span>',
                'name_cn'=>'<span lang="ja">掲載をご検討の企業様</span>',
                'name_tw'=>'<span lang="ja">掲載をご検討の企業様</span>',
                'func'=>null,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>null
            ),
        ),
    'notfound'=>array
    (
        'name_ja'=>'あなたのアクセスしようとしたページは見つかりませんでした。',
        'name_cn'=>'找不到你要访问的网页',
        'name_tw'=>'找不到你要訪問的網頁',
        'func'=>null,'ssl'=>FALSE,'gnavi'=>'index','snavi'=>null
    ),
    'payment'=>array
        (
            'buystop'=>array
            (
                'name_ja'=>'新規ご購入一時停止のお知らせ',
                'name_cn'=>'新規ご購入一時停止のお知らせ',
                'name_tw'=>'新規ご購入一時停止のお知らせ',
                'func'=>null,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>null
            ),
            'bridge'=>array
            (
                'name_ja'=>'決済前にご確認ください',
                'name_cn'=>'支付前的注意事项',
                'name_tw'=>'支付前的注意事項',
                'func'=>null,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>null
            ),
            'alipay'=>array
            (
                'name_ja'=>'alipay',
                'name_cn'=>'alipay',
                'name_tw'=>'alipay',
                'func'=>null,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>null
            ),
            'alipayto'=>array
            (
                'name_ja'=>'alipayto',
                'name_cn'=>'alipayto',
                'name_tw'=>'alipayto',
                'func'=>null,'ssl'=>FALSE,'gnavi'=>null,'snavi'=>null
            ),
            'finish'=>array
            (
                'name_ja'=>'購入明細',
                'name_cn'=>'购买记录',
                'name_tw'=>'購買記錄',
                'func'=>null,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>null
            ),
/*            'make'=>array
            (
                'name_ja'=>'購入明細',
                'name_cn'=>'购买明细',
                'name_tw'=>'購買明細',
                'func'=>null,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>null
            ),*/
            'error'=>array
            (
                'name_ja'=>'決済処理中にエラーが発生しました',
                'name_cn'=>'结算处理中发生了错误',
                'name_tw'=>'結算處理中發生了錯誤',
                'func'=>null,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>null
            ),
        ),
    'initialize'=>array
        (
            'input'=>array
            (
                'name_ja'=>'使用者登録',
                'name_cn'=>'使用者注册',
                'name_tw'=>'使用者登錄',
                'func'=>null,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>null
            ),
            'finish'=>array
            (
                'name_ja'=>'使用者登録',
                'name_cn'=>'注册完毕',
                'name_tw'=>'已登錄',
                'func'=>null,'ssl'=>TRUE,'gnavi'=>null,'snavi'=>null
            )
        )
    );

    static public function makeSitePosition(){
        parent::$page = self::$page;
        parent::makeSitePosition();
    }

    static private $index = 1;

    static public function makeNumberPosition($url,$title,$trim = TRUE){
        parent::$position[self::$index] = parent::makePositionPair($url,$trim ? self::positionTrim($title) : $title);
        self::$index++;
    }

    static public function makeFirstPosition($url,$title,$trim = TRUE){
        parent::$position[1] = parent::makePositionPair($url,$trim ? self::positionTrim($title) : $title);
    }

    static public function makeSecondPosition($url,$title,$trim = TRUE){
        parent::$position[2] = parent::makePositionPair($url,$trim ? self::positionTrim($title) : $title);
    }

    static public function makeThirdPosition($url,$title,$trim = TRUE){
        parent::$position[3] = parent::makePositionPair($url,$trim ? self::positionTrim($title) : $title);
    }

    static public function makeFourPosition($url,$title,$trim = TRUE){
        parent::$position[4] = parent::makePositionPair($url,$trim ? self::positionTrim($title) : $title);
    }

    static public function makeFivePosition($url,$title,$trim = TRUE){
        parent::$position[5] = parent::makePositionPair($url,$trim ? self::positionTrim($title) : $title);
    }

    static public function makeSixPosition($url,$title,$trim = TRUE){
        parent::$position[6] = parent::makePositionPair($url,$trim ? self::positionTrim($title) : $title);
    }
}
?>
