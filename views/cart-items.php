<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table  class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody id="tabela">
						<?php
						
							foreach($_SESSION as $productKey => $productValue):
								$name="product_";
						if(substr($productKey,0,strlen($name))==$name && substr($productKey,strlen($name),3) != "NaN"):
						$podeljenProduct=explode("_",$productKey);
						$id=$podeljenProduct[1];
						$kolicina=$productValue;
						$upit="SELECT * FROM proizvod p INNER JOIN marka m  ON p.marka_id=m.marka_id WHERE
						p.proizvod_id=:proizvod_id";
						$stmt=$connection->prepare($upit);
						$stmt->bindParam("proizvod_id",$id);
						try{
							$stmt->execute();
							
							$proizvod=$stmt->fetch();
						}
						catch(PDOException $e){
							die($e->getMessage());
						}
						$ukupno=$kolicina*$proizvod->cena;
						?>
						<tr id="idTr<?=$proizvod->proizvod_id?>">
							<td class="cart_product">
								<a href=""><img width="130px" src="images/shop/<?=$proizvod->slika_naziv?>" alt="<?=$proizvod->slika_alt?>"></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?=$proizvod->ime?></a></h4>
							</td>
							<td class="cart_price">
								<p ><?=$proizvod->cena?> $</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" data-cena=<?= $proizvod->cena?>  data-povecaj="<?= $id?>"href=""> + </a>
									<input id="<?=$proizvod->proizvod_id?>"class="cart_quantity_input" type="number" name="quantity" value="<?= $kolicina?>" autocomplete="off" size="2" disabled>
									<a class="cart_quantity_down" data-cena=<?= $proizvod->cena?> data-smanji="<?= $id?>"href=""> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price <?=$proizvod->proizvod_id?>" ><?= $ukupno ?> $</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" data-id="<?=$proizvod->proizvod_id?>" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php endif; ?>
						<?php endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</section>