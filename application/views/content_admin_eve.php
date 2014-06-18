<?php 
	if(! $this->session->userdata("admin")){
		redirect ("site/home");
	}
?>
<script>
  function submit_event()
  {
    document.getElementById("add_event").submit();
  }
</script>

<?php
	if($add_event==''){
		;
	}
	else{
		$a="<div class='ui red compact message' style='width:1000px; margin:20px 100px; text-align:center; '><p style='font-color:#8A2BE2;'>";
		if($add_event){
			$a .= 'The event has been added';
		}
		else{
			$a .= 'The event adding failed';
		}
		$a .= '</p></div>';
		echo $a;
	}
?>

<div id="event" style="margin:40px">
	<h1 style="color:#BA55D3;font-family:cursive;">	<a href="<?php echo base_url(); ?>site/admin_panel" style="text-decoration:none;">Add Event</a></h1>
	<form  action ="<?php echo base_url(); ?>site/add_event" id="add_event" method="post">
		<div class="ui form">
			<div class="field">
				<?php echo validation_errors(); ?>
				<div style="margin:20px;">
				    <font style="font-size:20px;font-family:cursive;">Heading :</font>
				    <input type="text" name="name" style="width:600px; margin-left:100px;">
				</div>
			    <div style="margin:20px;">
				    <font style="font-size:20px;font-family:cursive;">Venue :</font>
				    <input type="text" name="venue"style="width:600px; margin-left:120px;">
				</div>
				<div style="margin:20px;">
				    <font style="font-size:20px;font-family:cursive;">Date and Time :</font>
				    <input type="text" name="date"style="width:250px; margin:0px 50px; margin-left:42px;" placeholder="YYYY-MM-DD">
				    <input type="text" name="time"style="width:250px; margin:0px 50px;" placeholder="hh:mm:ss">
				</div>
	    	</div>
		</div>
		<div style="margin-left:20px;">
			<p style="font-size:20px;font-family:cursive;margin:50px 0px; width:100px;float:left;" >About:</p>
			<br>
			<div style="margin-top:80px;">
				<textarea name="comment"></textarea>
			</div>
		</div>
	    <div class="ui purple submit button" style="margin-left:300px;margin-top:30px;" onClick="submit_event()">Add Event</div>
	</form>
</div>



