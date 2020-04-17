<?php

class Db_connect{

   protected function OpenCon() {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "ZsaZsa159";
        $db = "phpproject";
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
    
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        return $conn;
    }

}



?>