<?php
$serverName = "localhost";
$sqluser = "root";
$sqlpass = "";
$dbName = "bloom_db";

$conn = mysqli_connect(
    $serverName, 
    $sqluser, 
    $sqlpass, 
    $dbName);
    if(!$conn){
        die('could not connect to the Bloom Database:'.mysqli_connect_error());
    };
class bloom_functions{
        private $serverName = "localhost";
        private $sqluser = "root";
        private $sqlpass = "";
        private $dbName = "bloom_db";
    function connect_bloom()
    {
        $conn = mysqli_connect($this->serverName,$this->sqluser,$this->sqlpass,$this->dbName);
            if(!$conn){
                die('could not connect to the Bloom Database:'.mysqli_connect_error());
            };
            return $conn;
    }
    function read($q)
    {
        $connect = $this->connect_bloom();
        $result = mysqli_query($connect, $q);
        if(!$result){
            return false;
        } else {
            $holder = false;
            while($row = mysqli_fetch_assoc($result)){
                $holder[] = $row;
            }
            return $holder;
        }
    }
    function save($q){
        $connect = $this->connect_bloom();
        $result = mysqli_query($connect, $q);
        if(!$result){
            return false;
        } else {
            return true;
        }
    }
}
?>