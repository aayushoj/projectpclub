<?php
$username=$_POST['username'];
$password=$_POST['old_password'];
	$dbc=mysqli_connect('localhost','root','shubh','pclub_data')
          or die('Error connecting to MYSQL server.');
  $query="SELECT * FROM users WHERE username = '".$username ."'";
  $result=mysqli_query($dbc,$query);
  $row=mysqli_fetch_array($result);
  if($row['password'] == md5($password)){
    echo '
      <form id="password_reset_new" method="post" action="http://localhost/website_new/site/password_validation">
        <input type="hidden" name="username" value="'.$username.'" >
        <div class="field">
          <div class="ui left labeled icon input">
            <input type="password" name="password" placeholder="New Password" id="new_passord">
            <i class="lock icon"></i>
            <div class="ui corner label">
              <i class="asterisk icon"></i>
            </div>
          </div>
        </div>

        <div class="field">
          <div class="ui left labeled icon input">
            <input type="password" name="cppassword" placeholder="Confirm Password" id="new_cppassord">
            <i class="lock icon"></i>
            <div class="ui corner label">
              <i class="asterisk icon"></i>
            </div>
          </div>
        </div>
        <input type="button" onClick="submit_password_new();" id="forgot_button" value="Continue">
      </form>
      <div class="ui horizontal divider" style="margin-top:4em;color:red">
      Or</div>
      <p> Send reset link to your email Id </p>
      <form id="signin_form" action="<?php echo base_url(); ?>site/" method="post" name="forgot_form">
        <div class="field"  >
          <div class="ui left labeled icon input"  >
            <input type="text" name="email" placeholder="Email-id" id="forgot_email">
            <i class="user icon"></i>
            <div class="ui corner label">
              <i class="asterisk icon"></i>
            </div>
          </div>
        </div>
        <input type="button" onClick="send_email_forgot()" id="forgot_button" value="Continue">
      </form>';
  }else{
    echo "The Password doesn't match please <div onClick='try_agan1();' style='text-decoration:underline;'>try again</div>";
  }
?>
