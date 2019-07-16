<footer id="footer">
		<div class="footer-widget">
			<div class="container">
				<div class="row text-center">
				    <a href="DOKUMENTACIJA.pdf" class="btn-default btn-lg">DOKUMENTACIJA </a>
					<p >© Web application was made as school project and it will not be used for commercial uses but only as representational material!All informations about products and prices are not valid!</p>
					<h2>     </h2>
					<?php $upitMeniFuter="SELECT * FROM navigacija";
					$navigacije=$connection->query($upitMeniFuter);
?>
	<?php foreach($navigacije as $nav): ?>
			<a href="<?=$nav->putanja?>" class="btn-default btn-sm"><?=$nav->naziv?></a>
	<?php endforeach;?>
					
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
	</footer>