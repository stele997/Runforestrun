<div class="header-middle">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php" class="text-warning"><img src="images/logo.png" width="35px"alt="sneakers" />RunForestRun</a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                
                                <?php
                                    if(isset($_SESSION['username'])){
                                        echo'<li><a href="logout.php"><i class="fa fa-lock"></i> Log out</a></li>';
                                    }
                                    else{
                                        echo'<li><a href="login.php"><i class="fa fa-lock"></i> Login or Register </a></li>';
                                    }
                                ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>