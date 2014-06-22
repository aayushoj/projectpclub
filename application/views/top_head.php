<!DOCTYPE html>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>resources/styles/stylesheet.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>resources/packaged/css/semantic.css">
    <script src="<?php echo base_url(); ?>resources/script/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>resources/script/tinymce.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>resources/packaged/javascript/semantic.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>resources/script/script.js"></script>
    <link href="<?php echo base_url(); ?>resources/themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url(); ?>resources/themes/1/js-image-slider.js" type="text/javascript"></script>
<!--     <link href="../generic.css" rel="stylesheet" type="text/css" /> -->
    <script type="text/javascript">


    tinymce.init({
        selector: "textarea",
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste moxiemanager"
        ],

        height: "200",
        width:"1000",

        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });
    </script>
    
    <title>
        <?php echo $title; ?>
    </title>
</head>
<body background="<?php echo base_url(); ?>resources/images/background.jpg"  bgproperties="fixed" style="margin:0px;">
    <div style="background-color:#383838 ;height:40px;margin:0px;width:100%;top:0px; " class="ui fixed transparent inverted main menu">
        <nav class="menu_ex" style="margin-left:100px;display:block;">
            <a  href="<?php echo base_url(); ?>site/home"><div class="<?php if($active=='1') echo"active";?>" style="color:white;"><i class="home icon"></i> Home</div></a>

            <a  href="<?php echo base_url(); ?>site/tutorial"><div class="<?php if($active=='2') echo"active";?>" style="color:white;">Tutorials</div></a>

            <a  href="<?php echo base_url(); ?>site/projects"><div class="<?php if($active=='3') echo"active";?>" style="color:white;">Project</div></a>

            <a  href="<?php echo base_url(); ?>forum"><div class="<?php if($active=='a') echo"active";?>" style="color:white;">Forum</div></a>

            <a  href="http://pclub.in/onj/" target="_blank"><div class="<?php if($active=='a') echo"active";?>" style="color:white;">Online Judge</div></a>

            <a  href="<?php echo base_url(); ?>site/about"><div class="<?php if($active=='4') echo"active";?>" style="color:white;">About Us</div></a>

            <a href="<?php echo base_url(); ?>site/calender"><div class="<?php if($active=='5') echo"active";?>" style="color:white;">Calender</div></a>
            <?php 
                if($this->session->userdata('admin')){
                    $a ='<div class="ui compact menu" style="background-color:#383838;">';
                    $a .="<div class='ui simple dropdown item' style='margin:0px 10px;padding:10px;'>";
                        $a .= "<a style='color:white;'>Admin</a>";
                        $a .= "<div class='menu'>
                            <a href='" . base_url() . "site/admin_panel_tutorial' id='admin_menu'> <div class='item' style='font-size:15px;width:170px;'>Add Tutorial</div></a>
                            <a href='" . base_url() . "site/admin_panel_event' id='admin_menu'><div class='item' style='font-size:15px;width:170px;'>Add Event</div></a>
                            <a href='" . base_url() . "site/update_codechef_database' id='admin_menu'><div class='item' style='font-size:15px;width:170px;'>Update Codechef Data</div></a>";
                    $a.="</div></div></div>
                    ";
                    echo $a;

                }

                if ($this->session->userdata('is_logged_in')){
                    echo '<div class="ui compact menu" style="float:right;background-color:#383838;margin-right:30px;">';
                        echo "<div class='ui simple dropdown item' style='margin-right:30px;margin: 0px 10px;padding:10px;color:white;'>";
                            echo "<i class='inverted settings icon' ></i>";
                            echo "<a style='text-transform: lowercase;color:white;'>". $this->session->userdata('username')  . "</a>";
                            echo "<div class='menu'>";
                                echo "<a id='admin_menu' href='" . base_url() . "site/account/" . $this->session->userdata('username') . "' ><div class='item' style='font-size:15px;width:120px;'><i class='user icon'></i>Account</div></a>";
                                echo "<a id='admin_menu' href='" . base_url() . "site/logout' ><div class='item' style='font-size:15px;width:120px;'><i class='off icon'></i>Logout</div></a>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                }
                else{
                    echo "<a onclick='login_modal();'>";
                    echo "<div style='float:right;margin-right:40px;margin-left:0px;color:white;'>Login</div>";
                    echo "</a>";
                    echo "</nav>";
                    echo "<div style='float:right;margin:0px;padding:10px;' > ";
                    echo "<a style='color:white;font-size:20px;' >/</a>";
                    echo "</div>";

                    echo "<nav class='menu_ex'>";
                    echo "<a onclick='signup_modal();' >";
                    echo "<div style='float:right;margin-right:0px;color:white;'>Register</div>";
                    //href='" . base_url() . "site/signup'
                    echo "</a>";

                }
              echo "</nav>";
            ?>

    </div>


<!--   
    <div id="animation">
        <script>
        jQuery(document).ready(function ($) {
        var options = { $AutoPlay: true };
        var jssor_slider1 = new $JssorSlider$('slider1_container', options);
        });
        </script>
        <div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 400px; height: 150px;">
            <div u="slides" style="cursor: move; position: absolute; overflow: hidden; left: 0px; top: 0px; width: 400px; height: 150px;">
                <div><img class="rounded ui image" u="image" src="<?php echo base_url(); ?>resources/images/languages.jpg" /></div>
                <div><img class="rounded ui image" u="image" src="<?php echo base_url(); ?>resources/images/matrix.jpg" /></div>
                <div><img class="rounded ui image" u="image" src="<?php echo base_url(); ?>resources/images/onlinejudge_small.jpg" /></div>
            </div>
        </div>
    </div>-->


    <div style="margin:8px;margin-top:60px;position:relative;margin-bottom:60px;">

      <div class="ui divided grid" style="height:150px;">
        <div class="row">
          <div class="column">
          <!-- <a href="site/home"><img src="<?php echo base_url(); ?>resources/images/logo.png"></a> -->
          <canvas id="myCanvas" style='height:200px;width:400px;'></canvas>
          <script type="text/javascript" src="<?php echo base_url(); ?>/resources/script/alphabet.js"></script>
          <script type="text/javascript" src="<?php echo base_url(); ?>/resources/script/bubbles.js"></script>
          <script type="text/javascript" src="<?php echo base_url(); ?>/resources/script/main.js"></script>
          </div>
          <div class="column">
            <div id="sliderFrame">
              <div id="slider">
              <img src="<?php echo base_url(); ?>resources/images/linux.jpg" alt="COMPETITIVE PROGRAMMING" >
              <img src="<?php echo base_url(); ?>resources/images/android2.jpg" alt="ANDROID PROGRAMMING" >
              <img src="<?php echo base_url(); ?>resources/images/windows.jpg" alt="WINDOWS APP DEV">
              <img src="<?php echo base_url(); ?>resources/images/gp.jpg" alt="GAME DEVELOPMENT">
              <img src="<?php echo base_url(); ?>resources/images/hacking.jpg" alt="HACKING">
              </div>
            </div>
          </div>
        </div>
      </div>

      
        <?php 
        if(validation_errors()){
          echo "<div style='width:1000px;background-color:#CC6699; margin:20px 100px;text-align:center;border-radius:10px;font-size:17px;font-family:cursive;color:white;height:35px;'>";
          echo validation_errors();
          echo '</div>';
        }
       ?>
      
    </div>






    <div class="ui small modal" id="login_modal">
      <div class="ui two column middle aligned relaxed grid basic segment">
        <div class="column" >
          <form action ="<?php echo base_url(); ?>site/login_validation" id="login_form" method="post" name="login">
            <div class="ui teal inverted form segment">
              <div class="field">
                <div class="ui left labeled icon input" style="margin:20px 0px 10px 0px">
                  <input name="username" type="text" value="" placeholder="Username" id="login_username">
                  <i class="user icon"></i>
                  <div class="ui corner label">
                    <i class="asterisk icon"></i>
                  </div>
                </div>
              </div>
              <div class="field">
                <div class="ui left labeled icon input">
                  <input id="login_pass" name="password" value="" type="password" placeholder="Password" onfocus="username_check();">
                  <i class="lock icon"></i>
                  <div class="ui corner label">
                    <i class="asterisk icon"></i>
                  </div>
                </div>
              </div>
              <input type="button" onfocus="password_check();" onClick="submit_login()" id="login_button" value="Login" >
              <input type="submit" onClick="submit_login()" style="display:none;" >
              <p style="margin-top:20px;color:red;" onclick="forgot_modal();">Forgot Password </p>
            </div>
          </form>
        </div>
  
        <div class="column" style="height:280px; width:300px;">
          <div style="margin:40px 0px 24px 10px; height:40px;align:center;color:red;font-size:20px;">
              <p id="username_check"> </p>
          </div>
          <div style="height:40px;margin-left:10px;color:red;font-size:20px;">
              <p id="password_check" ></p>
          </div>
        </div>
      </div>
    </div>





      <div class="ui small modal" id="signup_modal">
        <div class="ui two column middle aligned relaxed grid basic segment">
          <div class="column" >
            <form id="signup_form" action="<?php echo base_url(); ?>site/signup_validation" method="post" name="signup_form"> 
              <div class="ui teal inverted form segment" >
                <div class="field">
                  <div class="ui left labeled icon input" style="margin:20px 0px px 0px">
                    <input type="text" name="username" placeholder="Username" id="sign_username">
                    <i class="user icon"></i>
                    <div class="ui corner label">
                      <i class="asterisk icon"></i>
                    </div>
                  </div>
                </div>

                <div class="field"  >
                  <div class="ui left labeled icon input"  >
                    <input type="text" name="email" placeholder="Email-id" onfocus="username_sign_check();" id="sign_email">
                    <i class="user icon"></i>
                    <div class="ui corner label">
                      <i class="asterisk icon"></i>
                    </div>
                  </div>
                </div>

                <div class="field">
                  <div class="ui left labeled icon input">
                    <input id="sign_password" type="password" name="password" placeholder="Password" onfocus="email_sign_check();password_len();" onkeydown="password_len();">
                    <i class="lock icon"></i>
                    <div class="ui corner label">
                      <i class="asterisk icon"></i>
                    </div>
                  </div>
                </div>

                <div class="field">
                  <div class="ui left labeled icon input">
                    <input type="password" id="sign_cppassword" name="cppassword" placeholder="Confirm Password" onkeyup="password_cpp_check();">
                    <i class="lock icon"></i>
                    <div class="ui corner label">
                      <i class="asterisk icon"></i>
                    </div>
                  </div>
                </div>

                <div class="ui selection dropdown" onclick="password_sign_check();">
                  <input id="sign_sec_que" type="hidden" name="security_ques">
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
                    <input id="sign_sec_ans" type="text" name="security_ans" placeholder="Security Ans">
                    <i class="user icon"></i>
                    <div class="ui corner label">
                      <i class="asterisk icon"></i>
                    </div>
                  </div>
                </div>
                
                <input type="submit" onClick="submit_signup()" style="display:none;" >
                <input type="button" onClick="submit_signup()" id="signup_button" value="Signup">
              </div>
            </form>
          </div>
          
          <div class="column" style="height:430px; width:400px;padding-top:0px;">
              <div style="margin:0px 10px 18px 10px; height:28px;align:center;color:red;font-size:20px;padding:5px;">
                  <p id="username_sign_check" style="margin:10px;margin-bottom:20px;"></p>
              </div>
              <div style="margin:10px 10px 24px 10px; height:28px;align:center;color:red;font-size:20px;padding:5px;">
                  <p id="email_sign_check" style="margin:10px;margin-bottom:20px;"></p>
              </div>
              <div style="height:40px;margin:40px 10px 0px 10px;color:red;font-size:20px;padding:5px;">
                  <p id="password_sign_check"  style="margin:10px;margin-bottom:20px;"></p>
              </div>
          </div>
        </div>

      </div>





    <div class="ui small modal" id="forgot_modal" style="width:400px;">
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