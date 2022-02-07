<!DOCTYPE html>
<html>
<head>
	<title>This is a PHP form validation task</title>
	<style type="text/css">
		.red{
			color: red;
			font-family: Perpetua;
		}
	</style>
</head>
<body>

	<?php 

	$name = $email = $day = $month = $year = $gender = $degree = $bloodType = "";
	$nameErr = $emailErr = $dayErr = $monthErr = $yearErr= $genderErr = $degreeErr = $bloodTypeErr = "";

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';
			//name validation
		if(!isset($_POST['fname']) || empty($_POST['fname'])){
			$nameErr = "Name is required";
		}
		else{
			$name = $_POST['fname'];
			if(!preg_match("/^[a-zA-Z-' ]*$/", $name)){
				$nameErr = "Only letters, whitespaces, - and ' are acceptable";
			}
			else if(str_word_count($name)<2){
				$nameErr = "Name has to contain at least two words ";
			}
		}
			//email validation
		if(empty($_POST['email'])){
			$emailErr = "Email is required";
		}
		else{
			$email = $_POST['email'];
			$email_pattern = "/@gmail.com/i";
			$email_matching_result = preg_match($email_pattern, $email);
			if($email_matching_result == 0){
				$emailErr = "Email format is not valid";
			}
		}
			//date of birth validation
			//day validation
		if(empty($_POST['day'])){
			$dayErr = "Day field is required";
		}
		else{
			$day = $_POST['day'];
			if($day < 1 || $day > 31){
				$dayErr = "Invalid day";
			}
		}
			//month validation
		if(empty($_POST['month'])){
			$monthErr = "Month field is required";
		}
		else{
			$month = $_POST['month'];
			if($month > 12 || $month < 1){
				$monthErr = "Invalid month";
			}
		}
			//year validation
		if(empty($_POST['year'])){
			$yearErr = "Year field is required";
		}
		else{
			$year = $_POST['year'];
		
			if($year < 1954 || $year > 1998){
				$yearErr = "Invalid year";
			}
		}
			//special date validation [work in process]
			//gender validation
		if(!isset($_POST['gender']) || empty($_POST['gender'])){
			$genderErr = "Gender field is required";
		}
		else{
			$gender = $_POST['gender'];
		}
			//degree validation
		if (!isset($_POST['degree']) || empty($_POST['degree'])) {
			$degreeErr = "Degree field is required";
		}
		else{
			$degree = $_POST['degree'];
		}
		//blood type validation
		if (!isset($_POST['bGroup']) || empty($_POST['bGroup'])) {
			$bloodTypeErr = "Blood group field is required";
		}
		else{
			$bloodType = $_POST['bGroup'];
		}
	}
	?>

	<form method="post" action="<?php echo ($_SERVER['PHP_SELF']);?>">
		<fieldset>	
			<legend>NAME</legend>
			<input type="text" name="fname" value="<?php echo $name;?>"><span class="red">*<?php echo $nameErr ?></span>
			<hr>
		</fieldset>

		<fieldset>	
			<legend>EMAIL</legend>
			<input type="text" name="email" value="<?php echo $email;?>"><span class="red">*<?php echo $emailErr ?></span>
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

		<fieldset>	
			<legend>GENDER</legend>
			<input type="radio" name="gender" value="male" id="male">Male
			<input type="radio" name="gender" value="female" id="female">Female
			<input type="radio" name="gender" value="others" id="others">Others
			<br>
			<span class="red">*<?php echo $genderErr ?></span>
			<hr>	
		</fieldset>	

		<fieldset>	
			<legend>DEGREE</legend>
			<input type="checkbox" name="degree[]" value="ssc" id="ssc">SSC
			<input type="checkbox" name="degree[]" value="hsc" id="hsc">HSC
			<input type="checkbox" name="degree[]" value="bsc" id="bsc">BSc
			<input type="checkbox" name="degree[]" value="msc" id="msc">MSc
			<br>
			<span class="red">*<?php echo $degreeErr ?></span>
			<hr>		
		</fieldset>	

		<fieldset>	
			<legend>BLOOD GROUP</legend>
			<select name="bGroup">
				<option> </option>
				<option value="a+">A+</option>
				<option value="a-">A-</option>
				<option value="b+">B+</option>
				<option value="b-">B-</option>
				<option value="o+">O+</option>
				<option value="o-">O-</option>
				<option value="ab+">AB+</option>
				<option value="ab-">AB-</option>
			</select>
			<br>
			<span class="red">*<?php echo $bloodTypeErr ?></span>
			<hr>

			<input type="submit" name="submit" value="Submit">

		</fieldset>				

	</form>

</body>
</html>