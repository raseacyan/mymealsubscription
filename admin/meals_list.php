<?php
include('../inc/connect.php');
include('../inc/functions.php');

$meals = getMeals($conn);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Demo</title>
</head>
<body>
	<?php include('inc/nav.php'); ?>

	<?php if($meals): ?>
		<table cellpadding="10" cellspacing="10">
			<tr>
				<th>Name</th>
				<th>Category</th>
			</tr>
			<?php foreach($meals as $meal): ?>
			<tr>
				<td><?php echo $meal['name']; ?></td>
				<td><?php echo getCategoryName($meal['category_id'], $conn); ?></td>
			</tr>			
			<?php endforeach; ?>		
		</table>
	<?php else: ?>	
		<p>No Records</p>
	<?php endif; ?>

		
</body>
</html>