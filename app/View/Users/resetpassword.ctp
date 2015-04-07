<!DOCTYPE html>
<html>
	<head>
		<meta content="utf-8" http-equiv="encoding">
		<title>ResetPassword</title>
	</head>
	<body>
		<fieldset>
			<?php echo __('Please enter your username and email'); ?>
			<?php echo $this->Form->input('username'); ?>
			<?php echo $this->Form->input('email'); ?>
		</fieldset>
		<?php echo $this->Form->end(__('reset')); ?>
	</body>
</html>
