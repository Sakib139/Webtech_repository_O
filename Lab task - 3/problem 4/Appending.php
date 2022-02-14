<!DOCTYPE html>
<html>
<head>
	<title>This is a JSON form task</title>
	<style type="text/css">
		.red{
			color: red;
			font-family: Perpetua;
		}
	</style>
</head>
<body>

	<?php 

	$name = $email = $day = $month = $year = $gender = "";
	$nameErr = $emailErr = $dayErr = $monthErr = $yearErr= $genderErr = $message = $error = "";

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
			//gender validation
		if(!isset($_POST['gender']) || empty($_POST['gender'])){
			$genderErr = "Gender field is required";
		}
		else{
			$gender = $_POST['gender'];
		}

		if(file_exists('data.json'))  
           {  
                $current_data = file_get_contents('data.json');  
                
                $array_data = json_decode($current_data, true);  
                $new_data = array(  
                     'name'    =>     $_POST["fname"],  
                     'e-mail'  =>     $_POST["email"],  
                     'day'     =>     $_POST["day"],  
                     'month'   =>     $_POST["month"],  
                     'year'    =>     $_POST["year"],
                     'gender'  =>     $_POST["gender"] 
                );  
                $array_data[] = $new_data;  
                $final_data = json_encode($array_data);  
                
                if(file_put_contents('data.json', $final_data))  
                {  
                     $message = "<label class='text-success'>File Appended Successfully</p>";  
                }  
           }  
           else  
           {  
                $error = 'JSON File does not exits';  
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

		<?php  
             if(isset($message))  
                {  
                  echo $message;  
                }  
        ?>  
		<input type="submit" name="submit" value="Submit">
	</form>

</body>
</html>