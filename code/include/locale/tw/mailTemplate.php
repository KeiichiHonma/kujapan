<?php
class mailTemplate
{
    public $message = '';

    public function makeRegistSubject(){
        return '[日游酷棒]感謝您的購買';
    }

    public function makeRegistAdminSubject(){
        return 'kujapan.net:決済連絡';
    }

    //ユーザー登録
    public function makeRegistUserMail($mail,$time,$customer_no,$account,$password){
        $this->message .= '非常感謝您本次購買“日遊酷棒”優惠券任您選。'."\n\n";
        
        $this->message .= '■客戶編號:'.$customer_no."\n";
        $this->message .= '■購買日期:'.date("Y/n/d G:i",$time)."\n";
        $this->message .= '■登錄賬戶:'.$account."\n";
        $this->message .= '■登錄密碼:'.$password."\n\n";
        
        $this->message .= '［＊注意事項＊］'."\n";
        $this->message .= '通過本郵件中的客戶編號以及登錄信息來證明您已經購買了優惠券，'."\n";
        $this->message .= '請注意保管好這些信息。'."\n\n";
        
        $this->message .= '希望您今後能繼續使用日遊酷棒。'."\n\n";
        
        $this->message .= '請不要直接回複本郵件，'."\n";
        $this->message .= '如有任何問題請咨詢“日遊酷棒熱線中心”。'."\n";
        
        $this->message .= "\n\n*****************************************************************\n\n";
        $this->message .= '日游酷棒:'.KUJAPANURL.'/'."\n";
        $this->message .= '日游酷棒客服中心:info@813.co.jp'."\n";
        $this->message .= '公司名稱:北京九五太维资讯有限公司';
        $this->message .= "\n\n*****************************************************************\n\n";
    }

}
?>
