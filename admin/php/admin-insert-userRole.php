<?php
include "../../php/konekcija.php";
if(isset($_POST['roleInsert'])){
    $naziv=$_POST['naziv'];
    $upisUBazu="INSERT INTO uloga (naziv) VALUES (' $naziv')";
    try{
        $connection->query($upisUBazu);
        $upit="SELECT * FROM uloga";
        $uloge=$connection->query($upit)->fetchAll();
        $ispis='<thead>
        <tr>
            <th>Role Id</th>
            <th>Name</th>
            <th>Controls</th>
        </tr>
    </thead>
    <tbody>';
        foreach($uloge as $uloga){
            $ispis.='<tr class="odd gradeX">
            <td class="center">'. $uloga->uloga_id.'</td>
            <td class="center">'. $uloga->naziv.'</td>
            <td><input class="btn btn-danger btn-md role-delete" data-id="'. $uloga->uloga_id.'" type="button" value="delete"/></td>
        </tr>';
        }
        
   $ispis.= '</tbody>';
   echo $ispis;
    }catch(PDOException $e){
        die($e->getMessage);
    }
}
if(isset($_POST['roleDelete'])){
    $id=$_POST['id'];
    $brisanjeIzBaze="DELETE FROM uloga WHERE uloga_id=$id";
    try{
        $connection->query($brisanjeIzBaze);
        $upit="SELECT * FROM uloga";
        $uloge=$connection->query($upit)->fetchAll();
        $ispis='<thead>
        <tr>
            <th>Role Id</th>
            <th>Name</th>
            <th>Controls</th>
        </tr>
    </thead>
    <tbody>';
        foreach($uloge as $uloga){
            $ispis.='<tr class="odd gradeX">
            <td class="center">'. $uloga->uloga_id.'</td>
            <td class="center">'. $uloga->naziv.'</td>
            <td><input class="btn btn-danger btn-md role-delete" data-id="'. $uloga->uloga_id.'" type="button" value="delete"/></td>
        </tr>';
        }
        
   $ispis.= '</tbody>';
   echo $ispis;
    }catch(PDOException $e){
        die($e->getMessage);
    }
}