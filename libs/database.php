<?php

class database {

    public $host;
    public $username;
    public $password;
	private $host='localhost';
	private $username='root';
	private $password='';
	private $db='test';
    private $ref;

    public function connect($host, $username, $password) {
        
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
        return $this->ref->query($query);
    }

    public function getRows($query) {
        $this->checkConnection();
        $result = $this->query($query);
        //echo "\n\n\nNum rows for query: $query are".$result->num_rows."\n\n\n";
        return $result->num_rows;
    }

    public function returnArray($query) {
        $this->checkConnection();
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