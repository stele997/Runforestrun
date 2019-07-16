<section>
		<div class="container">
			<div class="row">
				
				
				<div class="col-sm-12 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="images/shop/<?= $product->slika_naziv?>" alt="<?= $product->slika_alt?>" />
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										<?php foreach($proizvodSlike as $slika): ?>
											<a href=""><img src="images/shop/<?= $slika->naziv?>" width="100px" alt=""></a>
										<?php endforeach; ?>
										  </div>
										<div class="item">
										<?php foreach($proizvodSlike as $slika): ?>
											<a href=""><img src="images/shop/<?= $slika->naziv?>" width="100px" alt=""></a>
										<?php endforeach; ?>
										  </div>
										<div class="item">
										<?php foreach($proizvodSlike as $slika): ?>
											<a href=""><img src="images/shop/<?= $slika->naziv?>" width="100px" alt=""></a>
										<?php endforeach; ?>
										 </div>
										
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?= $product->ime?></h2>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span>US $<?= $product->cena?></span>
									</span>
									
									<a class="btn btn-default add-to-cart <?= $product->proizvod_id?>" data-id="<?= $product->proizvod_id?>" ><i class="fa fa-shopping-cart"></i>Add to cart</a>	<p><b>Availability:</b> In Stock</p>
								<p><b>Condition:</b> New</p>
								<p><b>Brand:</b> <?= $product->naziv?></p>
                                </div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
				
					
				</div>
			</div>
		</div>
	</section>