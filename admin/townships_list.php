<?php
include('../inc/connect.php');
include('../inc/functions.php');


$townships = getTownships($conn);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Demo</title>
</head>
<body>
	<?php include('inc/nav.php'); ?>

	<?php if($townships): ?>
		<table>
			<tr>
				<th>Name</th>
			</tr>
			<?php foreach($townships as $township): ?>
			<tr>
				<td><?php echo $township['name']; ?></td>
			</tr>
			<?php endforeach; ?>		
		</table>
	<?php else: ?>	
		<p>No Records</p>
	<?php endif; ?>

		
</body>
</html>