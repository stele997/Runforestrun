<?php
function glavnaNavigacija($roditelj,$nivo){
	global $connection;
	$upit="SELECT * FROM navigacija where roditelj=$roditelj";
	$rezultat=$connection->query($upit);
	if($rezultat->rowCount()>0){
		echo '<ul role="menu" class="sub-menu">';
	}
	foreach($rezultat as $red){
		echo '<li><a href="'.$red->putanja.'">'.$red->naziv.'</a></li>';

		glavnaNavigacija($red->id_link,$red->nivo);
		echo '</li>';
	}
	if($rezultat->rowCount()>0){
		
		echo '</ul>';
	
	}
}
?>

<div class="header-bottom">
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						 <div class="mainmenu pull-left">
						 <?php 
							$upitPrvi="SELECT * FROM navigacija WHERE roditelj=0";
							$roditelj=$connection->query($upitPrvi);
							if($roditelj->rowCount()>0){
								if(isset($_SESSION['username'])&&($_SESSION['username']->uloga_id)==1){
									echo '<ul class="nav navbar-nav collapse navbar-collapse">
									<li><a href="admin/index.php">Admin</a></li>';
								}else{
									echo '<ul class="nav navbar-nav collapse navbar-collapse">';
								}
								
							}
							foreach($roditelj as $red){
								
								$upit = "SELECT * FROM navigacija WHERE roditelj= $red->id_link";
								$rezultat = $connection->query($upit);
								if($rezultat->rowCount() > 0) {
									echo'<li class="dropdown"><a href="#">'.$red->naziv.'<i class="fa fa-angle-down"></i></a>';
								} else {
									echo '<li><a href="'.$red->putanja.'">'.$red->naziv.'</a></li>';	
								}
								glavnaNavigacija($red->id_link,$red->nivo);
								echo '</li>';
							}
							if($roditelj->rowCount()>0){
								echo '</ul>';
								echo '</li>';
							}
						?>
						</div> 
					</div>
				</div>
			</div>
		</div>
	</header>