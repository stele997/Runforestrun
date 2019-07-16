<?php
header("Content-Type:Application/json");
include "konekcija.php";
if(isset($_POST['intId'])){
    $productId=$_POST['intId'];
    if(isset($_SESSION["product_".$_POST["intId"]])){
        $_SESSION["product_".$_POST["intId"]]+=1;
    }
    else{
        $_SESSION["product_".$_POST["intId"]]=1;
    }
    saberi();
    echo($productId);
}
if(isset($_POST['quantityUpId'])){
    $upit="SELECT kolicina FROM proizvod where proizvod_id=:id";
    $idZaBazu=$_POST['quantityUpId'];
    $stmt=$connection->prepare($upit);
    $stmt->bindParam("id",$idZaBazu);
    try{
        $stmt->execute();
        $kolicinaBaza=$stmt->fetch()->kolicina;

        
        if($_SESSION["product_".$_POST["quantityUpId"]]<$kolicinaBaza){
            $quantityUp=$_POST['quantityUpId'];
            $_SESSION["product_".$_POST["quantityUpId"]]+=1;
            $niz=[];
            $kolicina=$_SESSION["product_".$_POST["quantityUpId"]];
            $korpaUkupno=saberi();
            echo json_encode(["kolicina"=>$kolicina,"id"=>$quantityUp,"ukupno"=>$korpaUkupno]);
        }
    }catch(PDOException $e){
        die($e->getMessage());
    }
    
}
if(isset($_POST['quantityDownId'])){
    $quantityDown=$_POST['quantityDownId'];
    if($_SESSION["product_".$_POST["quantityDownId"]]>1){
        $_SESSION["product_".$_POST["quantityDownId"]]-=1;
        $niz=[];
        $kolicina=$_SESSION["product_".$_POST["quantityDownId"]];
        $korpaUkupno=saberi();
        echo json_encode(["kolicina"=>$kolicina,"id"=>$quantityDown,"ukupno"=>$korpaUkupno]);
    }
    
}
if(isset($_POST['dataId'])){
    $id=$_POST['dataId'];
    unset($_SESSION["product_".$id]);
    $ispis=" ";
    $korpaUkupno=saberi();
    echo json_encode(["ispis"=>$ispis,"ukupno"=>$korpaUkupno]);
}

function saberi(){
    global $connection;
    $korpaUkupno=0;
    foreach($_SESSION as $productKey => $productValue){
        $name="product_";
       
        if(substr($productKey,0,strlen($name))==$name){
            $podeljenProduct=explode("_",$productKey);
			$id=$podeljenProduct[1];
            $kolicina=$productValue;
            $upit = "SELECT cena FROM proizvod WHERE proizvod_id=:proizvod_id";
            $stmt=$connection->prepare($upit);
            $stmt->bindParam(":proizvod_id",$id);
            try{
                $stmt->execute();
                $productPrice=$stmt->fetch()->cena;
                $pricePerProduct=$kolicina*$productPrice;
                $korpaUkupno+=$pricePerProduct;
                
            }catch(PDOException $e){
                die($e->getMessage());
            }
            
        }
    }
    $_SESSION['korpaUkupno']=$korpaUkupno;    
    return  $korpaUkupno;
}
?>