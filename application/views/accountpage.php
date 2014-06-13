<?php
  $dbc=mysqli_connect('localhost','root','shubh','pclub_data')
    or die('Error connecting to MYSQL server.');
  $query="SELECT * FROM users WHERE username = '".$username ."'";
  $result=mysqli_query($dbc,$query);
  $put=mysqli_fetch_array($result);

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
      xmlhttp.open("POST","'. base_url() . 'Editaccount.php",true);
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
  </script>

  <div style = "width:30em;padding:0em 30em">
    <div id="myDiv" >
      <div class="ui inverted form segment">
        <div class="field">
          <label style="color:blue;font-family:cursive; ">Name</label>
          <input value='.$put['name'].' readonly="readonly" type="text">
        </div>

        <div class="field">
          <label>EMAIL</label>
          <input value='.$put['email'].' readonly="readonly" type="text">
        </div>

        <div class="field">
          <label>CODECHEF HANDLE</label>
          <input value='.$put['codchef'].' readonly="readonly" type="text">
        </div>
        <div class="field">
          <label>SPOJ HANDLE</label>
          <input value='.$put['spoj'].' readonly="readonly" type="text">
        </div>
        <div class="field">
          <label>TOPCODER HANDLE</label>
          <input value='.$put['topcoder'].' readonly="readonly" type="text">
        </div>
      </div>
      <div class="ui button" onClick="loadXMLDoc()">
        EDIT
      </div>
    </div>
  </div>';
?>