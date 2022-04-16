<div class="row" style="margin-bottom: 20px;">
	<?php include 'admin_profile_bar.php'?>
	<div class="card" style="max-width: 600px; margin-left: 10px; margin-right: 10px">
		<form action="<?=base_url('index.php/admin/add_notice_submit')?>" method="post" class="form" id="add-notice-form">
			<h2>Add Notice</h2>
			<h4 id="addTeacherFailed" style="color: red; display: none;">Failed to Add Notice. Please Try Again</h4>
			<div class="form-control">
				<label for="title" class="label_box">Notice Title</label>
				<input type="text" name="title" id="title" class="input_box" onfocusout="checkInputs('title')" autocomplete="off">
				<i class="fa-solid fa-circle-check"></i>
				<i class="fa-solid fa-circle-exclamation"></i>
				<small>Error message</small>		
			</div>
			<div class="form-control">
				<label for="description" class="label_box">Notice Description</label>
				<input type="text" name="description" id="description" class="input_box" onfocusout="checkInputs('description')" autocomplete="off">
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