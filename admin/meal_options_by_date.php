<?php
include('../inc/connect.php');
include('../inc/functions.php');


$date = (isset($_GET['date']))? $_GET['date'] :date("Y-m-d");


$meal_options = getMealOptionsByDate($date, $conn);




?>
<!DOCTYPE html>
<html>
<head>
	<title>Demo</title>
</head>
<body>
	<?php include('inc/nav.php'); ?>

    <form action="meal_options_by_date.php" method="get">
        <input type="date" name="date" value="<?php echo $date; ?>"/>
        <input type="submit" name="submit" value="submit"/>
    </form>

	<?php if($meal_options): ?>
		<table border="1" cellpadding="10" cellspacing="1">
			<tr>
				<th>Date</th>
                <th>Meat 1</th>
                <th>Vege 1</th>
                <th>Meat 2</th>
                <th>Vege 2</th>
                <th>Customer</th>
             
			</tr>
			<?php foreach($meal_options as $meal_option): ?>
			<tr>
				<td><?php echo $meal_option['date']; ?></td>
                <td><?php echo $meal_option['meat_1']; ?></td>
                <td><?php echo $meal_option['vege_1']; ?></td>
                <td><?php echo $meal_option['meat_2']; ?></td>
                <td><?php echo $meal_option['vege_2']; ?></td>
                <td><?php echo $meal_option['name']; ?></td>
               
			</tr>
			<?php endforeach; ?>		
		</table>
	<?php else: ?>	
		<p>No Records</p>
	<?php endif; ?>

		
</body>
</html>