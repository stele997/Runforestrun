<?php
require_once "konekcija.php";

$id=$_POST['id'];
$upit=$connection->prepare("SELECT * FROM proizvod WHERE proizvod_id=:id");
$upit->bindParam(':id',$id);
$upit->execute();
$rezultatUpita=$upit->fetchAll();
    echo $rezultatUpita;


?>