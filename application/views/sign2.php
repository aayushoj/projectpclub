<form id="myform" action="<?php echo base_url(); ?>site/login_validation" method="post">
<div class="log">
	<div class="ui two column middle aligned relaxed grid basic segment">
    <div class="column" >
      <div class="ui form segment" >
        <div class="field"  >
        	<div class="ui left labeled icon input">
            <input name="email" type="text" placeholder="email-id">
            <i class="user icon"></i>
            <div class="ui corner label">
              <i class="asterisk icon"></i>
            </div>
          </div>
      </div>

    	<div class="field">  
      <div class="ui left labeled icon input">
        <input name="user"type="text" placeholder="Username">
        <i class="user icon"></i>
        <div class="ui corner label">
          <i class="asterisk icon"></i>
        </div>
      </div>
    </div>
    <div class="field">
      <div class="ui left labeled icon input">
        <input name="pass" type="password" placeholder="Password">
        <i class="lock icon"></i>
        <div class="ui corner label">
          <i class="asterisk icon"></i>
        </div>
      </div>
    </div>

    <div class="ui green submit button" onclick="submitform()">SIGN-up</div>
    <div class="ui horizontal divider" style="margin-top:5em;">
    Or
  </div>
  <p style="text-align:center"><ins>Or Connect with</ins></p>
    <div class="ui google plus button" style="margin-top:0.5em; margin-left:4em;">
<i class="google plus icon"></i>
Google Plus
</div>
</div>

  </div>
 
</form>
<script>
	function submitform()
	{
		document.getElementById("myform").submit();
	}
</script>

  <div class="ui vertical divider" >
  	<div style="color:white;">
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