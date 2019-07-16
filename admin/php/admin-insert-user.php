<?php
include "../../php/konekcija.php";
if(isset($_POST['userUpdate'])){
    $id=$_POST['id'];
    $upit="SELECT * FROM korisnik k INNER JOIN uloga u ON k.uloga_id=u.uloga_id WHERE korisnik_id=$id";
    $user=$connection->query($upit)->fetch();
    $upitUloge="SELECT * FROM uloga";
    $uloge=$connection->query($upitUloge)->fetchAll();
    $ispis='<div class="col-lg-12">
    <h1 id="naslovForma">Update User</h1>
    <form id="forma" role="form">
        <div class="form-group">
            <label>Name</label>
            <input type="text" id="ime" class="form-control" value="'.$user->ime.'">
        </div>
        <div class="form-group">
            <label>Last name</label>
            <input type="text" id="prezime" class="form-control" value="'.$user->prezime.'">
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" id="adresa" class="form-control" value="'.$user->adresa.'">
        </div>
        <div class="form-group">
            <label>Phone number</label>
            <input type="text" id="telefon" class="form-control" value="'.$user->telefon.'">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" id="email" class="form-control" value="'.$user->email.'">
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" id="username" class="form-control" value="'.$user->username.'">
        </div>
        <div class="form-group">
            <label>Acctive</label>
            <input type="text" id="aktivan" class="form-control" value="'.$user->aktivan.'">
        </div>
        <div class="form-group">
            <label>Role </label>
            <select id="uloga" class="form-control">';
                 foreach($uloge as $uloga){
                     if($uloga->uloga_id==$user->uloga_id){
                        $ispis.='<option selected value="'.$uloga->uloga_id.'">'.$uloga->naziv.'</option>';
                     }
                     else{
                        $ispis.='<option value="'.$uloga->uloga_id.'">'.$uloga->naziv.'</option>';
                     }
                     
                 }
                    
            $ispis.='</select>
        </div>
        
        <div class="form-group">
            <input type="button" data-id="'.$user->korisnik_id.'" id="updateUser" class="btn btn-primary btn-md" value="UPDATE">
        </div>
        <label id="meni-insert-result"> </label>
        
    </form>
</div>
';
echo $ispis;
}

if(isset($_POST['updateUser'])){
    $id=$_POST['id'];
    $ime=$_POST['ime'];
    $prezime=$_POST['prezime'];
    $adresa=$_POST['adresa'];
    $telefon=$_POST['telefon'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $aktivan=$_POST['aktivan'];
    $uloga=$_POST['uloga'];
    $updateBaze="UPDATE korisnik SET ime='$ime',prezime='$prezime',adresa='$adresa',telefon='$telefon', email='$email
    ', username='$username', aktivan='$aktivan', uloga_id='$uloga' WHERE korisnik_id=$id";
    try{
        $connection->query($updateBaze);
        $upit="SELECT * FROM korisnik k  INNER JOIN uloga u ON k.uloga_id=u.uloga_id";
        $users=$connection->query($upit)->fetchAll();
        $ispis='<thead>
        <tr>
            <th>User Id</th>
            <th>Name</th>
            <th>Last name</th>
            <th>Address</th>
            <th>Phone number</th>
            <th>Email</th>
            <th>Username</th>
            <th>Date of registration</th>
            <th>Acctive</th>
            <th>Uloga</th>
            <th>Control</th>
        </tr>
    </thead>
    <tbody>';
        foreach($users as $user){
            $datum=date("d-m-Y, h-i-s",$user->datum_registracije);
            $ispis.='<tr class="odd gradeX">
            <td>'. $user->korisnik_id.'</td>
            <td>'. $user->ime.'</td>
            <td>'. $user->prezime.'</td>
            <td class="center">'. $user->adresa.'</td>
            <td class="center">'. $user->telefon.'</td>
            <td class="center">'. $user->email.'</td>
            <td class="center">'. $user->username.'</td>
            <td class="center">'.$datum .'</td>
            <td class="center">'. $user->aktivan.'</td>
            <td class="center">'. $user->naziv.'</td>
            <td><input class="btn btn-primary btn-md user-update" data-id="'. $user->korisnik_id.'" type="button" value="update"/> &nbsp;
            <input class="btn btn-danger btn-md user-delete" data-id="'. $user->korisnik_id.'" type="button" value="delete"/></td>
        </tr>';
        }    
   $ispis.=' </tbody>';
    echo $ispis;
    }
    catch(PDOException $e){
        die($e->getMessage);
    }
        
}

if(isset($_POST['userDelete'])){
    $id=$_POST['id'];
    $brisanjeIzBaze="DELETE FROM korisnik WHERE korisnik_id=$id";
    try{
        $connection->query($brisanjeIzBaze);
        $ispis=$upit="SELECT * FROM korisnik k  INNER JOIN uloga u ON k.uloga_id=u.uloga_id";
        $users=$connection->query($upit)->fetchAll();
        $ispis='<thead>
        <tr>
            <th>User Id</th>
            <th>Name</th>
            <th>Last name</th>
            <th>Address</th>
            <th>Phone number</th>
            <th>Email</th>
            <th>Username</th>
            <th>Date of registration</th>
            <th>Acctive</th>
            <th>Uloga</th>
            <th>Control</th>
        </tr>
    </thead>
    <tbody>';
        foreach($users as $user){
            $datum=date("d-m-Y, h-i-s",$user->datum_registracije);
            $ispis.='<tr class="odd gradeX">
            <td>'. $user->korisnik_id.'</td>
            <td>'. $user->ime.'</td>
            <td>'. $user->prezime.'</td>
            <td class="center">'. $user->adresa.'</td>
            <td class="center">'. $user->telefon.'</td>
            <td class="center">'. $user->email.'</td>
            <td class="center">'. $user->username.'</td>
            <td class="center">'.  $datum.'</td>
            <td class="center">'. $user->aktivan.'</td>
            <td class="center">'. $user->naziv.'</td>
            <td><input class="btn btn-primary btn-md user-update" data-id="'. $user->korisnik_id.'" type="button" value="update"/> &nbsp;
            <input class="btn btn-danger btn-md user-delete" data-id="'. $user->korisnik_id.'" type="button" value="delete"/></td>
        </tr>';
        }    
   $ispis.=' </tbody>';
    echo $ispis;
    }
    catch(PDOException $e){
        die($e->getMessage);
    }
}