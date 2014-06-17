<?php
	$dbc=mysqli_connect('localhost','root','shubh','pclub_data')
	    	or die('Error connecting to MYSQL server.');


		$username=mysql_real_escape_string($_POST['username']);
		$qu="SELECT * FROM users WHERE username = '".$username."'";
		$query = mysqli_query($dbc,$qu);
		$rows=mysqli_fetch_array($query);
		$row =mysqli_num_rows($query);
		if($row){
			if( $rows['password'] != md5($_POST['password'])){
				echo "Username and Password doesn't match";
			}
		}
		else{
			echo "Please Enter a valid Username";
		}
		
?>