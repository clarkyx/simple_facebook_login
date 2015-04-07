<!--Login Page-->
<!--ResetPassword not fully functional-->

<!DOCTYPE html>
<html>
	<head>
		<meta content="utf-8" http-equiv="encoding">
		<title>Login</title>
	</head>
	<body>
		<div class = "users form">
			<?php echo $this->Form->create('User'); ?>
			<fieldset>
				<?php echo __('Please enter your username and password'); ?>
				<?php echo $this->Form->input('username'); ?>
				<?php echo $this->Form->input('password'); ?>
			</fieldset>
			<?php echo $this->Form->end(__('Login')); ?>
			<?php echo $this->Html->link('register', array('controller'=>'users', 'action'=>'register')) . '  |  '; ?>
			<?php echo $this->Html->link('forgotPassword', array('controller'=>'users', 'action'=>'resetpassword')); 
	 	?>
		</div>
	</body>
</html>
