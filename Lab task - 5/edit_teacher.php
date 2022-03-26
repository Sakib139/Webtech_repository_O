<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php include 'log_top.php';?>

	<?php 
	$id = $_GET['id'];
	$name = $email = $day = $month = $year = $gender = "";
	$nameErr = $emailErr = $dayErr = $monthErr = $yearErr= $genderErr = "" ;

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
				'gender' => $_POST['gender'],
				'dob_day' => $_POST['day'],
				'dob_month' => $_POST['month'],
				'dob_year' => $_POST['year']
			];
			$db->update('users', $set, 'id = '.$id);
			header('Location: view_teacherList.php');
		}
	}else{
		
		$user = $db->get('users', '*', "id = ".$id);
		$user = $user[0];
		$name = $user['name'];
		$email = $user['email'];
		$gender = $user['gender'];
		$day = $user['dob_day'];
		$month = $user['dob_month'];
		$year = $user['dob_year'];
	}
	?>


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
					<fieldset>
						<legend>EDIT PROFILE</legend>
						<form method="post" action="">
								
								<legend>Name</legend>
								<input type="hidden" name="id" value="<?=$id?>">
								<input type="text" name="fname" value="<?=$name?>"><span style="color: red;"><?php echo $nameErr ?></span>
								<hr>
							

								
								<legend>Email</legend>
								<input type="text" name="email" value="<?=$email?>"><span style="color: red;"><?php echo $emailErr ?></span>
								<hr>
							

							
								<legend>Gender</legend>
								<input type="radio" name="gender" value="male" id="male" <?= ($gender == 'male')? "checked":"" ?>>Male
								<input type="radio" name="gender" value="female" id="female" <?= ($gender == 'female')? "checked":"" ?>>Female
								<input type="radio" name="gender" value="others" id="others" <?= ($gender == 'others')? "checked":"" ?>>Others
								<br><span style="color: red;"><?php echo $genderErr ?></span>
								<hr>
						
							
								<legend>Date of birth</legend>
								(dd/mm/yyyy)
								<br><br>
								<input type="text" name="day" value="<?= $day?>">
								<input type="text" name="month" value="<?= $month?>">
								<input type="text" name="year" value="<?= $year?>">
								<br>
								<span style="color: red;"><?php echo $dayErr ?></span><br>
								<span style="color: red;"><?php echo $monthErr ?></span><br>
								<span style="color: red;"><?php echo $yearErr ?></span><br>
								<hr>
							

								<input type="submit" name="submit" value="Submit">

						</fieldset>
					</td>
				</tr>
			</table>
		</fieldset>

		<?php include 'footer.php';?>
	</body>
	</html>