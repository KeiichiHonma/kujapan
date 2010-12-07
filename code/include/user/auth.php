<?php
define('SESSION_POSITION',  'POSITION');
define('COOKIE_PASSPORT',          'PASSPORT');
define('COOKIE_PASSPORT_EXPIRE',   7776000);//90日

require_once('fw/authManager.php');
class userAuth extends authManager
{
    function __construct($isUser = TRUE){
        parent::__construct($isUser);
    }

    private function isAutoCookie(){
        return isset($_COOKIE[COOKIE_PASSPORT]);
    }

    public function keepDisplayRedirect($redraw = null){
        global $con;
        $position = $con->session->get(SESSION_POSITION);
        $position !== FALSE ? $con->safeExitRedirect($position) : is_null($redraw) ? $con->safeExitRedraw() : $con->safeExitRedirect($redraw);
    }

    public function savePositionRedirect(){
        global $con;
        $position = $con->session->get(SESSION_POSITION);
        $con->safeExitRedirect($position);
    }

    //手動ログイン時 - ユーザ名とパスワードを入力してログイン////////////////////////////////////////////////////////
    //注意点：auto login での認証は実施しない。セットアップのみ
    public function login($account,$password,$isAutologin,$checkOnly = FALSE){
        //認証開始前にチェック
        require_once('user/check.php');
        checkLogin::checkError();

        if(checkLogin::safeExit()){
            require_once('user/logic.php');
            $logic = new userLogic();
            $user = $logic->getRowForAuth($account,ALL);
            if(!$user){
                //require_once('fw/error_code.php');
                require_once('locale/'.LOCALE.'/error_code.php');
                checkLogin::$error['all'] = constant(E_AUTH_NG);
            }elseif(!$this->validatePassword( $password, $user[0]['col_salt'], $user[0]['col_password'] )){
                //require_once('fw/error_code.php');
                require_once('locale/'.LOCALE.'/error_code.php');
                checkLogin::$error['all'] = constant(E_AUTH_NG);
            }
            
            if(checkLogin::safeExit()){
                if($checkOnly) return $user;
                global $con;
                
                //初期化チェック
                if(strcasecmp($user[0]['col_status'],STATUS_USER_TMP) == 0){
                    require_once('user/logic.php');
                    $logic = new tmpRegistLogic();
                    $rand = $logic->getTmpRegistRand($account,$password);
                    if(!$rand){
                        //ありえないエラー
                        require_once('fw/errorManager.php');
                        errorManager::throwError(E_CMMN_INITIALIZE_RAND);
                    }else{
                        $con->safeExitRedirect('/initialize/input/code/'.$rand,TRUE);
                    }
                }else{
                    //有効期限チェック
                    if($user[0]['col_validate_time'] < time()){
                        require_once('fw/errorManager.php');
                        errorManager::throwError(E_CMMN_VALIDATE_TIME);
                    }
                    //auto login
                    $this->resetPassport($user[0]['_id']);//auto login 設定
    /*                if($isAutologin == 1){
                        $this->resetPassport($user[0]['_id']);//auto login 設定
                    }else{
                        $this->unsetPassport();//auto login 設定しない
                    }*/
                    //認証成功
                    $this->setLogin($user);
                    //最終ログイン時間更新
                    $this->setLastLogin($user[0]['_id']);
                    //return TRUE;
                    
                    $con->redraw();
                    //$this->keepDisplayRedirect();
                }
            }
        }
        return FALSE;
    }

    //強制ログイン時 - 決済完了後////////////////////////////////////////////////////////
    public function loginEnforce($uid){
        require_once('user/logic.php');
        $logic = new userLogic();
        $user = $logic->getUser($uid,ALL);
        
        //auto login 設定
        $this->resetPassport($user[0]['_id']);
        //認証成功
        $this->setLogin($user);
        //最終ログイン時間更新
        $this->setLastLogin($user[0]['_id']);
        //return TRUE;
        //$this->savePositionRedirect();
        return TRUE;
    }

    public function logout($isRedirect = TRUE){
        $this->unsetPassport();
        $this->unsetLogin();
        if($isRedirect){
            global $con;
            //$con->safeExitRedirect('login',TRUE);
            $con->redraw();
        }
    }

    private function autoLogin(){
        if(!$this->isAutoCookie()) return FALSE;
        require_once('user/logic.php');
        $logic = new autoLoginLogic();
        $row = $logic->getVaridateRow($_COOKIE[COOKIE_PASSPORT],COOKIE_PASSPORT_EXPIRE);

        if($row === FALSE) return FALSE;//有効なパスポートが存在しない
        //auto login 成功とみなしメンバー情報を取得
        $logic = new userLogic();
        $user = $logic->getUser($row[0]['col_uid']);
        if(!$user) return FALSE;
        $this->resetPassport($row[0]['col_uid']);//リセット
        parent::setLogin($user);
        //最終ログイン時間更新
        $this->setLastLogin($user[0]['_id']);
        global $con;
        $con->redraw();
    }

    private function setLastLogin($uid){
        //user
        require_once('user/handle.php');
        $user_handle = new userHandle();
        $user_handle->updateLastLoginRow($uid);
    }

    //passportクッキーのセット
    private function setPassport($uid){
        //レコード追加
        require_once('user/handle.php');
        $handle = new autoLoginHandle();
        $handle->addRow($uid);
        setcookie(COOKIE_PASSPORT,$handle->parameter->passport, time() + COOKIE_PASSPORT_EXPIRE,'/' );

    }

    //passportクッキーの削除
    private function unsetPassport(){
        //レコード削除
        require_once('user/handle.php');
        $handle = new autoLoginHandle();
        if($this->isAutoCookie()){
            $handle->deletePassport($_COOKIE[COOKIE_PASSPORT]);
        }
        setcookie(COOKIE_PASSPORT,'',time() - 60);
    }

    //passportクッキーのリセット
    private function resetPassport($uid){
        $this->unsetPassport();
        $this->setPassport($uid);
    }

    //認証チェック 認証がNGの場合はauto login認証へ進む
    //認証していない場合シンプルにboolを返すだけ
    public function validateLogin(){
        if(!parent::isLogin()){
            //auto login確認
            if(!$this->autoLogin()) return FALSE;
        }
        //return TRUE;
        return $this->readyUser();//user変数セット
    }
}
?>