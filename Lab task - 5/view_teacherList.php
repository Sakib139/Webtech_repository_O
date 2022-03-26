<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.red{
			color: red;
			font-family: Perpetua;
		}
	</style>
</head>
<body>
	<?php include 'log_top.php';?>



	<fieldset>
		<table border="1">
			<tr>
				<td width="25%"><!-- left part -->
					<ul style="list-style-type:disc;">
						<li><a href="user_account.php">Dashboard</a></li>
						<li><a href="view_profile.php">View Profile</a></li>
						<li><a href="add_teacher.php">Add Teacher</a></li>
						<li><a href="view_teacherList.php">View Teacher List</a></li>

					<form method="POST" action="logout.php">
						<li><button type="submit" name="logout_btn">Log out</button></li>
					</form>
					</ul>
				</td>
				<td width="100%"><!-- right part --><legend><h2>Teacher List</h2><hr></legend>
					<fieldset>
						
					<table border="1">
				<tr>
					<th>Teachers name</th>
					<th>Email</th>
					<th>Username</th>
					<th>Gender</th>
					<th>dob (day)</th>
					<th>dob (month)</th>
					<th>dob (year)</th>
					<th>Action</th>
					<th>Action</th>
				</tr>

				<?php 
					$teachers = $db->get('users');

					foreach ($teachers as $teacher){
				?>

				<tr>
					<td><?=$teacher['name']?></td>
					<td><?=$teacher['email']?></td>
					<td><?=$teacher['username']?></td>
					<td><?=$teacher['gender']?></td>
					<td><?=$teacher['dob_day']?></td>
					<td><?=$teacher['dob_month']?></td>
					<td><?=$teacher['dob_year']?></td>
					<td><a href="edit_teacher.php?id=<?=$teacher['id']?>">Edit</a></td>
					<td><a href="delete_teacher.php?id=<?=$teacher['id']?>">Delete</a></td>
				
				</tr>

				<?php } ?>

			</table>
			</fieldset>
				</td>
			</tr>
		</table>
	</fieldset>

	<?php include 'footer.php';?>
</body>
</html>