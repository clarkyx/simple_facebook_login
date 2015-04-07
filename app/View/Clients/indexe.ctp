<!--Client Information View for Employee-->
<!DOCTYPE html>
<meta content="utf-8" http-equiv="encoding">
<html>
	<head>
		<title>clients information</title>
	</head>
	<body>
		<table>
			<!--Employee can only view client information-->
			<tr>
				<th>Id</th>
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
		</table>
	 	<?php echo $this->Html->link('logout', array('controller'=>'users', 'action'=>'logout')); 
	 	?>
	</body>
</html>