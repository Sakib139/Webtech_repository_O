<div class="row" style="margin-bottom: 20px;">
	<?php include 'admin_profile_bar.php'?>
	<div class="card" style="max-width: 600px; margin-left: 10px; margin-right: 10px">
		<form action="<?=base_url('index.php/admin/add_teacher_submit')?>" method="post" class="form" id="add-teacher-form">
			<h2>Add Teacher</h2>
			<h4 id="addTeacherFailed" style="color: red; display: none;">Failed to Add Teacher. Please Try Again</h4>
			<div class="form-control">
				<label for="first_name" class="label_box">First Name</label>
				<input type="text" name="first_name" id="first_name" class="input_box" onfocusout="checkInputs('first_name')" autocomplete="off">
				<i class="fa-solid fa-circle-check"></i>
				<i class="fa-solid fa-circle-exclamation"></i>
				<small>Error message</small>		
			</div>
			<div class="form-control">
				<label for="last_name" class="label_box">Last Name</label>
				<input type="text" name="last_name" id="last_name" class="input_box" onfocusout="checkInputs('last_name')" autocomplete="off">
				<i class="fa-solid fa-circle-check"></i>
				<i class="fa-solid fa-circle-exclamation"></i>
				<small>Error message</small>		
			</div>
			<div class="form-control">
				<label for="email" class="label_box">Email</label>
				<input type="text" name="email" id="email" class="input_box" onfocusout="checkInputs('email')" autocomplete="off">
				<i class="fa-solid fa-circle-check"></i>
				<i class="fa-solid fa-circle-exclamation"></i>
				<small>Error message</small>		
			</div>
			<div class="form-control">
				<label for="username" class="label_box">Username</label>
				<input type="text" name="username" id="username" class="input_box" onfocusout="checkInputs('username', 'username')" autocomplete="off">
				<i class="fa-solid fa-circle-check"></i>
				<i class="fa-solid fa-circle-exclamation"></i>
				<small>Error message</small>		
			</div>
			<div class="form-control">
				<label for="password" class="label_box">Password</label>
				<input type="password" name="password" id="password" class="input_box" onfocusout="checkInputs('password', 'password')" autocomplete="off">
				<i class="fa-solid fa-circle-check"></i>
				<i class="fa-solid fa-circle-exclamation"></i>
				<small>Error message</small>		
			</div>
			<div class="form-control">
				<label for="gender" class="label_box">Gender</label>
				<select name="gender" id="gender" class="input_box" onchange="checkInputs('gender')">
					<option>Select Gender</option>
					<option value="male">Male</option>
					<option value="female">Female</option>
				</select>
				<i class="fa-solid fa-circle-check"></i>
				<i class="fa-solid fa-circle-exclamation"></i>
				<small>Error message</small>		
			</div>
			<div class="form-control">
				<label for="date_of_birth" class="label_box">Date of Birth</label>
				<input type="date" name="date_of_birth" id="date_of_birth" class="input_box" onfocusout="checkInputs('date_of_birth')" autocomplete="off">
				<i class="fa-solid fa-circle-check"></i>
				<i class="fa-solid fa-circle-exclamation"></i>
				<small>Error message</small>		
			</div>
			<div class="form-control">
				<label for="blood_group" class="label_box">Blood Group</label>
				<select name="blood_group" id="blood_group" class="input_box" onchange="checkInputs('blood_group')">
					<option>Select Blood Group</option>
					<option value="A+">A+</option>
					<option value="A-">A-</option>
					<option value="B+">B+</option>
					<option value="B-">B-</option>
					<option value="O+">O+</option>
					<option value="O-">O-</option>
					<option value="AB+">AB+</option>
					<option value="AB-">AB-</option>
				</select>
				<i class="fa-solid fa-circle-check"></i>
				<i class="fa-solid fa-circle-exclamation"></i>
				<small>Error message</small>		
			</div>
			<div class="form-control">
				<label for="present_address" class="label_box">Present Address</label>
				<input type="text" name="present_address" id="present_address" class="input_box" onfocusout="checkInputs('present_address')" autocomplete="off">
				<i class="fa-solid fa-circle-check"></i>
				<i class="fa-solid fa-circle-exclamation"></i>
				<small>Error message</small>		
			</div>
			<div class="form-control">
				<label for="permanent_address" class="label_box">Permanent Address</label>
				<input type="text" name="permanent_address" id="permanent_address" class="input_box" onfocusout="checkInputs('permanent_address')" autocomplete="off">
				<i class="fa-solid fa-circle-check"></i>
				<i class="fa-solid fa-circle-exclamation"></i>
				<small>Error message</small>		
			</div>
			<div class="form-control">
				<div class="btn-group">
					<input type="submit" name="_login" value="Add" class="button">
				</div>
			</div> 	
		</form>
	</div>
	<?php include 'admin_sidebar.php'?>
</div>