<?php
session_start();
include('inc/connect.php');
include('inc/functions.php');

if(isset($_SESSION['user_id'])){
	print_r($_SESSION['user_name']);
}else{
	header('location:login.php');
}

$subscription = getSubscriptionById($_GET['id'], $conn);

$meal_options = getMealOptionsBySubscriptionId($_GET['id'], $conn);

?>

<!DOCTYE html>
<html>
<head>
	<title>Demo</title>
</head>
<body>
	<?php include('inc/nav.php'); ?>
	
    <?php if($subscription): ?>
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
			
			<tr>
				<td><?php echo $subscription['start_date']; ?></td>
                <td><?php echo $subscription['end_date']; ?></td>
                <td><?php echo $subscription['meal_number']; ?></td>
                <td><?php echo $subscription['add_rice']; ?></td>
                <td><?php echo $subscription['note']; ?></td>
                <td><?php echo $subscription['subscription_total']; ?></td>
                <td>
                    <a href="addmeal.php?sid=<?php echo $subscription['id']; ?>">Add Meal</a>
                </td>
                

			</tr>
				
		</table>
	<?php else: ?>	
		<p>No Records</p>
	<?php endif; ?>


    <h3>My Selection</h3>
    <?php if($meal_options): ?>
		<table border="1" cellpadding="10" cellspacing="1">
			<tr>
				<th>Date</th>
                <th>Meat 1</th>
                <th>Vege 1</th>
                <th>Meat 2</th>
                <th>Vege 2</th>
			</tr>
			<?php foreach($meal_options as $meal_option): ?>
			<tr>
				<td><?php echo $meal_option['date']; ?></td>
                <td><?php echo $meal_option['meat_1']; ?></td>
                <td><?php echo $meal_option['vege_1']; ?></td>
                <td><?php echo $meal_option['meat_2']; ?></td>
                <td><?php echo $meal_option['vege_2']; ?></td>
			</tr>
			<?php endforeach; ?>		
		</table>
	<?php else: ?>	
		<p>No Records</p>
	<?php endif; ?>


</body>
</html>