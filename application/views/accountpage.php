<?php
 $dbc=mysqli_connect('localhost','root','shubh','pclub_data')
          or die('Error connecting to MYSQL server.');
           $query="SELECT * FROM users WHERE username = '".$username ."'";
            $result=mysqli_query($dbc,$query);
            $put=mysqli_fetch_array($result);
            if($put){

                //print_r($put);

                  
                echo '<script>
                  function loadXMLDoc(){
                    var xmlhttp;
                    if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
                      xmlhttp=new XMLHttpRequest();
                    }
                    else{// code for IE6, IE5
                      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange=function(){
                      if (xmlhttp.readyState==4 && xmlhttp.status==200){
                        document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
                      }
                    }
                    var username = document.getElementById("username").value;
                    var querystring="?username=" + username;
                    xmlhttp.open("GET","'. base_url() . 'Editaccount.php"+querystring,true);
                    xmlhttp.send();
                  }

                  function loadXMLDocs(){
                    var xmlhttp;
                    if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
                      xmlhttp=new XMLHttpRequest();
                    }
                    else{// code for IE6, IE5
                      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange=function(){
                      if (xmlhttp.readyState==4 && xmlhttp.status==200){
                        document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
                      }
                    }

                    xmlhttp.open("POST","'. base_url() . 'account.php",true);
                    xmlhttp.send();
                  }


                function submitform()
                {
                  document.getElementById("updatedb").submit();
                }
                function update(){
                  $.post("'. base_url() . 'updateaccount.php", {username:"'. $this->session->userdata('username') .'", name: edit_account.name.value, email: edit_account.email.value, about_me: edit_account.about_me.value},function(output){
                      $("#myDiv").html(output).show();
                  });
                }


                </script>

            <div style="float:right;">';
            if($put['activated']){
              if($this->session->userdata('admin')){
                $this->db->where("username",$put['username']);
                $user = $this->db->get('users');
                $row = $user->row();
                if($row->admin){
                  echo '<div class="ui green submit button" style="float:right;"> <a href="' . base_url() .'site/rm_admin/'.$put['username'].'" style="text-decoration:none;">Remove From Admin</a></div>';
                }
                else{
                  echo '<div class="ui green submit button" style="float:right;"> <a href="' . base_url() .'site/add_admin/'.$put['username'].'" style="text-decoration:none;">Add as Admin</a></div>';
                }
              }


                  echo '</div><div style = "width:30em;padding:0em 30em">
                      <div id="myDiv" >
                      <div class="ui inverted form segment">
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
                          </div>';
                          if($this->session->userdata('username')==$put['username'] && $this->session->userdata('is_logged_in')){
                            echo'<div class="ui button" onClick="loadXMLDoc()">
                            EDIT
                            </div>
                            <div class="ui green submit button" style="float:right;"> <a href="' . base_url() .'site/acc_deactivate/'.$put['username'].'" style="text-decoration:none;">Deactivate your Account</a></div>';
                          }
                          
                      echo '</div>
              </div>';
              
            }
            else{
              if($this->session->userdata('username')==$put['username'] && $this->session->userdata('is_logged_in')){
                echo '<div class="ui green submit button" style=""> <a href="' . base_url() .'site/acc_activate/'.$put['username'].'" style="text-decoration:none;">Activate your Account</a></div>';
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
?>