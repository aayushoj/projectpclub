<?php
  if($add_project==''){
    ;
  }
  else{
    $a="<div class='ui red compact message' style='width:1000px; margin:20px 100px; text-align:center; '><p style='font-color:#8A2BE2;'>";
    if($add_project){
      $a .= 'The Project has been added';
    }
    else{
      $a .= 'Project adding failed';
    }
    $a .= '</p></div>';
    echo $a;
  }
?>

<script type="text/javascript">
  function submituplo()
  {
    document.getElementById("prosubmit").submit();
  }
</script>

<h1 style="font-family:cursive; margin-left:100px;margin-top:50px;">Add Project</h1>
<form id="prosubmit" enctype="multipart/form-data" action="<?php echo base_url(); ?>site/pro_add" method="POST">
  <h2 style="font-family:cursive;  margin-left:100px; margin-top:40px;">Title:</h2>
  <div class="ui fluid icon input">
      <div style="margin-top:0px;margin-left:80px; margin-right:80px;">
        <input type="text" name="title" placeholder="Topic of Tutorial">
      </div>
  </div>
	<?php echo validation_errors(); ?>
  <h2 style="font-family:cursive;  margin-left:100px; margin-top:40px;">Description:</h2>
  <div style='margin-left:90px;'>
    <textarea id="tutbody" rows="8" cols="145" name="description" >
    </textarea>
  </div>

  <h2 style="font-family:cursive;  margin-left:100px; margin-top:40px;">Wiki Link:</h2>
  <div class="ui fluid icon input">
      <div style="margin-top:0px;margin-left:80px; margin-right:80px;">
        <input type="text" name="wiki" placeholder="Wiki Link if any">
      </div>
  </div>

  <h2 style="font-family:cursive;  margin-left:100px; margin-top:40px;">Github Link:</h2>
  <div class="ui fluid icon input">
      <div style="margin-top:0px;margin-left:80px; margin-right:80px;">
        <input type="text" name="github" placeholder="Github Link if any">
      </div>
  </div>
  <h2 style="font-family:cursive;  margin-left:100px; margin-top:40px;">Members:</h2>
  <div class="ui fluid icon input">
      <div style="margin-top:0px;margin-left:80px; margin-right:80px;">
        <input type="text" name="members" placeholder="Members: iitk email id">
      </div>
  </div>
  <div class="ui form">
    <div class="grouped inline fields">
      <div class="field">
        <div class="ui radio checkbox" style="margin-left:100px;margin-top:20px;">
          <input type="radio" name="project_status" checked="checked" value="Ongoing">
          <label style="font-family:cursive;">Ongoing</label>
        </div>
      </div>
      <div class="field">
        <div class="ui radio checkbox" style="margin-left:100px;">
          <input type="radio" name="project_status" value="Completed">
          <label style="font-family:cursive;">Completed</label>
        </div>
      </div>
     </div>
    </div>
  <input type="file" id="fileID" name="file"  style="margin-left:800px;margin-top:30px;"/> 
  <div   class="positive ui button" style="margin-left:800px;margin-top:0px;" onclick="submituplo()">UPLOAD</div>
  <br>
  <div   class="positive ui button" style="margin-left:80px;margin-top:0px;" onclick="submituplo()">SAVE</div>
</form>

