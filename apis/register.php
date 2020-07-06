
<?php 

session_start();
include 'db.php';
include 'data.php';
include 'data1.php';

function validateName($name){
	// echo $name;
	if($name==''){
		echo(json_encode(array('status'=>'failure','message'=>' first and last name required')));
		return 0;
	}

	if(!preg_match("/^[a-zA-Z ]+$/", $name)){
	echo(json_encode(array('status'=>'failure','message'=>' name should contain letters and spaces only')));
	return  0;
	}	
	return 1;
}





	
function validateRoll($rollno){
	if($rollno==''){
		echo(json_encode(array('status'=>'failure','message'=>'roll number is required')));
		return 0;
	}
		if(!preg_match('/^[17]{1}\d{1}[65]{1}[a-zA-Z]{2}\d{4}/',$rollno)){

		echo(json_encode(array('status'=>'failure','message'=>'rollno should be of format 116ee0265/715ee0265')));
		return 0;
		}
	return 1;
	
}
function validateEmail($email) {

	if ($email == '') {

		echo(json_encode(array('status' => 'failure', 'message' => 'Email is required')));
	} else {

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {

			echo(json_encode(array('status' => 'failure', 'message' => 'Valid email is required')));
		} else {
				return 1;
			 }
		}
		return 0;
	}

function validatePassword($password) {
	if ($password == '') {

		echo(json_encode(array('status' => 'failure', 'message' => 'Password is required')));
		return 0;
	}

	if (strlen($password) < 8) {

		echo (json_encode(array('status' => 'failure', 'message' => 'Password needs to have 8-32 characters')));
		return 0;
	}
	else
		return 1;
}
function validatePhone($phone) {
	if ($phone == '') {

		echo(json_encode(array('status' => 'failure', 'message' => 'Phone number is required')));
		return 0;
	}
	if (!preg_match('/^[0-9]{10}$/', $phone)) {

		echo(json_encode(array('status' => 'failure', 'message' => 'Phone number should have 10 digits and should start with 6,7,8, or 9')));
		return 0;
	}
	return 1;
}

function validateAdress($adress){
	if($adress==""){
		echo(json_encode(array('status'=>'failure','message'=>'adress ,city and state are required')));
	return 0;

	}
	return 1;
}
function validatePin($pin){
if($pin==""){
	echo(json_encode(array('status'=>'failure','message'=>'pin code is required')));
return 0;

}else{
	if (!preg_match('/^[0-9]{6}$/', $pin)) {

		echo(json_encode(array('status' => 'failure', 'message' => 'pin code comtains only 6 digit numbers')));
		return 0;
	}
	return 1;
}
}

	
					
						
						

if($_SERVER["REQUEST_METHOD"] === "POST" )
	{
		$fname = $_POST["fname"];
		$lname = $_POST["lname"];
		$rollno = $_POST["rollno"];
		$phoneno = $_POST["phoneno"];
		$adress = $_POST["adress"];
		$state = $_POST["state"];
		$city = $_POST["city"];
		$pin = $_POST["pin"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$confirmPassword=$_POST["cpass"];
		
		//echo $name.' '.$rollno.' '.$phoneno.' '. $adress.' '.$email.' '.$password.' '.$confirPassword;
		

		if ( isset($fname) && isset($lname) && isset( $phoneno) && isset($adress) && isset($state) && isset($city) && isset($pin) && isset($email) && isset($password) && isset($confirmPassword) && isset($rollno) ) 
		{
			if($password==$confirmPassword){
    
				$query1=mysqli_query($conn,"SELECT * from users where email='$email'");
				$count=mysqli_num_rows($query1);
			
				if(mysqli_num_rows($query1)==0){
		          if( validateName($fname) && validateName($lname) && validateRoll($rollno) && validatePhone($phoneno) && validateEmail($email)   && validateAdress($adress) && validateAdress($state) && validateAdress($city) && validatePin($pin)  &&validatePassword($password)  )
	              {
					$name=$fname.' '.$lname;
					$adress=$adress.','.$city.','.$state.','.$pin;
					$name = mysqli_real_escape_string($conn, $name);
			    	$rollno = mysqli_real_escape_string($conn, $rollno);
			    	$phoneno = mysqli_real_escape_string($conn, $phoneno);
				    $email = mysqli_real_escape_string($conn, $email);
				    $adress = mysqli_real_escape_string($conn, $adress);
	        	    $password = mysqli_real_escape_string($conn, hash('sha512', $password) );

				$q = "INSERT INTO users(name, rollno, phoneno, email, adress, password) VALUES ('$name','$rollno','$phoneno','$email','$adress','$password')";
				
				$query = mysqli_query($conn, $q);

				  if ($query) {

					$query = mysqli_query($conn, 'SELECT email FROM users WHERE email="'.$email.'"');
					$email = mysqli_fetch_array($query)["email"];
					echo(json_encode(array('status'=>'success','message'=>$email)));
					
				  }
				}
			else
			{
				echo(json_encode(array('status'=>'failure','message' => 'Validation failed')));
			}
		}
		else
		 {
		 	echo(json_encode(array('status'=>'failure','message' => 'Email is already registered')));
		 }
		}
		else
		 {
		 	echo(json_encode(array('status'=>'failure','message' => 'Passwords are not matching')));
		 }
		}
		 else
		 {
		 	echo(json_encode(array('status'=>'failure','message' => 'Fill all fields')));
		 }
	}
	else{
		echo(json_encode(array('status'=>'failure','message' => 'not a post request')));
	}

?>
