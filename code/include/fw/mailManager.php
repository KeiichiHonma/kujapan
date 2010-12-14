<?php

class mailManager
{
    private $mail;
    private $mail_template;
    
    private $halt_real = array
    (
        array( 'halt@iluna.co.jp' , 'halt' )
    );

    private $halt_debug = array
    (
        array( 'honma@zeus.corp.iluna.co.jp' , 'halt' )
    );

    private $dev_real = array
    (
        array( 'keiichi-honma@iluna.co.jp' , 'dev' )
    );

    private $dev_debug = array
    (
        array( 'honma@zeus.corp.iluna.co.jp' , 'halt' )
    );

    //イルナに送る
    private $iluna_real = array
    (
        array( 'info@iluna.co.jp' , '[日游酷棒]' )
    );

    private $iluna_debug = array
    (
        array( 'honma@zeus.corp.iluna.co.jp' , '[日游酷棒]' )
    );
    
    //comで使用するアドレス
    private $com_real = array
    (
        array( 'kujapan@95teleweb.com' , '[日游酷棒]' )
    );

    private $com_debug = array
    (
        array( 'honma@zeus.corp.iluna.co.jp' , '[日游酷棒]' )
    );

    //netで使用するアドレス
    private $net_real = array
    (
        array( 'kujapan-n@95teleweb.com' , '[日游酷棒]' )
    );

    private $net_debug = array
    (
        array( 'honma@zeus.corp.iluna.co.jp' , '[日游酷棒]' )
    );

    function __construct(){
        require_once('fw/qdmail.php');
        mb_language('uni');
        $this->mail =  new Qdmail();
        $this->mail  -> charsetHeader( 'utf-8' ) ;
        $this->mail  -> charsetBody( 'utf-8','Base64') ;
    }

    private function callTemplate(){
        require_once('locale/'.LOCALE.'/mailTemplate.php');//翻訳ファイル
        //require_once('fw/mailTemplate.php');
        $this->mail_template = new mailTemplate();
    }

    private function append(){
        //戻し
        $this->mail_template->ca_url = null;
        $this->mail_template->ca_url_ssl = null;
    }

    //宛先/////////////////////////////////////////////////////////////////////////////////////////////////
    public function sendHalt($body){
        global $con;
        if($con->isDebug){
            $this->mail-> to( $this->halt_debug );
        }else{
            $this->mail-> to( $this->halt_real );
        }

        $body .= "\n\nhalt----------------------------------------------------\n\n";
        $body .= 'URL : '.$_SERVER['SCRIPT_NAME']."\n";
        if(isset($_SERVER['HTTP_REFERER'])) $body .= 'REFERER : '.$_SERVER['HTTP_REFERER']."\n";
        $body .= 'USER_AGENT : '.$_SERVER['HTTP_USER_AGENT']."\n";
        $body .= 'ADDR : '.$_SERVER['REMOTE_ADDR']."\n";

        $this->mail-> subject(LOCALE.':kujapan:Halt');
        $this->mail->text($body);
        $this->setFrom();
        $this->mail->send();
    }

    public function sendLog($body){
        global $con;
        if($con->isDebug){
            $this->mail-> to( $this->iluna_debug );
        }else{
            $this->mail-> to( $this->iluna_real );
        }
        
        $body .= "\n\nlog----------------------------------------------------\n\n";
        $body .= 'URL : '.$_SERVER['SCRIPT_NAME']."\n";
        if(isset($_SERVER['HTTP_REFERER'])) $body .= 'REFERER : '.$_SERVER['HTTP_REFERER']."\n";
        $body .= 'USER_AGENT : '.$_SERVER['HTTP_USER_AGENT']."\n";
        $body .= 'ADDR : '.$_SERVER['REMOTE_ADDR']."\n";
        
        $this->mail-> subject(LOCALE.':kujapan:Log');
        $this->mail->text($body);
        $this->setFrom();
        $this->mail->send();
    }

    private function setRegistTo($mail){
        global $con;
        if($con->isDebug){
            $this->mail -> to( array($mail) );
            $this->mail -> bcc( $this->iluna_debug );
        }else{
            $this->mail -> to( array($mail) );
            $this->mail -> bcc( $this->iluna_real );
        }
    }

    private function setInquiryTo($mail){
        $this->mail -> to( array($mail) );
    }

    private function setIlunaTo(){
        global $con;
        if($con->isDebug){
            $this->mail -> to( $this->iluna_debug );
        }else{
            $this->mail -> to( $this->iluna_real );
        }
    }

