<script>
  function submit_tutorial()
  {
    document.getElementById("uploadsubmit").submit();
  }
</script>
<?php
	if($add_tutorial==''){
		;
	}
	else{
		$a="<div class='ui red compact message' style='width:1000px; margin:20px 100px; text-align:center; '><p style='font-color:#8A2BE2;'>";
		if($add_tutorial){
			$a .= 'The Tutorial has been added';
		}
		else{
			$a .= 'Tutorial adding failed';
		}
		$a .= '</p></div>';
		echo $a;
	}
?>
<div style="margin:40px">
	<h1 style="color:#BA55D3;font-family:cursive;">	<a href="<?php echo base_url(); ?>site/admin_panel_tutorial" style="text-decoration:none;margin-left:30px;">Add Tutorial</a></h1>
	<form id="uploadsubmit" enctype="multipart/form-data" action="<?php echo base_url(); ?>site/upload_file" method="POST">
	<h2 style="font-family:cursive;  margin-left:60px; margin-top:40px;">Title</h2>
	<div class="ui fluid icon input">
		<div style="margin-top:0px;margin-left:40px; margin-right:80px;">
		  <input type="text" name="title" placeholder="Topic of Tutorial">
		</div>
	</div>
	<h2 style="font-family:cursive;  margin-left:60px; margin-top:40px;">Body</h2>
	<div style="margin-left:50px;">
	<textarea name="comment">
	</textarea>
	</div>
	  <!--  <div id ="chouter" class="positive ui button" style="margin-left:800px;margin-top:30px; width:170px;" onclick="document.getElementById('fileID').click(); return false;"></div>-->

	<input type="file" id="fileID" name="file"  style="margin-left:700px;margin-top:30px;"/> 
	<div class="positive ui button" style="margin-left:700px;margin-top:0px;" onclick="submit_tutorial()">UPLOAD</div><br>
	<input type="button" onClick="submit_tutorial()" id="signup_button" value="Add" style="margin-left:50px;">
	</form>
</div>