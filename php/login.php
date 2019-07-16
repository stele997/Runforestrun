<?php
require "konekcija.php";
$greske=[];
$statusniKod=200;
$username=$_POST['username'];
$password=$_POST['password'];

$reUsername="/^[A-Za-z]{1}[A-Za-z0-9]{2,14}$/";
$rePassword="/^[\S]{6,25}$/";
if(!preg_match($reUsername,$username)){
    array_push($greske,"Username is not correct!");
    $statusniKod=422;
}
if(!preg_match($rePassword,$password)){
    array_push($greske,"Password is not correct!");
    $statusniKod=422;
}
if(count($greske)==0){
    $pass=md5($password);
    $upit= $connection->prepare("SELECT * FROM korisnik WHERE username = :user AND password= :pass AND aktivan = 1");
    $upit->bindParam(':user',$username);
    $upit->bindParam(':pass',$pass);
        
    try{
        $upit->execute();
        $rez=$upit->fetch();
        if($rez){
            $_SESSION['username']=$rez;
            echo "index.php";
        }
        
    }catch(PDOException $e){
        die($e->getMessage());
    }
    
    
}else{
    echo "ne valja";
}
