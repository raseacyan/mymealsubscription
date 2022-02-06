<?php
session_start();
include('inc/connect.php');
include('inc/functions.php');

if(isset($_SESSION['user_id'])){
	print_r($_SESSION['user_name']);
}else{
	header('location:login.php');
}

$subscriptions = getSubscriptionByUserId($_SESSION['user_id'], $conn);
?>

<!DOCTYE html>
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
                <th>Number of Meals</th>
                <th>Add Rice</th>
                <th>Note</th>
                <th>Total</th>
                <th>Action</th>
			</tr>
			<?php foreach($subscriptions as $subscription): ?>
			<tr>
				<td><?php echo $subscription['start_date']; ?></td>
                <td><?php echo $subscription['end_date']; ?></td>
                <td><?php echo $subscription['meal_number']; ?></td>
                <td><?php echo $subscription['add_rice']; ?></td>
                <td><?php echo $subscription['note']; ?></td>
                <td><?php echo $subscription['subscription_total']; ?></td>
                <td>
                    <a href="mysubscriptions_single.php?id=<?php echo $subscription['id']; ?>">View</a>
                </td>

			</tr>
			<?php endforeach; ?>		
		</table>
	<?php else: ?>	
		<p>No Records</p>
	<?php endif; ?>


</body>
</html>