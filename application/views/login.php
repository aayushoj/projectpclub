<script>
  function submitform()
  {
    document.getElementById("login_form").submit();
  }
</script>

<form action ="<?php echo base_url(); ?>site/login_validation" id="login_form" method="post">
  <div class="log">
  	<div class="ui two column middle aligned relaxed grid basic segment">
        <div class="column" >
          <div class="ui teal inverted form segment" >
            <?php echo validation_errors(); ?>
            <div class="field">
              <div class="ui left labeled icon input" style="margin:20px 0px 10px 0px">
                <input name="email" type="text" placeholder="Username">
                <i class="user icon"></i>
                <div class="ui corner label">
                  <i class="asterisk icon"></i>
                </div>
              </div>
            </div>
            <div class="field">
              <div class="ui left labeled icon input">
                <input name="password" type="password" placeholder="Password" style="class:ui left labeled icon input">
                <i class="lock icon"></i>
                <div class="ui corner label">
                  <i class="asterisk icon"></i>
                </div>
              </div>
            </div>

            <div class="ui purple submit button" onClick="submitform()">Login</div>
            <div class="ui horizontal divider" style="margin-top:7em;color:red">
            Or</div>
            <p style="text-align:center"><ins  style="color:blue">Or Connect with</ins></p>
            <div class="ui google plus button" style="margin-top:0.5em; margin-left:4em;">
              <i class="google plus icon"></i>
              Google Plus
            </div>
          </div>
        </div>
</form>
    <div class="ui vertical divider" style="color:red">Or
    </div>
    <div class="center aligned column">
      <a href="<?php echo base_url(); ?>site/signup">
        <div class="huge green ui labeled icon button">
          <i class="signup icon"></i>
          Sign Up
        </div>
      </a>
    </div>
  </div>
