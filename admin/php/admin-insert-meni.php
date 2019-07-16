<?php
    include "../../php/konekcija.php";

    function tableInsert(){
        global $connection;
        $upit="SELECT * FROM navigacija";
        $navigation=$connection->query($upit)->fetchAll();
        $ispis="<thead>
        <tr>
            <th>Link Id</th>
            <th>Title</th>
            <th>Link</th>
            <th>Parent</th>
            <th>Posiotion</th>
            <th>Level</th>
            <th>Control</th>
        </tr>
    </thead>
    <tbody>";
        foreach($navigation as $nav){
            $ispis.="
            <tr class=odd gradeX'>
                <td>$nav->id_link</td>
                <td>$nav->naziv</td>
                <td>$nav->putanja</td>
                <td class='center'> $nav->roditelj</td>
                <td class='center'>$nav->pozicija</td>
                <td class='center'>$nav->nivo</td>
                <td><input class='btn btn-primary btn-md meni-update' data-id='$nav->id_link' type='button' value='update'/> &nbsp;
                <input class='btn btn-danger btn-md meni-delete' data-id='$nav->id_link' type='button' value='delete'/></td>
            </tr>";
        }
        $ispis.="</tbody>";
        return $ispis;
    
    }


    function formUpdate($e){
        global $connection;
        $upit="SELECT * FROM navigacija WHERE id_link=$e";
        $navigation=$connection->query($upit)->fetch();
                                $ispis='<div class="form-group">
                                            <label>Title</label>
                                            <input type="text" id="naziv" class="form-control" value="'.$navigation->naziv.'" placeholder="Enter title">
                                        </div>
                                        <div class="form-group">
                                            <label>Link</label>
                                            <input type="text" id="putanja" class="form-control" value="'.$navigation->putanja.'" placeholder="Enter link">
                                        </div>
                                        <div class="form-group">
                                            <label>Parent </label>
                                            <select id="roditelj"  class="form-control">
                                            <option value="0">First level link</option>';
        $upitZadDdl="SELECT * FROM navigacija";
        $roditelj=$connection->query($upitZadDdl)->fetchAll();
                                                foreach($roditelj as $rod)
                                                {
                                                    if($navigation->roditelj==$rod->id_link){
                                                        $ispis.='<option selected value="'.$rod->id_link.'">'.$rod->naziv.'</option>';
                                                    }else{
                                                        $ispis.='<option value="'.$rod->id_link.'">'.$rod->naziv.'</option>';
                                                    }
                                                    
                                                }
                                            $ispis.='</select>
                                        </div>
                                        <div class="form-group">
                                            <label>Position</label>
                                            <input type="text" id="pozicija"  value="'.$navigation->pozicija.'" class="form-control" placeholder="Enter position">
                                        </div>
                                        <div class="form-group">
                                            <label>Level</label>
                                            <input type="text" id="nivo" class="form-control"  value="'.$navigation->nivo.'" placeholder="Enter level">
                                        </div>
                                        <div class="form-group">
                                            <input type="button" id="update-nav" data-id="'.$navigation->id_link.'" class="btn btn-primary btn-md" value="UPDATE">
                                        </div>
                                        <label id="meni-insert-result"> </label>';
        return $ispis;
    }

    function formAfterUpdate(){
        global $connection;
        $upit="SELECT * FROM navigacija";
        $navigation=$connection->query($upit)->fetchAll();
        $ispis='<div class="form-group">
        <label>Title</label>
        <input type="text" id="naziv" class="form-control" placeholder="Enter title">
    </div>
    <div class="form-group">
        <label>Link</label>
        <input type="text" id="putanja" class="form-control" placeholder="Enter link">
    </div>
    <div class="form-group">
        <label>Parent </label>
        <select id="roditelj" class="form-control">
        <option value="0">First level link</option>';
            foreach($navigation as $nav)
            {
                $ispis.='<option value="'.$nav->id_link.'">'.$nav->naziv.'</option>';
            }
        $ispis.='</select>
    </div>
    <div class="form-group">
        <label>Position</label>
        <input type="text" id="pozicija" class="form-control" placeholder="Enter position">
    </div>
    <div class="form-group">
        <label>Level</label>
        <input type="text" id="nivo" class="form-control" placeholder="Enter level">
    </div>
    <div class="form-group">
        <input type="button" id="insert-nav" class="btn btn-primary btn-md" value="INSERT">
    </div>
    <label id="meni-insert-result"> </label>';
    return $ispis;
    }

    if(isset($_POST['meniInsert'])){
        $naziv=$_POST['naziv'];
        $putanja=$_POST['putanja'];
        $roditelj=$_POST['roditelj'];
        $pozicija=$_POST['pozicija'];
        $nivo=$_POST['nivo'];
        $upitZaUpis="INSERT INTO navigacija(naziv,putanja,roditelj,pozicija,nivo) VALUES('$naziv','$putanja','$roditelj','$pozicija','$nivo')";
        try{
            $connection->query($upitZaUpis);
            echo tableInsert();
        }catch(PDOException $e){
            die($e->getMessage());
        }
       
    }
    if(isset($_POST['meniDelete'])){
        $id=$_POST['id'];
        $upitZaBrisanje="DELETE FROM navigacija WHERE id_link=$id";
        try{
        $connection->query($upitZaBrisanje);
        echo tableInsert();
        }catch(PDOException $e){
            die($e->getMessage());
        }
        
    }

    if(isset($_POST['meniUpdate'])){
        $id=$_POST['id'];
        $upit="SELECT * FROM navigacija";
        try{
        $connection->query($upit)->fetchAll();
        echo formUpdate($id);
        
        }catch(PDOException $e){
            die($e->getMessage());
        }
        
    }
    if(isset($_POST['updateNav'])){
       $id=$_POST['id'];
       $naziv=$_POST['naziv'];
        $putanja=$_POST['putanja'];
        $roditelj=$_POST['roditelj'];
        $pozicija=$_POST['pozicija'];
        $nivo=$_POST['nivo'];
       $updateBaze="UPDATE navigacija SET naziv ='$naziv', putanja='$putanja', roditelj='$roditelj', pozicija='$pozicija', nivo='$nivo' WHERE id_link='$id'";
       try{
        $connection->query($updateBaze);
        header("Content-Type:Application/json");
        echo json_encode(['tabela'=> tableInsert(),'forma'=>formAfterUpdate()]);
       }catch(PDOException $e){
        die($e->getMessage);
       }
       

    }


?>