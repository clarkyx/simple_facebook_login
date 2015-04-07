<!--Client Information View for Manager-->
<!DOCTYPE html>
<meta content="utf-8" http-equiv="encoding">
<html>
	<head>
		<title>clients information</title>
	</head>
	<body>
		<table>
			<tr>
				<th>Id</th>
				<th>CompanyName</th>
				<th>Address</th>
				<th>Phone</th>
				<!--Manager can perform actions on client-->
				<th>Actions</th>
			</tr>


			<?php foreach ($clients as $client): ?>
			<tr>
				<td><?php echo $client['Client']['id']; ?></td>
				<td><?php echo $client['Client']['companyname']; ?></td>
				<td><?php echo $client['Client']['address']; ?></td>
				<td><?php echo $client['Client']['phone']; ?></td>
				<td><?php echo $this->Form->postLink(
                    	'Delete Client',
                   	 	array('action'=>'deleteclient', $client['Client']['id']),
                    	array('confirm' => (__(
                    		'Delete client %s ?', $client['Client']['companyname'])))
					); ?>
					<?php echo str_repeat('&nbsp;', 3); ?>
					<?php echo $this->Html->link(
						'Edit Client',
						array('action'=>'editclient', $client['Client']['id'])
					); ?>
				</td>	
			</tr>
		<?php endforeach; ?>
		</table>
		<?php
		echo $this->Html->link('Add New Client', array('controller'=>'clients','action'=>'newclient'));
	 	?>
	 	<?php echo $this->Html->link('logout', array('controller'=>'users', 'action'=>'logout')); 
	 	?>
	</body>
</html>
