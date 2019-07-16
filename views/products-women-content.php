<?php
require_once "php/konekcija.php";

$po_strani = 3;
if(isset($_GET['str'])){
	$strana=$_GET['str'];
	$pocetak=($strana-1)*3;
	$upit=$connection->query("SELECT * FROM proizvod WHERE pol='Z'LIMIT $pocetak,$po_strani");
	$proizvod=$upit->fetchAll();
}
else{
	$upit=$connection->query("SELECT * FROM proizvod WHERE pol='Z' LIMIT 0,$po_strani");
	$proizvod=$upit->fetchAll();
}

?>

<section>
		<div class="container">
			<div class="row">
				
				<div class="col-sm-12 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">For Man</h2>
				<?php
					foreach($proizvod as $product):
				?>
					
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="images/shop/<?= $product->slika_naziv?>" alt="<?= $product->slika_alt?>" />
										<h2><?= $product->cena?>$</h2>
										<p><?= $product->ime?></p>
										<a href="#" class="btn btn-default add-to-cart <?= $product->proizvod_id?>" ><i class="fa fa-shopping-cart"></i>Add to cart</a>
										<input type="hidden" value="<?= $product->proizvod_id?>"/>
										<a href="product-details.php?id=<?= $product->proizvod_id?>"  class="btn btn-default detalji add-to-cart">Read more</a>
										
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2><?= $product->cena?>$</h2>
											<p><?= $product->ime?></p>
											<a class="btn btn-default add-to-cart <?= $product->proizvod_id?>" data-id="<?= $product->proizvod_id?>" ><i class="fa fa-shopping-cart"></i>Add to cart</a>
											<a href="product-details.php?id=<?= $product->proizvod_id?>"   class="btn btn-default detalji add-to-cart">Read more</a>
										</div>
									</div>
								</div>
							</div>
						</div>
				<?php endforeach; ?>
		</div>
    </section>
