<?php
include('../inc/connect.php');
include('../inc/functions.php');


$categories = getCategories($conn);




?>
<!DOCTYPE html>
<html>
<head>
	<title>Demo</title>
</head>
<body>
	<?php include('inc/nav.php'); ?>

	<?php if($categories): ?>
		<table>
			<tr>
				<th>Name</th>
			</tr>
			<?php foreach($categories as $category): ?>
			<tr>
				<td><?php echo $category['name']; ?></td>
			</tr>
			<?php endforeach; ?>		
		</table>
	<?php else: ?>	
		<p>No Records</p>
	<?php endif; ?>

		
</body>
</html>