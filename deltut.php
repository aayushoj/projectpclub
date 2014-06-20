<?php
$id=($_POST['id']);
 $con=mysqli_connect('localhost','root','shubh','pclub_data')
        or die('Error connecting to MYSQL server.');
  $result=mysqli_query($con,"SELECT filename FROM tutorial WHERE id = $id");
$row=mysqli_fetch_array($result);
mysqli_query($con,"DELETE FROM tutorial WHERE id = $id");
 unlink("file/".$row['filename']);
mysqli_close($con);
//header('Location: http://localhost/website/site/tutorial'); 
//redirect('http://localhost/website/site/tutorial');
// $do=unlink("file/login.html");
// if($do==1)
// {
//   echo 'success';
// }
?>