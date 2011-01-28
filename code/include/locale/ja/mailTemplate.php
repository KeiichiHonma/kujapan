<?php
class mailTemplate
{
    public $message = '';

    public function makeRegistSubject(){
        return '[日游酷棒]ご購入ありがとうございます';
    }

    public function makeRegistAdminSubject(){
        return 'kujapan.com:決済連絡';
    }

    //ユーザー登録
    public function makeRegistUserMail($mail,$time,$customer_no,$account,$password){
        $this->message .= 'このたびは「日游酷棒」クーポン取り放題をご購入いただきまして、誠にありがとうございます。'."\n\n";
        
        $this->message .= '■お客様番号:'.$customer_no."\n";
        $this->message .= '■ご購入日時:'.date("Y/n/d G:i",$time)."\n";
        $this->message .= '■ログインアカウント:'.$account."\n";
        $this->message .= '■ログインパスワード:'.$password."\n\n";
        
        $this->message .= '【ご注意】'."\n";
        $this->message .= '本メールに記載のお客様番号やログイン情報はお客様の購入を証明するものです。'."\n";
        $this->message .= '大切に保管してください。'."\n\n";
        
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
