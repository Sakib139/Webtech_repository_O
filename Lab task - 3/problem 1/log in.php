<!DOCTYPE html>
<html>
<head>
	<title>This is Log in validation</title>
</head>
<body>

	<?php
		$userName = $pass = "";
		$userName_Err = $pass_Err = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			echo '<pre>';
			print_r($_POST);
			echo '</pre>';

			//username validation
			if (!isset($_POST['user_name']) || empty($_POST['user_name'])) {
				$userName_Err = "User Name is required";
			}
			else{
				$userName = $_POST['user_name'];
					if (!preg_match("/^[a-zA-z_0-9]*$/", $userName)) {
						$userName_Err = "Only characters, alphabic numeric characters, dash, underscore can be used in username";
					}
					else if(strlen($userName) < 2){
						$userName_Err = "Username must contain at least 2 characters";
					}
				}
			//password validation
			if (!isset($_POST['password']) || empty($_POST['password'])) {
					$pass_Err = "Password is required";
				}
			else{
				$pass = $_POST['password'];

				//length checking
				if (strlen($pass) < 8) {
					$pass_Err = "Password must contain at least 8 characters";
				}
				//specific character checking
				$special_pass_check_1 = preg_match("/@/", $pass);
				$special_pass_check_2 = preg_match("/$/", $pass);
				$special_pass_check_3 = preg_match("/#/", $pass);
				$special_pass_check_4 = preg_match("/%/", $pass);

	
				if($special_pass_check_1 == 0 || $special_pass_check_2 == 0 || $special_pass_check_3 == 0 || $special_pass_check_4 == 0) {
					$pass_Err = "Password must contain at least one of @, $, #, %";
					
				}					
		
			}
				
		}

	?>
	<form method="post" action="<?php echo ($_SERVER['PHP_SELF']);?>">
		<fieldset>
			<legend><h2>LOGIN</h2></legend>
				<table>
					<tr>
						<td><label>User Name: </label></td>
						<td><input type="text" name="user_name" value="<?php echo $userName;?>"></td>
						<td><?php echo $userName_Err?></td>
					</tr>

					<tr>
						<td><label>Password: </label></td>
						<td><input type="text" name="password" value="<?php echo $pass;?>"></td>
						<td><?php echo $pass_Err?></td>
					</tr>
				</table><br>
		<hr>
		<input type="checkbox" name="remember_me" value="remembered">Remember me<br><br>
		<input type="submit" name="submission" value="submit">
		<a href="https://genshin.hoyoverse.com/en/">Forgot Password?</a>			
		</fieldset>
	</form>
</body>
</html>