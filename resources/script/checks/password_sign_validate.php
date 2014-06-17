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
			$cppassword=mysql_real_escape_string($_POST['cppassword']);
			if($password!=$cppassword){
				echo "Password doesn't match.";
			}
		}
	}


?>