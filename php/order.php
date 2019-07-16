<?php
    include "konekcija.php";
    if(isset($_POST['dugme'])){
        $code=201;
       
        $greske=[];
        $name=$_POST['name'];
        $lastName=$_POST['lastName'];
        $address=$_POST['address'];
        $phone=$_POST['phone'];

        $reName="/^[A-Z][a-z]{2,12}(\s[A-Z][a-z]{2,12})?$/";
        $reLastName="/^[A-Z][a-z]{2,12}(\s[A-Z][a-z]{2,12})?$/";
        $reAddress="/^[A-Z][a-z]{2,15}(\s[A-Z][a-z]{2,15})*\s[0-9]{1,4}(\/[0-9]{1,4})?$/";
        $rePhone="/^06[0-9]{1}[0-9]{6}([0-9]{1})?$/";
        if(!preg_match($reName,$name)){
            array_push($nizDobro,"Name: $name");
            $code=404;
        }
        if(!preg_match($reLastName,$lastName)){
            array_push($greske,"Last name is not correct!");
            $code=422;
        }
        if(!preg_match($reAddress,$address)){
            array_push($greske,"Address is not correct!");
            $code=422;
        }
        if(!preg_match($rePhone,$phone)){
            array_push($greske,"Phone number is not correct!");
            $code=422;
        }

        if(count($greske)==0){
            //$message="Your order is on its way!";
            $korisnikId=$_SESSION['username']->korisnik_id;
            foreach($_SESSION as $productKey => $productValue){
                $ime="product_";
               
                if(substr($productKey,0,strlen($ime))==$ime){
                    $podeljenProduct=explode("_",$productKey);
                    $productId=$podeljenProduct[1];
                    $kolicina=$productValue;
                    $upit = "SELECT cena FROM proizvod WHERE proizvod_id=:proizvod_id";
                    $stmt=$connection->prepare($upit);
                    $stmt->bindParam(":proizvod_id",$productId);
                    try{
                        $stmt->execute();
                        $productPrice=$stmt->fetch()->cena;
                        $pricePerProduct=$kolicina*$productPrice;
                        $vremeNarudzbine=mktime();
                        $queryUpis="INSERT INTO narudzbina (korisnik_id,proizvod_id,kolicina,ime,prezime,adresa,telefon,vremePorucivanja,cena) VALUES (:korId, :proId, :kolicina, :ime, :prezime, :adresa, :telefon, :vremePorucivanja, :cena)";
                        $upis=$connection->prepare($queryUpis);
                        $upis->bindParam(':korId',$korisnikId);
                        $upis->bindParam(':proId',$productId);
                        $upis->bindParam(':ime',$name);
                        $upis->bindParam(':prezime',$lastName);
                        $upis->bindParam(':kolicina',$kolicina);
                        $upis->bindParam(':adresa',$address);
                        $upis->bindParam(':telefon',$phone);
                        $upis->bindParam(':cena',$pricePerProduct);
                        $upis->bindParam(':vremePorucivanja',$vremeNarudzbine);
                        
                        try{
                            $rezultat=$upis->execute();
                            $message="Your order is on its way!";
                            $code=201;
                            
                        }catch(PDOException $e){
                            $message= $e->getMessage();
                            $code=500;
                        }
                        
                    }catch(PDOException $e){
                        die($e->getMessage());
                    }
                }
            }
            foreach($_SESSION as $productKey => $productValue){
                $name="product_";
               
                if(substr($productKey,0,strlen($name))==$name){
                    unset($_SESSION[$productKey]);
                    
                }
            }
            unset($_SESSION['korpaUkupno']);
                
        }
        else{
            $message="Data you entered is not valid!";
        }
        
        http_response_code($code);
        echo " ";
        
        
    }
    
?>