    private function setFrom(){
        //twとcnではfromのアドレスがことなる
        global $con;
        if(strcasecmp(LOCALE,LOCALE_TW) == 0){
            if($con->isDebug){
                $this->mail->from( $this->net_debug );
            }else{
                $this->mail->from( $this->net_real );
            }
        }else{
            if($con->isDebug){
                $this->mail->from( $this->com_debug );
            }else{
                $this->mail->from( $this->com_real );
            }
        }
    }

    //基本処理///////////////////////////////////////////////////////////////////////////////////////
    //登録
    public function sendRegistUser($mail,$time,$customer_no,$account,$password){
        $this->callTemplate();//言語チェック
        $this->setRegistTo($mail);
        
        $this->mail->subject($this->mail_template->makeRegistSubject());
        
        $this->mail_template->makeRegistUserMail($mail,$time,$customer_no,$account,$password);
        
        $this->mail->text($this->mail_template->message);
        
        $this->setFrom();
        $this->mail->send();
        $this->append();
    }

    public function sendInquiry($isIluna = FALSE){
        require_once('inquiry/form.php');
        $form = new inquiryForm();
        if($isIluna){
            $this->setIlunaTo();
        }else{
            //$mail = $_POST['mail'];
            $this->setInquiryTo($_POST['mail']);
        }
        
        $subject = $isIluna ? LOCALE.':[日游酷棒]お問い合わせ' : '[日游酷棒]お問い合わせありがとうございます';
        $this->mail->subject($subject);
        
        //$this->mail_template->makeRegistUserMail($mail,$given_name,$customer_no,$time,$account,$password);
        $message = '';
        $message .= '────────────────────────────────────────'."\n";
        $message .= '                 '.$subject."\n";
        $message .= '─────────────────────────── '.date("Y/n/j",time()).' ─────'."\n\n";


        $message .= $_POST['name']." 様\n\n";
        $message .= 'この度は[日游酷棒]へのお問い合わせ誠にありがとうございます'."\n\n";

        $message .= "お問い合わせ内容----------------------------------------------------\n";
        $message .= '●会社名'."\n";
        $message .= $_POST['company']."\n";
        
        $message .= '●部署名'."\n";
        $message .= $_POST['division']."\n";

        $message .= '●氏名'."\n";
        $message .= $_POST['name']."\n";

        $message .= '●氏名（フリガナ）'."\n";
        $message .= $_POST['kana']."\n";

        $message .= '●貴社サイトURL'."\n";
        $message .= $_POST['url']."\n";
        $message .= '●メールアドレス'."\n";
        $message .= $_POST['mail']."\n";

        $message .= '●電話番号'."\n";
        $message .= $_POST['telephone1'].'－'.$_POST['telephone2'].'－'.$_POST['telephone3']."\n";
        $message .= '●FAX番号'."\n";
        $message .= $_POST['fax1'].'－'.$_POST['fax2'].'－'.$_POST['fax3']."\n";
        $message .= '●郵便番号'."\n";
        $message .= $_POST['postcode1'].'－'.$_POST['postcode2']."\n";
        $message .= '●住所'."\n";
        $message .= $_POST['address']."\n";


        $message .= '●日遊酷棒を知ったきっかけ'."\n";
        foreach ($form->trigger as $key => $value){
            if(isset($_POST[$key])){
                $message .= $form->trigger[$key];
                
                if($key == 'media_check' && isset($_POST['media_name'])){
                    $message .= ' '.$_POST['media_name'];
                }elseif($key == 'etc_check' && isset($_POST['etc_name'])){
                    $message .= ' '.$_POST['etc_name'];
                }
                $message .= "\n";
            }
        }

        $message .= '●ご質問など'."\n";
        $message .= $_POST['detail']."\n";
        if(!$isIluna){
            $message .= "\n".'後日、担当者よりご連絡させていただきます。'."\n";
            $message .= '今後とも「日遊酷棒」を宜しくお願いいたします。 '."\n";


            $message .= "\n".'────────────────────────────────────┐'."\n";
            $message .= 'URL：http://www.oshiete-ca.com/'."\n";
            $message .= 'E-Mail：info@iluna.co.jp'."\n";
            $message .= '運営会社：株式会社イルナ'."\n";
            $message .= '────────────────────────────────────┘'."\n";
        }

        $this->mail->text($message);
        
        $from = array
        (
            array( 'info@iluna.co.jp' , '株式会社イルナ' )
        );
        $this->mail->from( $from );
        $this->mail->send();
        $this->append();
    }

    //デバッグ
    public function sendDebug($string){
        global $con;
        if($con->isDebug){
            $this->mail-> to( $this->dev_debug );
        }else{
            $this->mail-> to( $this->dev_real );
        }
        
        $this->mail-> subject('デバッグ');
        $this->mail->text($string);
        $this->setFrom();
        $this->mail->send();
    }
}
?>
