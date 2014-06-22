<?php
	$dbc=mysqli_connect('localhost','root','shubh','pclub_data')
	    	or die('Error connecting to MYSQL server.');

	$username=mysql_real_escape_string($_POST['username']);
	$qu="SELECT * FROM users WHERE username = '".$username."'";
	$query = mysqli_query($dbc,$qu);
	$rows=mysqli_num_rows($query);
	$qu1="SELECT * FROM temp_users WHERE username = '".$username."'";
	$query1 = mysqli_query($dbc,$qu1);
	$rows1=mysqli_num_rows($query1);
	if($username==''){
		echo "Username is required";
	}

	else {
		if($rows || $rows1){
			echo "Username already taken";
		}
		else{
			echo "available";
		}
	}
	


?>