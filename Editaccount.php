
<?php

$mode=$_POST['mode'];
//echo '<script>console.log("'.$mode.'")</script>';
$username=$_POST['username'];

if($mode=='1')
{

$name=$_POST['name'];
$email=$_POST['email'];
$about_me=$_POST['about_me'];

	$dbc=mysqli_connect('localhost','root','shubh','pclub_data')
          or die('Error connecting to MYSQL server.');
        
            $query='UPDATE users SET name = "'.$name.'" ,  email = "'.$email.'",about_me = "'.$about_me.'"  where username = "'.$username.'";';
            $result=mysqli_query($dbc,$query);

}
elseif($mode=='2')
{
	$codechef=$_POST['codechef'];
	$spoj=$_POST['spoj'];
	$topcoder=$_POST['topcoder'];
	$website=$_POST['website'];


	$dbc=mysqli_connect('localhost','root','shubh','pclub_data')
          or die('Error connecting to MYSQL server.');
        
            $query='UPDATE users SET codechef = "'.$codechef.'" ,  spoj = "'.$spoj.'",topcoder = "'.$topcoder.'",website = "'.$website.'"   where username = "'.$username.'";';
       		echo $query;
            $result=mysqli_query($dbc,$query);
}

?>