<?php

include('../inc/connect.php');
include('../inc/functions.php');

$subscriptions = getSubscriptions($conn);



?>

<!DOCTYPE html>
<html>
<head>
	<title>Demo</title>
</head>
<body>
	<?php include('inc/nav.php'); ?>


			
			<?php if($subscriptions): ?>
				<table border="1" cellpadding="10" cellspacing="1">
					<tr>
						<th>Start Date</th>                
		                <th>End Date</th>
		                <th>Meal Number</th>
		                <th>Add Rice</th>
		                <th>Note</th>
		                <th>Subscription Total</th>
		                <th>Customer Id</th>
					</tr>
					<?php foreach($subscriptions as $subscription): ?>
					<tr>
						<td><?php echo $subscription['start_date']; ?></td>
						<td><?php echo $subscription['end_date']; ?></td>
						<td><?php echo $subscription['meal_number']; ?></td>
						<td><?php echo $subscription['add_rice']; ?></td>
						<td><?php echo $subscription['note']; ?></td>
						<td><?php echo $subscription['subscription_total']; ?></td>
						<td><?php echo $subscription['name']; ?></td>
					</tr>
					<?php endforeach; ?>		
				</table>
			<?php else: ?>	
				<p>No Records</p>
			<?php endif; ?>
			

<?php $conn->close();?>

		
</body>
</html>