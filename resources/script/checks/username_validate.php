<?php
	$dbc=mysqli_connect('localhost','root','shubh','pclub_data')
	    	or die('Error connecting to MYSQL server.');


		$username=mysql_real_escape_string($_POST['username']);
		$qu="SELECT * FROM users WHERE username = '".$username."'";
		$query = mysqli_query($dbc,$qu);
		$rows=mysqli_num_rows($query);
		if(!$rows){
			echo "No such user exist";
		}


?>