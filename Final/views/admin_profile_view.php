<div class="row" style="margin-bottom: 20px;">
	<?php include 'admin_profile_bar.php'?>
	<div class="card" style="max-width: 600px; margin-left: 10px; margin-right: 10px">
		<form class="form">
			<h2>Admin Profile</h2>
			<div class="form-control">
				<label class="label_box">First Name</label>
				<input type="text" class="input_box" value="<?=$_SESSION['user']['first_name']?>" readonly>
			</div>
			<div class="form-control">
				<label class="label_box">Last Name</label>
				<input type="text" class="input_box" value="<?=$_SESSION['user']['last_name']?>" readonly>
			</div>
			<div class="form-control">
				<label class="label_box">Username</label>
				<input type="text" class="input_box" value="<?=$_SESSION['user']['username']?>" readonly>
			</div>
			<div class="form-control">
				<label class="label_box">Email</label>
				<input type="text" class="input_box" value="<?=$_SESSION['user']['email']?>" readonly>
			</div>
			<div class="form-control">
				<label class="label_box">Gender</label>
				<input type="text" class="input_box" value="<?=ucfirst($_SESSION['user']['gender'])?>" readonly>
			</div>
			<div class="form-control">
				<label class="label_box">Date of Birth</label>
				<input type="text" class="input_box" value="<?=date('d-M-Y', strtotime($_SESSION['user']['date_of_birth']))?>" readonly>
			</div>
			<div class="form-control">
				<label class="label_box">Blood Group</label>
				<input type="text" class="input_box" value="<?=$_SESSION['user']['blood_group']?>" readonly>
			</div>
			<div class="form-control">
				<label class="label_box">Present Address</label>
				<input type="text" class="input_box" value="<?=$_SESSION['user']['present_address']?>" readonly>
			</div>
			<div class="form-control">
				<label class="label_box">Permanent Address</label>
				<input type="text" class="input_box" value="<?=$_SESSION['user']['permanent_address']?>" readonly>
			</div>
		</form>
	</div>
	<?php include 'admin_sidebar.php'?>
</div>