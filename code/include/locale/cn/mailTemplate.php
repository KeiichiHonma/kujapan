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
    public function makeRegistUserMail($mail,$time,$customer_no,$account,$password){
        $this->message .= '非常感谢您本次购买“日游酷棒”优惠券任您选。'."\n\n";
        
        $this->message .= '■客户编号:'.$customer_no."\n";
        $this->message .= '■购买日期:'.date("Y/n/d G:i",$time)."\n";
        $this->message .= '■登录账户:'.$account."\n";
        $this->message .= '■登录密码:'.$password."\n\n";
        
        $this->message .= '［＊注意事项＊］'."\n";
        $this->message .= '通过本邮件中的客户编号以及登录信息来证明您已经购买了优惠券，'."\n";
        $this->message .= '请注意保管好这些信息。'."\n\n";
        
        $this->message .= '希望您今后能继续使用日游酷棒。 '."\n\n";
        
        $this->message .= '请不要直接回复本邮件，'."\n";
        $this->message .= '如有任何问题请咨询“日游酷棒热线中心”。'."\n";
        
        $this->message .= "\n\n*****************************************************************\n\n";
        $this->message .= '日游酷棒:'.KUJAPANURL.'/'."\n";
        $this->message .= '日游酷棒热线中心:4000-161716'."\n";
        $this->message .= '公司名称:北京九五太维资讯有限公司';
        $this->message .= "\n\n*****************************************************************\n\n";
    }
}
?>
