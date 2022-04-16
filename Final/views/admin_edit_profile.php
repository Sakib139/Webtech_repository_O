<div class="row" style="margin-bottom: 20px;">
	<?php include 'admin_profile_bar.php'?>
	<div class="card" style="max-width: 600px; margin-left: 10px; margin-right: 10px">
		<form action="<?=base_url('index.php/admin/edit_profile_submit')?>" method="post" class="form" id="edit-profile-form">
			<h2>Edit Profile</h2>
			<h4 id="editProfileFailed" style="color: red; display: none;">Failed to Update. Please Try Again</h4>
			<div class="form-control">
				<label for="first_name" class="label_box">First Name</label>
				<input type="text" name="first_name" id="first_name" class="input_box" onfocusout="checkInputs('first_name')" value="<?=$_SESSION['user']['first_name']?>">
				<i class="fa-solid fa-circle-check"></i>
				<i class="fa-solid fa-circle-exclamation"></i>
				<small>Error message</small>		
			</div>
			<div class="form-control">
				<label for="last_name" class="label_box">Last Name</label>
				<input type="text" name="last_name" id="last_name" class="input_box" onfocusout="checkInputs('last_name')" value="<?=$_SESSION['user']['last_name']?>">
				<i class="fa-solid fa-circle-check"></i>
				<i class="fa-solid fa-circle-exclamation"></i>
				<small>Error message</small>		
			</div>
			<div class="form-control">
				<label for="email" class="label_box">Email</label>
				<input type="text" name="email" id="email" class="input_box" onfocusout="checkInputs('email')" value="<?=$_SESSION['user']['email']?>">
				<i class="fa-solid fa-circle-check"></i>
				<i class="fa-solid fa-circle-exclamation"></i>
				<small>Error message</small>		
			</div>
			<div class="form-control">
				<label for="blood_group" class="label_box">Blood Group</label>
				<select  name="blood_group" id="blood_group" class="input_box" onchange="checkInputs('blood_group')">
					<option value="A+" <?=($_SESSION['user']['blood_group'] == 'A+')?"selected":""?>>A+</option>
					<option value="A-" <?=($_SESSION['user']['blood_group'] == 'A-')?"selected":""?>>A-</option>
					<option value="B+" <?=($_SESSION['user']['blood_group'] == 'B+')?"selected":""?>>B+</option>
					<option value="B-" <?=($_SESSION['user']['blood_group'] == 'B-')?"selected":""?>>B-</option>
					<option value="O+" <?=($_SESSION['user']['blood_group'] == 'O+')?"selected":""?>>O+</option>
					<option value="O-" <?=($_SESSION['user']['blood_group'] == 'O-')?"selected":""?>>O-</option>
					<option value="AB+" <?=($_SESSION['user']['blood_group'] == 'AB+')?"selected":""?>>AB+</option>
					<option value="AB-" <?=($_SESSION['user']['blood_group'] == 'AB-')?"selected":""?>>AB-</option>
				</select>
				<i class="fa-solid fa-circle-check"></i>
				<i class="fa-solid fa-circle-exclamation"></i>
				<small>Error message</small>		
			</div>
			<div class="form-control">
				<label for="present_address" class="label_box">Present Address</label>
				<input type="text" name="present_address" id="present_address" class="input_box" onfocusout="checkInputs('present_address')" value="<?=$_SESSION['user']['present_address']?>">
				<i class="fa-solid fa-circle-check"></i>
				<i class="fa-solid fa-circle-exclamation"></i>
				<small>Error message</small>		
			</div>
			<div class="form-control">
				<label for="permanent_address" class="label_box">Permanent Address</label>
				<input type="text" name="permanent_address" id="permanent_address" class="input_box" onfocusout="checkInputs('permanent_address')" value="<?=$_SESSION['user']['permanent_address']?>">
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