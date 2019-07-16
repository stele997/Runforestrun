<section id="do_action">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span id="korpaUkupno"><?php 
							if(isset($_SESSION['korpaUkupno'])){
								echo $_SESSION['korpaUkupno']."$";
							}else{
								echo "$0";
							}
							
							?></span></li>
							<li>Eco Tax <span id="tax">$10</span></li>
							<li>Shipping Cost <span id="free">Free</span></li>
							<li>Total <span id="Ukupno"><?php 
							if(isset($_SESSION['korpaUkupno'])){
								$ukupno=$_SESSION['korpaUkupno']+10;
								echo $ukupno."$";
							}else{
								echo "$10";
							}
							
							?></span></li>
						</ul>
					</div>
				</div>
				<?php if(isset($_SESSION['username'])):?>
				<div class="col-sm-6">
						<div class="shopper-info">
							<p>Shopper Information</p>
							<form>
								<input type="text" id="name" placeholder="Firs name">
								<span id="badName" class="crveno">Name is not valid!</span>
								<input type="text" id="lastName" placeholder="Last Name">
								<span id="badLastName" class="crveno">Last name is not valid!</span>
								<input type="text" id="address" placeholder="Address">
								<span id="badAddress" class="crveno">Address is not valid!</span>
								<input type="text" id="phone" placeholder="Phone number">
								<span id="badPhone" class="crveno">Phone number is not valid!</span>
								<input type="button" class="btn-primary" id="naruci" value="Order" />
							</form>
							<div class="ispisiRezultat" id="ispisRez">
								Your order has been saved!
							</div>
						</div>
					</div>
						<?php endif; ?> 
			</div>
		</div>
	</section>