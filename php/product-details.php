<?php
	include_once("konekcija.php");
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$query="SELECT * FROM proizvod p INNER JOIN marka m ON p.marka_id=m.marka_id WHERE proizvod_id=:id";
		$stmt=$connection->prepare($query);
		$stmt->bindParam(":id",$id);
		try{
			$rezultat=$stmt->execute();
			if($stmt->rowCount()==0){
				header("Location: index.php");
			}else{
				$product=$stmt->fetch();
				$query2="SELECT * FROM slike WHERE proizvod_id=:id";
	$stmt2=$connection->prepare($query2);
	 $id=$_GET['id'];
		$stmt2->bindParam(":id",$id);
		try{
			$stmt2->execute();
			//var_dump($rezultat);
			$proizvodSlike=$stmt2->fetchAll();
		}catch(PDOException $e){
				die($e->getMessage());
		}
			}
		}catch(PDOException $e){
				die($e->getMessage());
		}
	}
	if(isset($_GET['id'])){
	
	}
?>