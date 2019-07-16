<?php 
include "../../php/konekcija.php";
if(isset($_POST['insert-product'])){
    $naziv=$_POST['naziv'];
    $cena=$_POST['cena'];
    $slika=$_FILES['slika'];
    $slika_alt=$_POST['slika_alt'];
    $brend=$_POST['brend'];
    $kolicina=$_POST['kolicina'];
    
    
    $imeSlike=$slika['name'];
    $tmpNameSlike=$slika['tmp_name'];
    
    $jedinstvenoImeSlike=time().$imeSlike;
    if(move_uploaded_file($tmpNameSlike,"../../images/shop/$jedinstvenoImeSlike")){
        $upisUBazu="INSERT INTO proizvod (ime,cena,slika_naziv,slika_alt,marka_id,kolicina) VALUES
        ('$naziv','$cena','$jedinstvenoImeSlike','$slika_alt','$brend','$kolicina')";
        try{
            $connection->query($upisUBazu);
            header("Location:../pages/index.php?page=insertProduct");
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }



}



function formUpdate($e){
    global $connection;
    $upit="SELECT * FROM proizvod WHERE proizvod_id=$e";
    $product=$connection->query($upit)->fetch();
                            $ispis='<div class="form-group">
                            <label>Name</label>
                            <input type="text" name="naziv" id="naziv" class="form-control" value="'.$product->ime.'" required>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" name="cena"  id="cena" class="form-control" value="'.$product->cena.'" required>
                        </div>
                        <input type="hidden" name="idProizvod" value="'.$product->proizvod_id.'"/>
                        <div class="form-group">
                            <label>Picture</label>
                            <input type="file" name="slika" id="slika" class="form-control" placeholder="Enter picture name">
                        </div>
                        <div class="form-group">
                            <label>Picture Alt</label>
                            <input type="text" name="slika_alt" id="slika_alt" class="form-control" value="'.$product->slika_alt.'" required>
                        </div>
                        <div class="form-group">
                            <label>Brand </label>
                            <select name="brend" id="brend" class="form-control">
                            <option value="0">Choose</option>';
    $upitMarka="SELECT * FROM marka";
    $marka=$connection->query($upitMarka)->fetchAll();
                                foreach($marka as $mar){
                                    if($mar->marka_id==$product->marka_id){
                                        $ispis.='<option value="'.$mar->marka_id.'" selected>'.$mar->naziv.'</option>';
                                    }
                                    else{
                                        $ispis.='<option value="'.$mar->marka_id.'">'.$mar->naziv.'</option>';
                                    }
                                }       
                                
                                    
                                
                           $ispis.=' </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="text" name="kolicina" id="kolicina" class="form-control" value="'.$product->kolicina.'" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="update-product" id="update-product" class="btn btn-primary btn-md" value="UPDATE">
                        </div>
                        <label id="meni-insert-result"> </label>';
                        return $ispis;
}
if(isset($_POST['formUpdate'])){
    $id=$_POST['id'];
    echo formUpdate($id); 
}


if(isset($_POST['update-product'])){
    $id=$_POST['idProizvod'];
    $naziv=$_POST['naziv'];
    $cena=$_POST['cena'];
    $slika_alt=$_POST['slika_alt'];
    $brend=$_POST['brend'];
    $kolicina=$_POST['kolicina'];
    
    $slika=$_FILES['slika'];
    if(empty($slika['name'])){
        header("Location:../pages/index.php?page=insertProduct");
        $updateBaze="UPDATE proizvod SET ime='$naziv',cena='$cena',slika_alt='$slika_alt',marka_id='$brend',kolicina='$kolicina'
            WHERE proizvod_id=$id";
        try{
             $connection->query($updateBaze);
            
        }catch(PDOException $e){
            die($e->getMessage());
         }
        
    }
    else{
        //var_dump($slika);
        $imeSlike=$slika['name'];
        $tmpNameSlike=$slika['tmp_name'];
        $jedinstvenoImeSlike=time().$imeSlike;
        if(move_uploaded_file($tmpNameSlike,"../../images/shop/$jedinstvenoImeSlike")){
            $updateBaze="UPDATE proizvod SET ime='$naziv',cena='$cena',slika_naziv='$jedinstvenoImeSlike',slika_alt='$slika_alt',marka_id='$brend',kolicina='$kolicina'
            WHERE proizvod_id=$id";
            try{
                 $connection->query($updateBaze);
                header("Location:../pages/index.php?page=insertProduct");
            }catch(PDOException $e){
                die($e->getMessage());
             }
        }
        
    }
}

if(isset($_POST['productDelete'])){
    $id=$_POST['id'];
    $brisanje="DELETE FROM proizvod WHERE proizvod_id=$id";
    try{
        $connection->query($brisanje);
    }catch(PDOException $e){
        die($e->getMessage());
    }
    $upit="SELECT * FROM proizvod p INNER JOIN marka m ON p.marka_id=m.marka_id";
    $product=$connection->query($upit)->fetchAll();
                $ispis='<thead>
                <tr>
                    <th>Product Id</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Picture</th>
                    <th>Brand Id</th>
                    <th>Brand Name</th>
                    <th>Quantity</th>
                    <th>Control</th>
                </tr>
            </thead>
            <tbody>';
                foreach($product as $prod){
                    $ispis.='
                    <tr class="odd gradeX">
                        <td>'. $prod->proizvod_id.'</td>
                        <td>'. $prod->ime.'</td>
                        <td>'. $prod->cena.'</td>
                        <td class="center"><img  width="50px" src="../../images/shop/'. $prod->slika_naziv.'" alt="'.$prod->slika_alt.'"/></td>
                        <td class="center">'. $prod->marka_id.'</td>
                        <td class="center">'. $prod->naziv.'</td>
                        <td class="center">'. $prod->kolicina.'</td>
                        <td><input class="btn btn-primary btn-md form-update" data-id="'. $prod->proizvod_id.'" type="button" value="update"/> &nbsp;
                        <input class="btn btn-danger btn-md product-delete" data-id="'. $prod->proizvod_id.'" type="button" value="delete"/></td>
                    </tr>
                    ';
                }
                $ispis.="</tbody>";
                echo $ispis;
}