<?php
$username=$_POST['username'];

$security_ques=$_POST['security_ques'];
$security_ans=$_POST['security_ans'];

	$dbc=mysqli_connect('localhost','root','shubh','pclub_data')
          or die('Error connecting to MYSQL server.');
  $query="SELECT * FROM users WHERE username = '".$username ."'";
  $result=mysqli_query($dbc,$query);
  $row=mysqli_fetch_array($result);
  if($row){
    if($row['security_ans'] == $security_ans && $row['security_ques'] == $security_ques){
      echo '
              <form id="password_reset" method="post" action="http://localhost/website_new/site/password_validation">
                <input type="hidden" name="username" value="'.$username.'" >
                <div class="field">
                  <div class="ui left labeled icon input">
                    <input type="password" name="password" placeholder="New Password" >
                    <i class="lock icon"></i>
                    <div class="ui corner label">
                      <i class="asterisk icon"></i>
                    </div>
                  </div>
                </div>

                <div class="field">
                  <div class="ui left labeled icon input">
                    <input type="password" name="cppassword" placeholder="Confirm Password" >
                    <i class="lock icon"></i>
                    <div class="ui corner label">
                      <i class="asterisk icon"></i>
                    </div>
                  </div>
                </div>
                <input type="button" onClick="submit_password();" id="forgot_button" value="Continue">
              </form>';
    }else{
      echo "The Information doesn't match please <div onClick='try_agan();' style='text-decoration:underline;'>try again</div>";
    }

  }else{
    echo "The Username doesn't match please<div onClick='try_agan();' style='text-decoration:underline;'>try again</div>";
  }
?>