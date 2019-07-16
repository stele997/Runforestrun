
<?php 
 include "php/konekcija.php";
if(isset($_GET['kod'])){
    $aktivacioniKod=$_GET['kod'];
    $query="SELECT * FROM korisnik WHERE aktivacioni_kod = :activate";
    $upit=$connection->prepare($query);
    $upit->bindParam(':activate',$aktivacioniKod);
    $upit->execute();
    $rezultat=$upit->fetch();
    if($rezultat){
        $query="UPDATE korisnik SET aktivan = 1 WHERE aktivacioni_kod = :aktiviraj";
        $upit=$connection->prepare($query);
        $upit->bindParam(':aktiviraj',$aktivacioniKod);
        $upit->execute();
    }
    else{
        header("Location:index.php");
    }
}else{
    header("Location:index.php");
}
?>
<?php include "views/head.php"; ?>
<?php include "views/header-top.php"; ?>
<?php include "views/navigation.php"; ?>
	
	<div class="row">
            <div class="col-sm-12">
                <h3 class="text-center text-success" >You activated your account succesfuly! You can login now!</h3>
            </div>
    </div>
	

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/main.js"></script>
</body>
</html>