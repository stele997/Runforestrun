<?php
include "../../php/konekcija.php";
if(isset($_POST['brandInsert'])){
    $naziv=$_POST['naziv'];
    $upisUBazu="INSERT INTO marka (naziv) VALUES (' $naziv')";
    try{
        $connection->query($upisUBazu);
        $upit="SELECT * FROM marka";
        $marke=$connection->query($upit)->fetchAll();
        $ispis='<thead>
        <tr>
            <th>Role Id</th>
            <th>Name</th>
            <th>Controls</th>
        </tr>
    </thead>
    <tbody>';
        foreach($marke as $marka){
            $ispis.='<tr class="odd gradeX">
            <td class="center">'. $marka->marka_id.'</td>
            <td class="center">'. $marka->naziv.'</td>
            <td><input class="btn btn-danger btn-md brand-delete" data-id="'. $marka->marka_id.'" type="button" value="delete"/></td>
        </tr>';
        }
        
   $ispis.= '</tbody>';
   echo $ispis;
    }catch(PDOException $e){
        die($e->getMessage);
    }
}
if(isset($_POST['brandDelete'])){
    $id=$_POST['id'];
    $brisanjeIzBaze="DELETE FROM marka WHERE marka_id=$id";
    try{
        $connection->query($brisanjeIzBaze);
        $upit="SELECT * FROM marka";
        $marke=$connection->query($upit)->fetchAll();
        $ispis='<thead>
        <tr>
            <th>Role Id</th>
            <th>Name</th>
            <th>Controls</th>
        </tr>
    </thead>
    <tbody>';
        foreach($marke as $marka){
            $ispis.='<tr class="odd gradeX">
            <td class="center">'. $marka->marka_id.'</td>
            <td class="center">'. $marka->naziv.'</td>
            <td><input class="btn btn-danger btn-md brand-delete" data-id="'. $marka->marka_id.'" type="button" value="delete"/></td>
        </tr>';
        }
        
   $ispis.= '</tbody>';
   echo $ispis;
    }catch(PDOException $e){
        die($e->getMessage);
    }
}