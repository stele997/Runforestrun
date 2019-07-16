<?php
require_once("config.php");
session_start();

try{
$connection = new PDO("mysql:host=".MYSQL_HOST.";dbname=".MYSQL_DBNAME,MYSQL_USER,MYSQL_PASS);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}catch(PDOException $e){
        echo "Failed to connect to data base".$e->getMessage();
}
