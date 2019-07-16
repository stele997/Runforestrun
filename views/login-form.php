<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="#">
							<input type="text" id="logInUsername" placeholder="Username" />
                            <input type="password" id="logInPassword" placeholder="Password" />
                            <input type="hidden" id="prebaci" value="0" />
							<span id="loseLogovanje" class="crveno">Username or password are not correct!</span>
							<button type="button" id="ulogujSe" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form method="POST">
							<div class="form-group">
								<input type="text" id="name" placeholder="Name"/>
								<span id="badName" class="crveno">Name is not valid!</span>
							</div>
							<div class="form-group">
									<input type="text" id="lastName" placeholder="Last Name"/>
									<span id="badLastName" class="crveno">Last name is not valid!</span>
							</div>
							<div class="form-group">
									<input type="text" id="address" placeholder="Address"/>
									<span id="badAddress" class="crveno">Address is not valid!</span>
							</div>
							<div class="form-group">
									<input type="text" id="phone" placeholder="Phone number"/>
									<span id="badPhone" class="crveno">Phone number is not valid!</span>
							</div>
							<div class="form-group">
								<input type="email" id="email" placeholder="Email Address"/>
								<span id="badEmail" class="crveno">Email address is not valid!</span>
							</div>
							<div class="form-group">
									<input type="text" id="username" placeholder="Username"/>
									<span id="badUsername" class="crveno">Username is not valid ot it is already taken</span>
							</div>
							
							<div class="form-group">
									<input type="password" id="password" placeholder="Password"/>
									<span id="badPassword" class="crveno">Password is not valid</span>
							</div>
							<div class="form-group">
									<input type="password" id="confirmePassword" placeholder="Confirme Password"/>
									<span id="badConfirmePassword" class="crveno">Passwords don't match!</span>
							</div>
							<div class="form-group">
								<div id="ispisiRezultat" class="ispisiRezultat">
										
								</div>

							</div>

							
							<button type="button" id="submit"class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->