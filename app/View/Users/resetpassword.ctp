<!DOCTYPE html>
<html>
	<head>
		<meta content="utf-8" http-equiv="encoding">
		<title>ResetPassword</title>
	</head>
	<body>
		<div class = "users form">
			<?php echo $this->Form->create('User'); ?>
			<fieldset>
				<?php echo __('Please enter your username and email'); ?>
				<?php echo $this->Form->input('username'); ?>
				<?php echo $this->Form->input('email'); ?>
			</fieldset>
			<?php echo $this->Form->end(__('reset')); ?>
		</div>
	</body>
</html>
