<div class="row" style="margin-bottom: 20px;">
	<?php include 'admin_profile_bar.php'?>
	<div class="card" style="max-width: 600px; margin-left: 10px; margin-right: 10px">
		<form action="<?=base_url('index.php/admin/change_password_submit')?>" method="post" class="form" id="change-password-form">
			<h2>Change Password</h2>
			<h4 id="changePasswordFailed" style="color: red; display: none;">Failed to Update. Please Try Again</h4>
			<div class="form-control">
				<label for="current_password" class="label_box">Current Password</label>
				<input type="password" name="current_password" id="current_password" class="input_box" onfocusout="checkInputs('current_password', 'password')" autocomplete="off">
				<i class="fa-solid fa-circle-check"></i>
				<i class="fa-solid fa-circle-exclamation"></i>
				<small>Error message</small>		
			</div>
			<div class="form-control">
				<label for="new_password" class="label_box">New Password</label>
				<input type="password" name="new_password" id="new_password" class="input_box" onfocusout="checkInputs('new_password', 'password')" autocomplete="off">
				<i class="fa-solid fa-circle-check"></i>
				<i class="fa-solid fa-circle-exclamation"></i>
				<small>Error message</small>		
			</div>
			<div class="form-control">
				<div class="btn-group">
					<input type="submit" name="_login" value="Update" class="button">
				</div>
			</div> 	
		</form>
	</div>
	<?php include 'admin_sidebar.php'?>
</div>