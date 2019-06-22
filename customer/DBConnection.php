<?php

    define("DB_SERVER","localhost");
    define("DB_USERNAME","root");
    define("DB_PASSWORD","");
    define("DB_NAME","himall");

    class DBConnection{

        public $conn;
        function __constructor(){
            $this->conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD) or die ("Error ".mysqli_error());
            mysqli_select_db($this->conn,DB_NAME);
        }    
        public function closeConnection(){
            mysqli_close($this->conn);
        }
        public function getConnection(){
            return $this->conn;
        }
    }
?>