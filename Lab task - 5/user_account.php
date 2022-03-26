<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php include 'log_top.php';?>

	<fieldset>
		<table border="1" width="100%">
			<tr>
				<td width="25%">
					Account<hr><br>
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
				<td width="75%">
					<h2 align="center">Welcome <?= $_SESSION['user']['name']?></h2>
				</td>
			</tr>
		</table>
	</fieldset>

	<?php include 'footer.php';?>
</body>
</html>