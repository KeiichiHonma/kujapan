<?php
require_once('fw/parameterManager.php');
require_once('file/table.php');
class filesParameter extends parameterManager
{
    public $file_object = null;
    public $file_tmp = '';
    public $file_name = '';
    public $file_extension = '';
    public $file_size = 0;
    public $file_mime  = '';
    public $file_width  = 0;
    public $file_height  = 0;
    public $dir_file;
    public $ext = '';
    public $alt_ja = '';
    public $alt_cn = '';
    public $alt_tw = '';
    
    function __construct($upload_file,$loop_number){
        $this->initFiles();//初期化
        if(!is_null($upload_file)){
            //アップロードファイルオブジェクト
            $this->file_object = $upload_file;
            //tmpファイル名
            $this->file_tmp = $loop_number !== FALSE ? $upload_file['tmp_name'][$loop_number] : $upload_file['tmp_name'];
            //ローカルファイル名
            $fname = mb_convert_encoding($loop_number !== FALSE ? $upload_file['name'][$loop_number] : $upload_file['name'],'utf-8',"auto");
            $fname_tmp = strrchr($fname,"\\");
            if($fname_tmp != FALSE){
                $fname_tmp2 = explode("\\",$fname_tmp);
                $fname = $fname_tmp2['1'];
            }
            $this->file_name  = $fname;
            //拡張子
            $this->file_extension = substr($this->file_name,-3);
            //ファイルサイズ
            $this->file_size = $loop_number !== FALSE ? $upload_file['size'][$loop_number] : $upload_file['size'];
            //ファイルの種類
            $this->file_mime = $loop_number !== FALSE ? $upload_file['type'][$loop_number] : $upload_file['type'];
            //ファイルの横幅
            $ary_image_size = getimagesize($this->file_tmp);
            $this->file_width = $ary_image_size['0'];
            //ファイルの立幅
            $this->file_height = $ary_image_size['1'];
            //alt.3言語あることに注意
            //$this->alt = is_null($alt) ? $fname : $alt;
            if(isset($_POST['alt_'.LOCALE_JA])) $this->alt_ja = $_POST['alt_'.LOCALE_JA];
            if(isset($_POST['alt_'.LOCALE_CN])) $this->alt_cn = $_POST['alt_'.LOCALE_CN];
            if(isset($_POST['alt_'.LOCALE_TW])) $this->alt_tw = $_POST['alt_'.LOCALE_TW];
        }else{
            //alt
            //$this->alt = $alt;
            if(isset($_POST['alt_'.LOCALE_JA])) $this->alt_ja = $_POST['alt_'.LOCALE_JA];
            if(isset($_POST['alt_'.LOCALE_CN])) $this->alt_cn = $_POST['alt_'.LOCALE_CN];
            if(isset($_POST['alt_'.LOCALE_TW])) $this->alt_tw = $_POST['alt_'.LOCALE_TW];
        }

    }

    //ファイル情報を初期化
    public function initFiles(){
        $this->file_object = null;
        $this->file_tmp = '';
        $this->file_name = '';
        $this->file_extension = '';
        $this->file_size = 0;
        $this->file_mime  = '';
        $this->file_width  = 0;
        $this->file_height  = 0;
        $this->dir_file = '';
    }

    public function setAdd(){
        parent::readyAddParameter();
        $this->setParameter();
    }

    public function setUpdate($fid){
        parent::readyUpdateParameter($fid);
        $this->setParameter();
    }
    
    public function setDelete($fid){
        parent::readyDeleteParameter($fid);
    }

    //checkが済んでいる前提なのでNOチェック
    public function setParameter(){
        if(!is_null($this->file_object)){
            $this->parameter['name'] = $this->file_name;
            $this->parameter['size'] = $this->file_size;
            $this->parameter['mime'] = $this->file_mime;
            $this->parameter['extension'] = $this->file_extension;
            $this->parameter['width'] = $this->file_width;
            $this->parameter['height'] = $this->file_height;
        }
        $this->parameter['alt_ja'] = $this->alt_ja;
        $this->parameter['alt_cn'] = $this->alt_cn;
        $this->parameter['alt_tw'] = $this->alt_tw;
    }
}
?>