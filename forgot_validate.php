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


    <div class="ui center aligned small modal" id="forgot1_modal" style="width:400px;">
      <div class="ui teal inverted form segment">
        <div id="forgot_top">
          <form id="forgot_form" method="post" name="forgot_form"> 
            <div class="field">
              <div class="ui left labeled icon input" style="margin:20px 0px px 0px">
                <input type="text" name="username" placeholder="Username" id="forgot_username">
                <i class="user icon"></i>
                <div class="ui corner label">
                  <i class="asterisk icon"></i>
                </div>
              </div>
            </div>

            <div class="ui selection dropdown" >
              <input type="hidden" name="security_ques" id="forgot_sec_que">
              <div class="default text" >Security Question</div>
              <i class="dropdown icon" ></i>
              <div class="menu" >
                <div class="item" data-value="Place of birth">Place of birth</div>
                <div class="item" data-value="Favourite Movie">Favourite Movie</div>
                <div class="item" data-value="First Pet">First Pet</div>
                <div class="item" data-value="Favourite Dish">Favourite Dish</div>
              </div>
            </div>

            <div class="field" style="margin:10px 0px">
              <div class="ui left labeled icon input">
                <input type="text" name="security_ans" placeholder="Security Ans" id="forgot_sec_ans">
                <i class="user icon"></i>
                <div class="ui corner label">
                  <i class="asterisk icon"></i>
                </div>
              </div>
            </div>
            <input type="button" onClick="forgot_validate();" id="forgot_button" value="Continue">
          </form>
        </div>
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
        </form>
      </div>
    </div>