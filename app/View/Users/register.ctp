<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<script type="text/javascript">
		$(document).ready(function(){
			$('#Usermanager').change(function(){
				if($(this).is(':checked')){
					$('#UserReferenceCode').fadeIn();
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
				 	  echo $this->Form->input('manager',array('type'=>'checkbox'));
				 	  echo $this->Form->input('ReferenceCode', array('type'=>'hidden'));
				?>
			</fieldset>
			<?php echo $this->Form->end(__('Register')); ?>
		</div>
	</body>
</html>
