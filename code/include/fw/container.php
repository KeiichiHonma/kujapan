<?php
require_once('fw/define.php');
require_once('fw/database.php');//db
require_once('fw/template.php');//template
require_once('fw/base.php');//template
require_once('area/logic.php');//area
require_once('genre/logic.php');//genre
require_once('fw/sessionManager.php');
//require_once('fw/positionManager.php');
class container
{
    public $db = null;
    public $t = null;
    public $base = null;
    //public $common_locale;//共通翻訳ファイル
    public $locale;//ファイル別翻訳ファイル
    
    //public $user = null;
    public $area = null;
    public $genre = null;
    public $isPost = FALSE;
    public $ini;
    public $isDebug = FALSE;
    public $isSystem = FALSE;
    public $lastJudge = TRUE;//ロールバックかコミットの判断
    public $session;
    public $csrf;
    //public $pagefullpath;
    public $pagepath;
    public $pagename;
    public $tail_number;
    public $isDocomo = FALSE;
    
    public $isIluna = FALSE;//メンテナンス中の表示
    
    //携帯でfiles配下の画像を表示するための設定。ステージングと本番で設定が異なるため、init処理で設定しています。
    public $url;
    public $m_url;
    public $absolute_path;//相対パスだとm.を見てしまうため、絶対パスとして持っている必要があるため
    
    function __construct(){
        $this->t = new template();
        $this->checkIni();
        $this->t->readyTemplate($this->isDebug);
        $this->init();
        
        //page set
        preg_match('/\/([\D]+)\./i', $_SERVER['SCRIPT_NAME'], $matches);

        $this->pagepath = $matches[1];
        $this->pagename = basename($_SERVER['SCRIPT_NAME'],'.php');
        $cache = $this->pagename == 'input' || $this->pagename == 'login' ? TRUE : FALSE;

        //is system ?
        $this->isSystem = ereg("^system", $matches[1]);

        //is payment initialize ?
        if(!strstr($this->pagepath,'payment') && !strstr($this->pagepath,'initialize')){
            $this->t->assign('buy_btn_display',TRUE);
        }
        //locale
        if(!$this->isSystem){
            $this->checkLocale();
        }else{
            define('LOCALE',LOCALE_JA);
        }

        //position include.ロケール変数が必要
        $this->isSystem ? require_once('fw/systemPosition.php') : require_once('fw/commonPosition.php');

        $this->session = new sessionManager($cache);//セッション開始
        
        $this->db = new database();

        $this->base = new base();
        $this->area = new areaLogic();
        $this->genre = new genreLogic();

        $this->t->assign('area',$this->area->area_info);
        $this->t->assign('genre',$this->genre->genre_info);
        
        $this->tail_number = time();
        $this->t->assign('tail_number',$this->tail_number);//末尾の数字
    }

    //ドメイン版
    private function checkLocale(){
        switch ($_SERVER['SERVER_NAME']){
            case SERVER_NAME_TW:
                define('LOCALE',LOCALE_TW);//繁体字
            break;

            case SERVER_NAME_JA:
                define('LOCALE',LOCALE_JA);
            break;

            default:
                define('LOCALE',LOCALE_CN);//簡体字
            break;
        }
        if(file_exists($_SERVER['DOCUMENT_ROOT'].'/include/locale/'.LOCALE.$_SERVER['SCRIPT_NAME'])){
            require_once('locale/'.LOCALE.$_SERVER['SCRIPT_NAME']);//ファイル別翻訳ファイル
        }
        
        $this->locale = $locale;//翻訳内容
    }

    //locale 変数 変更
    public function updateLocaleValue($key,$value){
        $this->locale[$key] = $value;
    }

    //localeファイル直指定。特集ページ等
    public function getLocaleFile($file_path){
        require_once('locale/'.LOCALE.$file_path.'.php');//ファイル別翻訳ファイル
    }

    public function checkPostCsrf(){
        require_once('fw/csrf.php');//csrf処理
        $this->csrf = new csrf();
        if(strcasecmp($_SERVER['REQUEST_METHOD'],'POST') === 0){
            $this->isPost = TRUE;
            //check
            $this->csrf->validateToken(@$_POST['csrf_ticket']);
        }
    }

    public function readyPostCsrf(){
        $this->csrf->getToken();
    }

