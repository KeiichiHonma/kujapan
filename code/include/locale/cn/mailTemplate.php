<?php
class mailTemplate
{
    public $message = '';

    public function makeRegistSubject(){
        return '[日游酷棒]感谢您的购买';
    }

    public function makeRegistAdminSubject(){
        return 'kujapan.com:決済連絡';
    }

    //ユーザー登録
    public function makeRegistUserMail($mail,$uid){
        $this->message .= '「日游酷棒」をご利用いただきまして、誠にありがとうございます。'."\n\n";
        
        $this->message .= '【以下のURLからクーポン券の購入処理を進めてください】'."\n";
        $this->message .= KUJAPANURLSSL.'/payment/bridge/uid/'.$uid."\n";
        
        $this->message .= '今後とも日游酷棒をご愛顧賜りますようお願い申し上げます。'."\n\n";
        
        $this->message .= 'このメールにご返信いただいてもご返答いたしかねます。'."\n";
        $this->message .= 'お手数ですが、以下の「お客様コンタクトセンター」よりお問い合わせください。'."\n";
        
        $this->message .= "\n\n*****************************************************************\n\n";
        $this->message .= '日游酷棒:'.KUJAPANURLSSL.'/'."\n";
        $this->message .= 'お客様コンタクトセンター: 4000-161716'."\n";
        $this->message .= '発信元:北京九五太维资讯有限公司';
        $this->message .= "\n\n*****************************************************************\n\n";
    }
}
?>
