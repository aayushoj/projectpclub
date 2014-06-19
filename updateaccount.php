<?php 
	// $dbc=mysqli_connect('localhost','root','',')
 //    	or die('Error connecting to MYSQL server.');


	// $username=mysql_real_escape_string($_POST['username']);
	// $qu="SELECT * FROM users WHERE username = '".$username."'";
	// $query = mysqli_query($dbc,$qu);
	// $rows=mysqli_num_rows($query);
	// if($rows){
	// 	$put=mysqli_fetch_array($query);
	// 	echo $username. "name is ". $put['name'];
	// }
	// else{
	// 	echo "Username doesn't exist";
	// }
	$dbc=mysqli_connect('localhost','root','','')
    	or die('Error connecting to MYSQL server.');
	$username=mysql_real_escape_string($_POST['username']);
	$name=$_POST['name'];
	$email=$_POST['email'];
	$about_me=$_POST['about_me'];
	$qu="UPDATE users
	SET name='".$name."', email='".$email."',about_me='".$about_me."' WHERE username = '".$username."'";
	$query = mysqli_query($dbc,$qu);
	$query1="SELECT * FROM users WHERE username = '".$username ."'";
    $result=mysqli_query($dbc,$query1);
    $put=mysqli_fetch_array($result);
	echo '<div class="ui inverted form segment">    
            <div class="field">
              USERNAME<input id="username" value='.$put['username'].' readonly="readonly" type="text">
              </div>';
             
      echo '
              <div class="field">
                <label>NAME</label>
                <input value="'.$put['name'].'" readonly="readonly" type="text">
              </div>
              <div class="field">
                <label style="color:blue;font-family:cursive; ">Email</label>
                <input value='.$put['email'].' readonly="readonly" type="text">
              </div>

              <div class="field">
                <label>About Me</label>
                <input value='.$put['about_me'].' readonly="readonly" type="text">
              </div>
              </div>
              <div class="ui button" onClick="loadXMLDoc()">
                EDIT
  			</div>';

?>