    private function checkIni(){
        $this->ini = parse_ini_file(SETTING_INI, true);
        if($this->ini['common']['isDebug'] == 0){//本番
            $this->isDebug = FALSE;
            define('SERVER_NAME_JA',      'www.kujapan.net');
            define('SERVER_NAME_CN',      'www.kujapan.com');
            define('SERVER_NAME_TW',      'www.kujapan.net');
        }elseif($this->ini['common']['isDebug'] == 1){//デバッグモード
            if($this->ini['common']['country'] == "tw"){
                $this->isDebug = TRUE;
                define('SERVER_NAME_JA',      'ja.kujapan.artemis.corp.iluna.co.jp');
                define('SERVER_NAME_CN',      'cn.kujapan.artemis.corp.iluna.co.jp');
                define('SERVER_NAME_TW',      'tw.kujapan.artemis.corp.iluna.co.jp');
            }else{
                $this->isDebug = TRUE;
                define('SERVER_NAME_JA',      'ja.kujapan.apollon.corp.iluna.co.jp');
                define('SERVER_NAME_CN',      'cn.kujapan.apollon.corp.iluna.co.jp');
                define('SERVER_NAME_TW',      'tw.kujapan.apollon.corp.iluna.co.jp');
            }

        }
        define('KUJAPANURL',            'http://'.$_SERVER['SERVER_NAME']);
        define('KUJAPANURLSSL',         'https://'.$_SERVER['SERVER_NAME']);

        //メンテナンスモード
        if($this->ini['common']['isMaintenance'] == 1){
            //ilunaはOK
            if($this->ini['common']['isStage'] == 1){//ステージングサーバモード
                $ip = '192.168.0.52';
            }
            
            if($this->ini['common']['isDebug'] == 0){//本番
                $ip = '210.189.109.177';
            }
            
            if(!isset($_SERVER['REMOTE_ADDR']) || !isset($ip) || strcasecmp($_SERVER['REMOTE_ADDR'],$ip) != 0){
                header( "HTTP/1.1 302 Moved Temporarily" );
                header("Location: ".KUJAPANURL.'/maintenance');
                die();
            }
        }
        $this->t->assign('debug',$this->isDebug);
    }

    public function safeExitRedraw(){
        if($this->lastJudge) $this->db->commit();
        header("Location: ".$_SERVER['REQUEST_URI']);
        die();
    }

    public function safeExitRedirect($page,$isSSL = FALSE){
        if($this->lastJudge) $this->db->commit();
        $isSSL ? header("Location: ".KUJAPANURLSSL.$page) : header("Location: ".KUJAPANURL.$page);
        die();
    }

    public function safeExit(){
        if($this->lastJudge) $this->db->commit();
    }

    //no commit
    public function errorExitRedirect($page,$isSSL = FALSE){
        //header( "HTTP/1.1 301 Moved Permanently" );
        $isSSL ? header("Location: ".KUJAPANURLSSL."/".$page) : header("Location: ".KUJAPANURL."/".$page);
        die();
    }

    public function append($page = null){
        positionManager::setSitePosition();
        $this->t->assign('locale',$this->locale);
        // display it
        is_null($page) ? $this->t->display($this->pagepath.'.tpl') : $this->t->display($page.'.tpl');
    }
    
    
    private function init(){
        //アクセス端末によって、ＰＣ用かモバイル用にリダイレクト
        if($this->ini['common']['isDebug'] == 0){//本番
            $this->url = 'www.coupon.com';
            $this->absolute_path = '/home/httpd/vhosts/coupon.com/httpdocs';

        }elseif($this->ini['common']['isDebug'] == 1){//デバッグモード
            if($this->ini['common']['isStage'] == 1){//ステージングサーバモード
                $this->url = 'coupon.iluna.co.jp';
                define('MAPKEY',            'ABQIAAAAkfZHX0mVewCCbI2JJSApjBRUMSngWG9tZSltYiStqiCLUOPfoRTeLtPil2Wu84SPQJJBAr7fMRFyvQ');//テスト環境は１つでいけます
            }else{
                define('MAPKEY',            'ABQIAAAAkfZHX0mVewCCbI2JJSApjBRZsb_5q8hAjE2LUKFLr2EBYBV29RQ1Ez6w28Oa-Yn2COazCHQ4L7HrAA');//テスト環境は１つでいけます
            }
            $this->absolute_path = '/usr/local/apache2/htdocs/coupon';
        }
        //本番とステージングのみリダイレクトイルナ除外
        if(!$this->isIluna){
            if($this->ini['common']['isDebug'] == 0) define('MAPKEY','ABQIAAAAkfZHX0mVewCCbI2JJSApjBR2cj_7e9zdIEYEoQSiol4Ispkj3BQkj1lkWl9x1vnFymPFE4bvYHymiQ');//本番環境は2ついります
        }
    }

    //リダイレクト用
    function redraw($url = KUJAPANURL,$isPCURL = FALSE){
        if($this->lastJudge) $this->db->commit();
        header("Location: ".$url.$_SERVER['REQUEST_URI']);
        die();
    }
}
?>