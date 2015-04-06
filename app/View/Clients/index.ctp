<!DOCTYPE html>
<html>
	<head>
		<title>clients information</title>
	</head>
	<body>
		<table>
			<tr>
				<th>CompanyName</th>
				<th>Address</th>
				<th>Phone</th>
			</tr>


			<?php foreach ($clients as $client): ?>
			<tr>
				<td><?php echo $client['Client']['id']; ?></td>
				<td><?php echo $client['Client']['companyname']; ?></td>
				<td><?php echo $client['Client']['address']; ?></td>
				<td><?php echo $client['Client']['phone']; ?></td>
			</tr>
		<?php endforeach; ?>
		<?php unset($client); ?>
		</table>
		<?php
		echo $this->Html->link('Add New Client', array('controller'=>'clients','action'=>'newclient'));
	 	?>
	</body>
</html>
