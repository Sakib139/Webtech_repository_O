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
	
	<?php 

	$name = $email = $day = $month = $year = $gender = $userName = $pass = $con_pass = "";
	$nameErr = $emailErr = $dayErr = $monthErr = $yearErr= $genderErr = $con_passErr = $passErr = $userNameErr = $userExist = "" ;

	if($_SERVER["REQUEST_METHOD"] == "POST"){

		$errorFlag = false;

		//name validation
		if(!isset($_POST['fname']) || empty($_POST['fname'])){
			$nameErr = "Name is required";
			$errorFlag = true;
		}else{
			$name = $_POST['fname'];
			if(!preg_match("/^[a-zA-Z-' ]*$/", $name)){
				$nameErr = "Only letters, whitespaces, - and ' are acceptable";
				$errorFlag = true;
			}
			else if(str_word_count($name)<2){
				$nameErr = "Name has to contain at least two words ";
				$errorFlag = true;
			}
		}
		//email validation
		if(empty($_POST['email'])){
			$emailErr = "Email is required";
			$errorFlag = true;
		}else{
			$email = $_POST['email'];
			$email_pattern = "/@gmail.com/i";
			$email_matching_result = preg_match($email_pattern, $email);
			if($email_matching_result == 0){
				$emailErr = "Email format is not valid";
				$errorFlag = true;
			}
		}

		//username validation
		if (!isset($_POST['user_name']) || empty($_POST['user_name'])) {
			$userNameErr = "User Name is required";
			$errorFlag = true;
		}else{
			$userName = $_POST['user_name'];
			if (!preg_match("/^[a-zA-z_0-9]*$/", $userName)) {
				$userNameErr = "Only characters, alphabic numeric characters, dash, underscore can be used in username";
				$errorFlag = true;
			}
			else if(strlen($userName) < 2){
				$userNameErr = "Username must contain at least 2 characters";
				$errorFlag = true;
			}
		}

		//password validation
		if (!isset($_POST['password']) || empty($_POST['password'])) {
			$passErr = "Password is required";
			$errorFlag = true;
		}else{
			$pass = $_POST['password'];

			//length checking
			if (strlen($pass) < 8) {
				$passErr = "Password must contain at least 8 characters";
				$errorFlag = true;
			}
			//specific character checking
			$special_pass_check_1 = strpos($pass, "@");
			$special_pass_check_2 = strpos($pass, "#");
			$special_pass_check_3 = strpos($pass, "%");
			$special_pass_check_4 = strpos($pass, "$");


			if($special_pass_check_1 === FALSE && $special_pass_check_2 === FALSE && $special_pass_check_3 === FALSE && $special_pass_check_4 === FALSE) {
				$passErr = "Password must contain at least one of @, $, #, %";
				$errorFlag = true;
			}
		}
		// confirm password validation
		if($_POST['password'] !== $_POST['con_pass']){
			$con_passErr = "Confirm Password Doesn't Match!";
			$errorFlag = true;
		}
		//date of birth validation
		//day validation
		if(empty($_POST['day'])){
			$dayErr = "Day field is required";
			$errorFlag = true;
		}
		else{
			$day = $_POST['day'];
			if($day < 1 || $day > 31){
				$dayErr = "Invalid day";
				$errorFlag = true;
			}
		}
		//month validation
		if(empty($_POST['month'])){
			$monthErr = "Month field is required";
			$errorFlag = true;
		}else{
			$month = $_POST['month'];
			if($month > 12 || $month < 1){
				$monthErr = "Invalid month";
				$errorFlag = true;
			}
		}
		//year validation
		if(empty($_POST['year'])){
			$yearErr = "Year field is required";
			$errorFlag = true;
		}else{
			$year = $_POST['year'];

			if($year < 1954 || $year > 1998){
				$yearErr = "Invalid year";
				$errorFlag = true;
			}
		}
		//gender validation
		if(!isset($_POST['gender']) || empty($_POST['gender'])){
			$genderErr = "Gender field is required";
			$errorFlag = true;
		}else{
			$gender = $_POST['gender'];
		}

		if(!$errorFlag){
			$set = [
				'name' => $_POST['fname'],
				'email' => $_POST['email'],
				'username' => $_POST['user_name'],
				'password' => $_POST['password'],
				'gender' => $_POST['gender'],
				'dob_day' => $_POST['day'],
				'dob_month' => $_POST['month'],
				'dob_year' => $_POST['year']
			];

			$users = $db->get('users', 'id', "email = '".$set['email']."' OR username = '".$set['username']."'");
			if($users){
				$userExist = "Teacher Already Exists!";
			}else{
				$db->insert('users', $set);
				header("Location: view_teacherList.php");
			}
		}
	}
	?>
	<p style="color: red;"><?=$userExist?></p>
	<fieldset>
		<legend>ADD TEACHER</legend>
		<form method="post" action="<?php echo ($_SERVER['PHP_SELF']);?>">
			<fieldset>	
				<legend>NAME</legend>
				<input type="text" name="fname" value="<?php echo $name;?>"><span class="red"><?php echo $nameErr ?></span>
				<hr>
			</fieldset>

			<fieldset>	
				<legend>EMAIL</legend>
				<input type="text" name="email" value="<?php echo $email;?>"><span class="red"><?php echo $emailErr ?></span>
				<hr>
			</fieldset>	

			<fieldset>
				<legend>USER NAME</legend>
				<input type="text" name="user_name" value="<?php echo $userName;?>"><span class="red"><?php echo $userNameErr ?></span>
				<hr>
			</fieldset>

			<fieldset>
				<legend>PASSWORD</legend>
				<input type="password" name="password" value=""><span class="red"><?php echo $passErr ?></span>
				<hr>
			</fieldset>

			<fieldset>
				<legend>CONFIRM PASSWORD</legend>
				<input type="password" name="con_pass" value=""><span class="red"><?php echo $con_passErr ?></span>
				<hr>
			</fieldset>

			<fieldset>	
				<legend>GENDER</legend>
				<input type="radio" name="gender" value="male" id="male">Male
				<input type="radio" name="gender" value="female" id="female">Female
				<input type="radio" name="gender" value="others" id="others">Others
				<br>
				<span class="red"><?php echo $genderErr ?></span>
				<hr>	
			</fieldset>

			<fieldset>	
				<legend>DATE OF BIRTH</legend>
				<table>
					<thead>
						<td>dd</td>
						<td>mm</td>
						<td>yyyy</td>
						<td><span class="red"><?php echo $dayErr ?></span></td>
					</thead>
					<tr>
						<td><input type="text" name="day" value="<?php echo $day;?>"></td>
						<td><input type="text" name="month" value="<?php echo $month;?>"></td>
						<td><input type="text" name="year" value="<?php echo $year;?>"></td>
						<td><span class="red"><?php echo $monthErr ?></span></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td><span class="red"><?php echo $yearErr ?></span></td>
					</tr>
				</table>
				<hr>
			</fieldset>

			<?php 
			if (isset($_POST['go_back'])) {
				header('Location: view_profile.php');
			}
			?>

			<input type="submit" name="submit" value="Submit"><span>   </span>
			<input type="reset" name="reset" value="Reset"><span>   </span>
			<form method="POST" action="">
				<button type="submit" name="go_back">Go Back</button>
			</form>



		</form>
	</fieldset>
</fieldset>


<?php include 'footer.php';?>

</body>
</html>