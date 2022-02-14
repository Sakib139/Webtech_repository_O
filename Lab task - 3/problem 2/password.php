<!DOCTYPE html>
<html>
<head>
	<title>Password validation</title>
</head>
<body>

	<?php
		$set_up_pass = "abuSakib139"; 
		$curr_pass = $new_pass = $re_new_pass = "";
		$curr_pass_Err = $new_pass_Err = $re_new_pass_Err = $pass_mismatch_Err = $same_prev_pass_Err = "";  

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';

		//current password validation
			if (!isset($_POST['curr_pass']) || empty($_POST['curr_pass'])) {
				$curr_pass_Err = "Field can not be empty";
			}
			else{
				$curr_pass = $_POST['curr_pass'];
				//set up password matching
				if ($set_up_pass !== $curr_pass) {
					$curr_pass_Err = "Old password mismatch";
				}
			}

		//new password validation
			if (!isset($_POST['new_pass']) || empty($_POST['new_pass'])) {
				$new_pass_Err = "Field can not be empty";
			}
			else{
				$new_pass = $_POST['new_pass'];
				//checking if new password is same as previous one
					if ($new_pass == $curr_pass) {
						$same_prev_pass_Err = "New password can not be same as previous one";
					}
			}
		//re-type password validation
			if (!isset($_POST['re_new_pass']) || empty($_POST['re_new_pass'])) {
				$re_new_pass_Err = "Field can not be empty";
			}
			else{
				$re_new_pass = $_POST['re_new_pass'];
				//checking new password matching
				if ($new_pass !== $re_new_pass) {
					$pass_mismatch_Err = "New password mismatch";
				}
			}
		}
	?>

	<form method="post" action="<?php echo ($_SERVER['PHP_SELF']);?>">
		<fieldset>
				<legend>CHANGE PASSWORD</legend>
				<table border="1">
					<tr>
						<td>Current Password</td>
						<td>:</td>
						<td><input type="text" name="curr_pass" value="<?php echo $curr_pass; ?>"></td>
						<td><?php echo $curr_pass_Err; ?></td>
						<td></td>
					</tr>

					<tr>
						<td>New Password</td>
						<td>:</td>
						<td><input type="text" name="new_pass" value="<?php echo $new_pass; ?>"></td>
						<td><?php echo $new_pass_Err; ?></td>
						<td><?php echo $same_prev_pass_Err; ?></td>
						
					</tr>

					<tr>
						<td>Retype new Password</td>
						<td>:</td>
						<td><input type="text" name="re_new_pass" value="<?php echo $re_new_pass; ?>"></td>
						<td><?php echo $re_new_pass_Err; ?></td>
						<td><?php echo $pass_mismatch_Err; ?></td>
					</tr>
				</table>
				<br>
				<hr>
		<input type="submit" name="submit">
		</fieldset>
	</form>

</body>
</html>