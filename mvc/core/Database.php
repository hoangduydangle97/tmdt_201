<?php
class Database{
    protected $conn;
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "tmdt";

    public function __construct(){
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password);
        mysqli_select_db($this->conn, $this->dbname);
        mysqli_query($this->conn, "SET NAMES 'utf-8'");
    }

    public function __destruct(){
        mysqli_close($this->conn);
    }
}
?>