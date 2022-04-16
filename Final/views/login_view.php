<div class="row" style="margin-bottom: 20px;">
	<div class="card" style="max-width: 600px;">
		<form action="<?=base_url('index.php/home/login_submit')?>" method="post" class="form" id="login-form">
			<h2>Admin Login</h2>
			<h4 id="loginFailed" style="color: red; display: none;">Failed to Login. Please Try Again</h4>
			<div class="form-control">
				<label for="username" class="label_box">Username</label>
				<input type="text" name="user_name" id="username" class="input_box" autocomplete="off" onfocusout="checkInputs('username', 'username')">
				<i class="fa-solid fa-circle-check"></i>
				<i class="fa-solid fa-circle-exclamation"></i>
				<small>Error message</small>		
			</div>
			<div class="form-control">
				<label for="password" class="label_box">Password</label>
				<input type="password" name="password" id="password" class="input_box" autocomplete="off" onfocusout="checkInputs('password', 'password')">
				<i class="fa-solid fa-circle-check"></i>
				<i class="fa-solid fa-circle-exclamation"></i>
				<small>Error message</small>	
			</div>
			<div class="form-control">
				<div class="btn-group">
					<input type="submit" name="_login" value="Login" class="button">
					<input type="button" name="_forget" value="Forgot Password" class="button">
				</div>
			</div> 	
		</form>
	</div>
</div>