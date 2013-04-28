<?php
class encrypt extends b_library{
    public function __construct() {
        parent::__construct();
    }
    private function doHash($data,$algo){
        hash_hmac($algo, $data, $GLOBALS['config']['libraries']['hash']['salt']);
    }
    public function sha256($data){
        return $this->doHash($data, 'sha256');
    }
    public function md5($data){
        return $this->doHash($data, 'md5');
    }
    public function sha1($data){
        return $this->doHash($data,'sha1');
    }
    public function simple($data){
        return $this->sha256($this->md5($this->sha1($data)));
    }
}