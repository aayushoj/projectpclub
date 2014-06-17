<?php
	$dbc=mysqli_connect('localhost','root','shubh','pclub_data')
    	or die('Error connecting to MYSQL server.');
	$username=mysql_real_escape_string($_POST['username']);
	$qu="SELECT * FROM users WHERE username = '".$username."'";
	$query = mysqli_query($dbc,$qu);
	$row=mysqli_num_rows($query);
	if($row){
		echo "Please Choose another Username";
	}
	else if($username==''){
		echo "Username is required";
	}
	else{
		$email=mysql_real_escape_string($_POST['email']);
		$qu="SELECT * FROM users WHERE email = '".$email."'";
		$query = mysqli_query($dbc,$qu);
		$rows=mysqli_num_rows($query);
		if($rows){
			echo "Email account already exist.";
		}
		else if($email==''){
			echo "Email is required";
		}
		else{
			$password=mysql_real_escape_string($_POST['password']);
			if($password==''){
				echo "Password must be atleast 8 characters long";
			}
			else if(strlen($password)<=3){
				echo "Too short for password";
			}
			else if(strlen($password)<7){
				echo "Still short";
			}
		}
		
	}
			


?>
		