<!DOCTYPE html>
<html>
<head>Add New Client</head>
<body>
	<?php
	echo $this->Form->create('Client');
	echo $this->Form->input('companyname');
	echo $this->Form->input('address');
	echo $this->Form->input('phone');
	echo $this->Form->end('Save');
	?>
	<?php
	echo $this->Html->link('Add New Client', array('controller'=>'clients','action'=>'newclient'));
	 ?>
</body>
</html>