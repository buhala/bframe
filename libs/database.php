<?php

class database extends b_library{

    
    private $host='localhost';
    private $username='root';
    private $password='';
    private $query;
    private $db='test';
    private $ref;
    public function __construct() {
        parent::__construct();
    }
    public function connect() {
        
        $this->ref = mysqli_connect($this->host, $this->username, $this->password, $this->db) or die('Check MySQL Connection');
        return $this->ref; //For development purposes;
    }

    public function escape($string) {
        $this->checkConnection();
        $rs = mysqli_real_escape_string($this->ref,$string);
        //echo "\n\n\n\n\n".'RESULT:'.$rs;
        return $rs;
    }

    public function getError() {
        $this->checkConnection();
        return mysqli_error($this->ref);
    }

    public function selectDB($db) {
        //	  $this->checkConnection();
        //  return @mysql_select_db($db, $this->ref);
    }

    public function query($query) {
        //echo "\n\n\n QUERY $query \n\n\n";
        $this->checkConnection();
        $this->query=$this->ref->query($query);
        return $this->query;
    }

    public function getRows($query=null) {
        $this->checkConnection();
        if($query==null){
            $query=$this->query;
        }
        if(is_object($query)){
            $result=$query;
        }
        else{
            $result=$this->query($query);
        }
        //echo "\n\n\nNum rows for query: $query are".$result->num_rows."\n\n\n";
        return $result->num_rows;
    }

    public function returnArray($query=null) {
        $this->checkConnection();
        if($query==null){
            $query=$this->query;
        }
        if(is_object($query)){
            $result=$query;
        }
        else{
            $result=$this->query($query);
        }
    
        $result = $this->query($query);
        if (@mysqli_num_rows($result) != 0) {
            $arr = array();
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
        } else {
            $arr = array();
        }
        //echo "";
        return $arr;
    }
    public function returnObject($query=null) {
        $this->checkConnection();
        if($query==null){
            $query=$this->query;
        }
        if(is_object($query)){
            $result=$query;
        }
        else{
            $result=$this->query($query);
        }
        if (@mysqli_num_rows($result) != 0) {
            $arr = array();
            while ($row = $result->fetch_object()) {
                $arr[] = $row;
            }
        } else {
            $arr = array();
        }
        //echo "";
        return $arr;
    }
    public function checkConnection() {
        if (!mysqli_ping($this->ref)) {
            @$this->connect($this->host, $this->username, $this->password);
        }
    }

    public function disconnect() {
        return @mysqli_close($this->ref);
    }

    public function __destruct() {
        $this->disconnect();
    }

}

?>
