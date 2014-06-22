<script type="text/javascript">
    function deact_show(){
      $('#deact').modal('show');
    }
    function deactivate_account(){
      base="<?php echo base_url();?>site/acc_deactivate/";
      base=base.concat("<?php echo $this->session->userdata('username'); ?>");
      window.open(base,"_self");
    }
    function deact_hide(){
      $('#deact').modal('hide');
    }

    $(document).ready(function(){
      $('.ui.accordion').accordion(
      {
        exclusive : false,
        duration:1000,
      });
   

    $("#button1").click(function(){
      var name=$("#name_new").val();
      var email=$("#email_new").val();
      var about_me=$("#about_me_new").val();
      
      $("#name").html(name);
      $("#email").html(email);
      $("#about_me").html(about_me);
      
      $('#test')
          .modal('hide')
        ;

      $.post('../../Editaccount.php',{username:$("#username").html(),name:name,email:email,about_me:about_me,mode:"1",});

    });

    $("#button2").click(function()
    {
      var codechef=$("#codechef_new").val();
      var spoj=$("#spoj_new").val();
      var topcoder=$("#topcoder_new").val();
      var website=$("#website_new").val();
      
      $("#codrchef").html(codchef);
      $("#spoj").html(spoj);
      $("#topcoder").html(topcoder);
      $("#website").html(website);
      
      $('#test2').modal('hide');
      $.post('../../Editaccount.php',{username:$("#username").html(),codechef: codechef,spof:spoj,topcoder:topcoder,website:website ,mode:"2",});
     });

  });

   function test(){
      $("#name_new").val($("#name").text());
      $("#email_new").val($("#email").text());
      $("#about_me_new").val($("#about_me").text());
      $('#test').modal('show');
  }
         
  function test2(){
    $("#codechef_new").val($("#codechef").text());
    $("#spoj_new").val($("#spoj").text());
    $("#topcoder_new").val($("#topcoder").text());
    $("#website_new").val($("#website").text());
    $('#test2').modal('show');
   }
  function changephoto(){
    $("#change").modal('show');
  }


  function submitphoto(){
    $("#uploadphoto").submit();
  }
</script>
<!DOCTYPE html>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>resources/styles/stylesheet.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>resources/packaged/css/semantic.css">
    <script src="<?php echo base_url(); ?>resources/script/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>resources/script/tinymce.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>resources/packaged/javascript/semantic.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>resources/script/script.js"></script>
    <link href="../themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="../themes/1/js-image-slider.js" type="text/javascript"></script>
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
<body background="<?php echo base_url(); ?>resources/images/background.jpg"  bgproperties="fixed" style="margin:0px;padding-top:60px;">
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


<?php
$dbc=mysqli_connect('localhost','root','shubh','pclub_data')
          or die('Error connecting to MYSQL server.');
           $query="SELECT * FROM users WHERE username = '".$username ."'";
            $result=mysqli_query($dbc,$query);
            $put=mysqli_fetch_array($result);
