<?php 
	if(! $this->session->userdata("admin")){
		redirect ("site/home");
	}
?>

<div id="event" style="margin:40px">
	<a href="<?php echo base_url(); ?>site/admin_panel_tutorial" style="text-decoration:none; font-family:cursive;font-size:40px;margin:40px 20px;">Add Tutorial</a><br>
	<a href="<?php echo base_url(); ?>site/admin_panel_event" style="text-decoration:none;font-family:cursive;font-size:40px;margin:20px;">Add Event</a><br>
	<a href="<?php echo base_url(); ?>site/update_codechef_database" style="text-decoration:none;font-family:cursive;font-size:40px;margin:20px;">Update Codechef Data</a><br>
</div>



