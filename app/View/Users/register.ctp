<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<script type="text/javascript">
		$(document).ready(function(){
			$('#manager').change(function(){
				if($(this).is(':checked')){
					$('#ReferenceCode').fadeIn();
				}
			});
		});
		</script>
	</head>
	<body>
		<div class="users form">
			<fieldset>
				<legend><?php echo __('Register'); ?><legend>
				<?php echo $this->Form->create("User"); ?>
				<?php echo $this->Form->input('username');
				 	  echo $this->Form->input('password');
				 	  echo $this->Form->checkbox('manager');
				 	  echo $this->Form->input('ReferenceCode', array('hiddenField'=>True));
				 	  );
				?>
			</fieldset>
			<?php echo $this->Form->end(__('Register')); ?>
		</div>
	</body>
</html>
