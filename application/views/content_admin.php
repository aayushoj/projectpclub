<?php 
	if(! $this->session->userdata("admin")){
		redirect ("site/home");
	}
?>
<script>
  function submitform()
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
	<h1 style="text-align:center; color:#BA55D3;font-family:cursive;">Add Event</h1>
	<form  action ="<?php echo base_url(); ?>site/add_event" id="add_event" method="post">
		<div class="ui form">
			<div class="field">
				<?php echo validation_errors(); ?>
				<div style="margin:20px;">
				    <font style="font-size:20px;font-family:cursive;">Heading</font>
				    <input type="text" name="name" style="width:600px; margin-left:100px;">
				</div>
			    <div style="margin:20px;">
				    <font style="font-size:20px;font-family:cursive;">Venue</font>
				    <input type="text" name="venue"style="width:600px; margin-left:120px;">
				</div>
				<div style="margin:20px;">
				    <font style="font-size:20px;font-family:cursive;">Date and Time</font>
				    <input type="text" name="date"style="width:250px; margin:0px 50px; margin-left:42px;" placeholder="YYYY-MM-DD">
				    <input type="text" name="time"style="width:250px; margin:0px 50px;" placeholder="hh:mm:ss">
				</div>
			    <div style="margin:20px;">
				    <font style="font-size:20px;font-family:cursive;" >About</font>
				    <input type="text" name="about" style="height: 100px; width:600px; margin-left:120px;">
				</div>
	    		<div class="ui purple submit button" onClick="submitform()"style="margin-left:300px;margin-top:30px;">Add Event</div>
	    	</div>
		</div>
	</form>
</div>



