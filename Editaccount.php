<?php
  $username=$_GET['username'];


  $dbc=mysqli_connect('localhost','root','','')
      or die('Error connecting to MYSQL server.');
  $query="SELECT * FROM users WHERE username = '".$username ."'";
  $result=mysqli_query($dbc,$query);
  $put=mysqli_fetch_array($result);

  //print_r($put);
  echo'<script>
        function update(){
        $.post("'. base_url() . 'updateaccount.php", {username:"'. $this->session->userdata('username') .'", name: edit_account.name.value, email: edit_account.email.value, about_me: edit_account.about_me.value},function(output){
            $("#myDiv").html(output).show();
        });
      }</script>
  <form action ="../updatedb/'.$username;
  echo '" id="updatedb" method="post" name="edit_account">
  <div class="ui form segment">
    
      
      <div class="field">
        <label>Name</label>
        <input name="name" value="'.$put['name'].'" type="text">
      </div>
      
      <div class="field">
        <label>EMAIL</label>
        <input name="email" value="'.$put['email'].'" type="text">
      </div>
     
      <div class="field">
        <label>About Me</label>
        <input name="about_me" value="'.$put['about_me'].'" type="text">
      </div>
     
  </div>   

  <div class="ui button" onClick="update();">
        SAVE CHANGES
  </div>
  </form>';
?>


