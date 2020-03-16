<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>List</title>
</head>
<body>
	<table>
		<h1>LIST</h1>		
		<form action="" method="POST">
			<input type="text" name="search_value" id="input"  placeholder="Nhap tu tim kiem!">
			<button name="action" value="search_customer" type="submit" id="button">Search</button>
		</form>
		<tr>
			<th>customerID</th>
			<th>emailAddress</th>
			<th>Name</th>
			<th>Password</th>
			<th>Phone</th>
		</tr>
		<?php  
			foreach ($list_cus as $key => $value):		
		?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value->get_emailAddress(); ?></td>
			<td><?php echo $value->get_Name(); ?></td>
			<td><?php echo $value->get_Password(); ?></td>
			<td><?php echo $value->get_Phone(); ?></td>
			<td><a href="?action=delete&id=<?php echo $key; ?>">Delete</a></td>
		</tr>
		<?php  
			endforeach;		
		?>
		<tr>
			<td><a href="?action=add">Add</a></td>
		</tr>
	</table>
</body>
</html>