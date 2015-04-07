<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<script type="text/javascript">
		$(document).ready(function(){

			$('#UserManager').change(function(){
				if($(this).is(':checked')){
					$('#UserReference').fadeIn();
				}else{
					$('#UserReference').fadeOut();
				}
			});
		});
		</script>
	</head>
	<body>
		<div class="users form">
			<?php echo $this->Form->create("User"); ?>
			<fieldset>
				<?php echo $this->Form->input('username');
				 	  echo $this->Form->input('password');
				 	  echo $this->Form->input('manager', array('type'=>'checkbox', 'checked' => true));
				 	  echo $this->Form->input('reference');
				?>
			</fieldset>
			<script>
			<?php echo $this->Form->end(__('Register')); ?>
		</div>
	</body>
</html>
