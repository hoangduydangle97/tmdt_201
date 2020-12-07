<?php
class Database{
    protected $conn;
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "tmdt";

    final public function __construct(){
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password);
        mysqli_select_db($this->conn, $this->dbname);
        mysqli_query($this->conn, "SET NAMES 'utf-8'");
    }

    public function query_return_arr($sql){
        $array_result = array();
        $sql_result = mysqli_query($this->conn, $sql);
        if($sql_result){
            while($row = mysqli_fetch_assoc($sql_result)){
                $array_result[] = $row;
            }
        }
        return json_encode($array_result);
    }

    public function query_return_row($sql){
        $sql_result = mysqli_query($this->conn, $sql);
        $result = false;
        if($sql_result){
            $result = mysqli_fetch_assoc($sql_result);
        }
        return json_encode($result);
    }

    public function query_return_num_rows($sql){
        $sql_result = mysqli_query($this->conn, $sql);
        $num_rows = 0;
        if($sql_result){
            $num_rows = mysqli_num_rows($sql_result);
        }
        return json_encode($num_rows);
    }

    final public function __destruct(){
        mysqli_close($this->conn);
    }
}
?>