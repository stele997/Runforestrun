<?php
include "konekcija.php";
if(isset($_POST['submit'])){
    if(isset($_SESSION['username'])){
    $prosledjenaVrednost=$_POST['izbor'];
    $odgovorIdUpit="SELECT odgovor_id FROM odgovor WHERE naziv=:prosledjenaVrednost";
    $stmt=$connection->prepare($odgovorIdUpit);
    $stmt->bindParam(':prosledjenaVrednost',$prosledjenaVrednost);
    try{
        $stmt->execute();
        $odgovorId=$stmt->fetch();

        $odgId=$odgovorId->odgovor_id;
        
        $idKor=$_SESSION['username']->korisnik_id;
        $upitKorisnik="SELECT * FROM korisnikodgovor WHERE korisnik_id=$idKor";
        try{
            $rezKor=$connection->query($upitKorisnik);
            $brojGlasova=$rezKor->rowCount();
            if($brojGlasova==0){
                $upisUBazu="INSERT INTO korisnikodgovor VALUES('',$idKor,$odgId)";
                try{
                    $connection->query($upisUBazu);
                    $Nizodgovori=['nike','adidas','reebok'];
                        $brojOdgovora=dohvatiBrojOdgovora($connection);
                        $ispis="<h2>Results:</h2>";
                        foreach($Nizodgovori as $odg){

                            $upit="SELECT * FROM korisnikodgovor  WHERE odgovor_id = (SELECT odgovor_id FROM odgovor WHERE naziv='$odg')";
                            $rezultat=$connection->query($upit);
                            $totalRowsOdg=$rezultat->rowCount();
                            $procenatZaPrikaz=round(($totalRowsOdg/$brojOdgovora)*100);
                            $ispis.='
                            <label>'.$odg.':</label>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: '.$procenatZaPrikaz.'%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">'.$procenatZaPrikaz.'%</div>
                            </div>
                            ';
                            
                        }
                        echo $ispis;
                        
                }
                catch(PDOException $e){
                    die($e->getMessage());
                }
            }else{
                echo "You can vote only once!";
            }
        }
        catch(PDOException $e){
            die($e->getMessage());
        }
        
        
        
        
    }
    catch(PDOException $e){
    die($e->getMessage());
    }
}else{
    echo "You have to be logged in to vote! Login: <a href='login.php'>Login</a>";
}
}





    
if(isset($_POST['pokrenutaStrana'])){
    $Nizodgovori=['nike','adidas','reebok'];
                    $brojOdgovora=dohvatiBrojOdgovora($connection);
                    $ispis="<h2>Results:</h2>";
                    foreach($Nizodgovori as $odg){

                        $upit="SELECT * FROM korisnikodgovor  WHERE odgovor_id = (SELECT odgovor_id FROM odgovor WHERE naziv='$odg')";
                        $rezultat=$connection->query($upit);
                        $totalRowsOdg=$rezultat->rowCount();
                        $procenatZaPrikaz=round(($totalRowsOdg/$brojOdgovora)*100);
                        $ispis.='
                        <label>'.$odg.':</label>
                        <div class="progress">
                             <div class="progress-bar" role="progressbar" style="width: '.$procenatZaPrikaz.'%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">'.$procenatZaPrikaz.'%</div>
                        </div>
                        ';
                        
                    }
                    echo $ispis;
}
function dohvatiBrojOdgovora($connection){
    $upit="SELECT * FROM korisnikodgovor";
    $odgovoriUpit=$connection->query($upit);
    return $odgovoriUpit->rowCount();
}

