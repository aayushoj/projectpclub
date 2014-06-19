<?php
$id=($_POST['id']);
$con=mysqli_connect('localhost','root','','')
        or die('Error connecting to MYSQL server.');
  	$result=mysqli_query($con,"SELECT * FROM project WHERE `id` = '$id'");
	$row=mysqli_fetch_array($result);
	mysqli_query($con,"DELETE FROM project WHERE `id` = '$id'");
	unlink("project/".$row['filename']);
	mysqli_close($con);
?>
