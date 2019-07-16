<section>
		<div class="container">
			<div class="row">
				
				<div class="col-sm-12 padding-right">
					<div class="features_items">
						<h2 class="title text-center">Best for man</h2>

						<?php
							$upitMuskarci="SELECT * FROM proizvod WHERE pol='M' ORDER BY kolicina ASC LIMIT 0,3";
							$muski=$connection->query($upitMuskarci)->fetchAll();						?>
							<?php foreach($muski as $product): ?>
						 <div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/shop/<?=$product->slika_naziv?>" alt="<?=$product->slika_alt?>" />
											<h2><?=$product->cena?></h2>
											<p><?=$product->ime?></p>
											<a class="btn btn-default add-to-cart <?= $product->proizvod_id?>" data-id="<?= $product->proizvod_id?>" ><i class="fa fa-shopping-cart"></i>Add to cart</a>
											<a href="product-details.php?id=<?= $product->proizvod_id?>"   class="btn btn-default detalji add-to-cart">Read more</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2><?=$product->cena?></h2>
												<p><?=$product->ime?></p>
												<a class="btn btn-default add-to-cart <?= $product->proizvod_id?>" data-id="<?= $product->proizvod_id?>" ><i class="fa fa-shopping-cart"></i>Add to cart</a>
												<a href="product-details.php?id=<?= $product->proizvod_id?>"   class="btn btn-default detalji add-to-cart">Read more</a>
											</div>
										</div>
								</div>
							</div>
						</div>
<?php endforeach; ?>
						
                    </div>
					<div class="features_items">
						<h2 class="title text-center">Best for woman</h2>
						<?php
							$upitMuskarci="SELECT * FROM proizvod WHERE pol='Z' ORDER BY kolicina ASC LIMIT 0,3";
							$muski=$connection->query($upitMuskarci)->fetchAll();						?>
							<?php foreach($muski as $product): ?>
						 <div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/shop/<?=$product->slika_naziv?>" alt="<?=$product->slika_alt?>" />
											<h2><?=$product->cena?></h2>
											<p><?=$product->ime?></p>
											<a class="btn btn-default add-to-cart <?= $product->proizvod_id?>" data-id="<?= $product->proizvod_id?>" ><i class="fa fa-shopping-cart"></i>Add to cart</a>
											<a href="product-details.php?id=<?= $product->proizvod_id?>"   class="btn btn-default detalji add-to-cart">Read more</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2><?=$product->cena?></h2>
												<p><?=$product->ime?></p>
												
												<a class="btn btn-default add-to-cart <?= $product->proizvod_id?>" data-id="<?= $product->proizvod_id?>" ><i class="fa fa-shopping-cart"></i>Add to cart</a>
												<a href="product-details.php?id=<?= $product->proizvod_id?>"   class="btn btn-default detalji add-to-cart">Read more</a>
											</div>
										</div>
								</div>
							</div>
						</div>
<?php endforeach; ?>
						
						
                    </div>
                </div>
			</div>
		</div>
	</section>