<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="resources/script/jquery.js"></script>
		<style type="text/stylesheet">

		</style>
		<script type="text/javascript">
			$(document).ready(function(){

				$('#username').keyup(function(){
					$.post('check.php',{ username : form.username.value },
					function(result){
						$('#feedback').html(result).show();
					});
				});
			});
		</script>

	</head>
	<body>

		<form id="form">
		Username:  <input type="text" id="username" name="username">
		
			<div id="feedback">
				In here
			</div>

		</form>

	</body>
</html>