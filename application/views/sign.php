<script>
  function submitform()
  {
    document.getElementById("signin_form").submit();
  }
</script>
<form id="signin_form" action="<?php echo base_url(); ?>site/signup_validation" method="post"> 
  <div class="log">
  	<div class="ui two column middle aligned relaxed grid basic segment">
      <div class="column" >
        <div class="ui teal inverted form segment" >
          <?php echo validation_errors(); ?>
          <div class="field"  >
          	<div class="ui left labeled icon input"  style="margin:20px 0px 10px 0px">
              <input type="text" name="email" placeholder="email-id">
              <i class="user icon"></i>
              <div class="ui corner label">
                <i class="asterisk icon"></i>
              </div>
            </div>
        </div>
      <div class="field">
        <div class="ui left labeled icon input">
          <input type="password" name="password" placeholder="Password">
          <i class="lock icon"></i>
          <div class="ui corner label">
            <i class="asterisk icon"></i>
          </div>
        </div>
      </div>

      <div class="field">
        <div class="ui left labeled icon input">
          <input type="password" name="cppassword" placeholder="Confirm Password">
          <i class="lock icon"></i>
          <div class="ui corner label">
            <i class="asterisk icon"></i>
          </div>
        </div>
      </div>

      <div class="ui green submit button" onClick="submitform()">Sign-Up</div>
      <div class="ui horizontal divider" style="margin-top:5em; color:red;">
      Or
    </div>
    <p style="text-align:center"><ins style="color:blue;">Or Connect with</ins></p>
      <div class="ui google plus button" style="margin-top:0.5em; margin-left:4em;">
        <i class="google plus icon"></i>
        Google Plus
      </div>
    </div>
    <form>
    </div>
    <div class="ui vertical divider" >
    	<div style="color:orange;">
    	Or
    </div>
    </div>
    <div class="center aligned column">
      <a href="<?php echo base_url(); ?>site/login">
      <div class="huge blue ui labeled icon button">
        <i class="signup icon"></i>
        Login
      </div></a>
    </div>
  </div>
</div>