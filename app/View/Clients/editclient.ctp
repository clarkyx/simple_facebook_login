<!DOCTYPE html>
<html>
<head>Add New Client</head>
<body>
	<?php
	echo $this->Form->create('Client');
	echo $this->Form->input('companyname');
	echo $this->Form->input('address');
	echo $this->Form->input('phone');
	echo $this->Form->end('Update');
	?>
</body>
</html>