if($put){
      if($put['activated']){
                    if($this->session->userdata('admin')){
                      $this->db->where("username",$put['username']);
                      $user = $this->db->get('users');
                      $row = $user->row();
                      if($row->admin){
                        echo '<div class="ui red submit button" style="float:right;margin-right:50px;"> <a href="' . base_url() .'site/rm_admin/'.$put['username'].'" style="text-decoration:none;text-transform:none;">Remove From Admin</a></div>';
                      }
                      else{
                        echo '<div class="ui green submit button" style="float:right;margin-right:50px;"> <a href="' . base_url() .'site/add_admin/'.$put['username'].'" style="text-decoration:none;text-transform:none;">Add as Admin</a></div>';
                      }
                    }
      echo ' <div class="ui two column page grid" style="padding:1px;">
        
        <div class="column"  style="height:200px;width:300px;">
          <div  style="border:solid green;height:200px;width:200px;margin:0px">
            <div class="ui masked move reveal">
              <div class="visible content"  style="height:200px;width:200px;">
          <img style="height:200px;width:200px;" src="';
          if($put['photo']==='default')
            echo '../../resources/images/default.jpg">';
          else 
            echo '../../file/image/'.$username .'" >';
        echo '</div>
        <div class="hidden content"  style="height:200px;width:200px;margin10px;">
          <div>
            <div style="display:block;color:blue;font-style:cursive;text-align:center">
              <br>
              <br>
              <br>
              <br>';
              if($this->session->userdata('username')==$put['username'] && $this->session->userdata('is_logged_in')){
                echo '<span id="changephoto"  style="cursor:pointer;" onClick="changephoto()">CHANGE PHOTO</span>';
              }
              if($put['photo']=='pic')
              {
                if($this->session->userdata('username')==$put['username'] && $this->session->userdata('is_logged_in')){
                  echo '<br><br><a href= '. base_url().'site/deletephoto/'.$username.' >SET AS DEFAULT</a>';
                }
              }
            echo '</div>
    `     </div>
        </div>
              </div>
            </div>
        </div>

        <div class="column" >
          <h1>
            <div style="display:block;color:red;font-style:cursive;word-spacing:5px;">
              <br>
              
                
              USERNAME : <span id="username">'.$put['username'].'</span>
            </div>
          </h1>
          <div style="width:500px;display:block;float:left;border: red"> 
      <div class="ui fluid accordion">
        <div class="active title">
          <i class="dropdown icon"></i>
         PERSONAL INFORMATION
        </div>
        
        <div class="active content" style="background-color:white">
         <p> NAME&nbsp:&nbsp&nbsp&nbsp<span id="name">'. $put['name'].'</span>
        <br></p>
         
         <p> EMAIL:&nbsp&nbsp&nbsp<span id="email">'.$put['email'].'</span>
          <br></p>
          
         <p> ABOUT:&nbsp&nbsp<span id="about_me">'.$put['about_me'].'</span>';
         if($this->session->userdata('username')==$put['username'] && $this->session->userdata('is_logged_in')){ 
          echo'<span class="EDIT" onclick="test()"><u>EDIT</u>
         </span>';
        }
         echo'<br></p>
        </div>
          
        <div id ="test" class="ui modal">
           <i class="close icon"></i>
              <div class="header">
                  EDIT PERSONAL INFORMATION
              </div>
              
              <div class="content">
                <div class="left">
                  <div class="ui fluid form segment">
                  
                     <div class="field">
                       <label>NAME</label>
                       <input id="name_new" name="name" value="aayush ojha" placeholder="Name" type="text">
                     </div>
                  
                      <div class="field">
                        <label>EMAIL</label>
                        <input id="email_new" name="email" value="aayushojha12@gmail.com" placeholder="Email" type="text">
                      </div>

                    <div class="field">
                      <label>ABOUT ME</label>
                      <input id="about_me_new" name="about_me" value="none" placeholder="about me" type="text">
                    </div>
                  </div>
          
            
                <div class="right">
                  <div id="button1" class="ui blue submit button">Submit
                  </div>
                </div>
           
              </div>
        </div>
          
          
      </div>

        <div class="title">
          <i class="dropdown icon"></i>
          OTHER ACCOUNTS
        </div>
        <div class="content" style="background-color:white">
         <p> CODECHEF:&nbsp&nbsp<span id="codechef">'.$put['codechef'].'</span><br></p>
         
         <p> SPOJ&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp<span id="spoj">'.$put['spoj'].'</span><br></p>
         
          <p>TOPCODER:&nbsp&nbsp<span id="topcoder">'. $put['topcoder'].'</span><br></p>
          
            OTHER&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp<span id="website">'.  $put['website'].'</span>';
            if($this->session->userdata('username')==$put['username'] && $this->session->userdata('is_logged_in')){
              echo '<span onClick="test2()" class="EDIT"><u>EDIT</u></span><br>';
            }
            echo '<div id ="test2" class="ui modal">
              <i class="close icon"></i>
                <div class="header">
                  EDIT PERSONAL INFORMATION
                </div>
              
                <div class="content">
                  <div class="left">
                    <div class="ui fluid form segment">
                    
                       <div class="field">
                         <label>CODECHEF</label>
                         <input id="codechef_new" name="codechef" value="" placeholder="codechef" type="text">
                       </div>
                    
                        <div class="field">
                          <label>SPOJ</label>
                          <input id="spoj_new"  name="spoj" value="" placeholder="spoj" type="text">
                        </div>

                      <div class="field">
                        <label>TOPCODER</label>
                        <input id="topcoder_new" name="topcoder" value="" placeholder="topcoder" type="text">
                      </div>

                      <div class="field">
                        <label>OTHER</label>
                        <input id="website_new" name="website" value="" placeholder="OTHER" type="text">
                      </div>
                    </div>
            
              
                  <div class="right">
                    <div id="button2" class="ui blue submit button">Submit
                    </div>
                  </div>
             
                </div>
              </div>
        </div>
      </div>
        <div class="title">
          <i class="dropdown icon"></i>
             OTHER INFORMATION
        </div>
        <div class="content" style="background-color:white">

       <p> ACCOUNT CREATED ON&nbsp:&nbsp'. $put['timestamp'].'<br></p>
      </div>
      </div>';
    
      echo '</div></div></div>';
      if($this->session->userdata('username')==$put['username'] && $this->session->userdata('is_logged_in')){
        echo'<div class="ui green submit button" style="float:left;margin-left:50px;text-transform:none;"onclick="old_password_modal();"> Change your Password</div><br><br><br>';
        echo'<div class="ui green submit button" style="float:left;margin-left:50px;text-transform:none;margin-bottom:50px;"onclick="deact_show();"> Deactivate your Account</div>';
      }
    }else{
            if($this->session->userdata('username')==$put['username'] && $this->session->userdata('is_logged_in')){
              echo '<p style="text-align:center;font-size:30px;color:red;">Your Account is deactivated </p><br><a href="' . base_url() .'site/acc_activate/'.$put['username'].'" style="text-decoration:none;"><div class="ui green submit button" style="float:left;margin-left:550px;text-transform:none;margin-bottom:50px;"> Activate your Account</div></a>';
            }
            else{
              echo"<div style='text-align:center'><h1>Sorry!!!!!!!!!!!</h1></div>";
              echo"<div class='ui red compact message' style='width:1000px; margin:20px 100px; text-align:center; '><p style='font-color:#8A2BE2;'>This account is deactivated</p></div>";

            }

          }



        }
else{
  echo"<div style='text-align:center'><h1>Sorry!!!!!!!!!!!</h1></div>";
            echo"<div class='ui red compact message' style='width:1000px; margin:20px 100px; text-align:center; '><p style='font-color:#8A2BE2;'>This user doesn't exist yet</p></div>";


}

echo '<div class="ui basic modal" id="deact">
  <i class="massive trash icon" style="margin-left:200px;float:left;"></i>
  <p style="font-family:cursive;margin-left:400px;">Are you sure you want to deactivate your account</p>
  <br><br><br><br><br>
  <form action="site/home_tab" method="post">
  <div class="ui buttons" style="margin-left:400px;float:left;">
  <div class="ui positive button" id="yes" onClick="deactivate_account()">Yes</div>
  <div class="or"></div>
  <div class="ui button" id="no" onClick="deact_hide()">No</div>
</div>
</form>
</div>';


?>
<div id ="change" class="ui small modal">
     <i class="close icon"></i>
        <div class="header">
           UPLOAD PHOTO
        </div>
        
        <div class="content">
           
          <?php echo'  <form id="uploadphoto" enctype="multipart/form-data" action="'.base_url().'site/upload_Photo/'.$username.'"';?> method="POST">
              
              CHOOSE PHOTO : <input id="fileID" type="file" name="file"> 
             <br>
              <div class="positive ui button" style="float:left;margin:20px;" onclick="submitphoto()">SUBMIT CHOSEN PHOTO</div>
            </form>
          </div>
  </div>



<div class="ui center aligned small modal" id="old_password_modal" style="width:400px;">
  <div class="ui teal inverted form segment">
      <div id="password_top">
        <form id="password_reset_new" method="post" action="<?php echo base_url();?>site/password_validation">
          <input type="hidden" name="username" value="<?php echo $this->session->userdata('username'); ?>" id="username1">
          <div class="field">
            <div class="ui left labeled icon input">
              <input type="password" name="old_password" placeholder="Old Password" id="old_password">
              <i class="lock icon"></i>
              <div class="ui corner label">
                <i class="asterisk icon"></i>
              </div>
            </div>
          </div>
          <input type="button" onClick="old_pass_check();" id="forgot_button" value="Continue">
        </form>
      </div>
    </div>
</div>