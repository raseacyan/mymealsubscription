<?php
session_start();
include('inc/connect.php');
include('inc/functions.php');

if(isset($_SESSION['user_id'])){
	print_r($_SESSION['user_name']);
}

//get categories
$categories = getCategories($conn);
$conn->close();



if(isset($_POST['subscribe'])){
	
	//senitize incoming data

	$_SESSION['subscription'] = array();

	$_SESSION['subscription']['start_date'] = htmlentities(trim($_POST['start_date']));
	$duration = htmlentities(trim($_POST['duration']));
	$_SESSION['subscription']['end_date'] = date('Y-m-d', strtotime($_SESSION['subscription']['start_date']. "+ {$duration} days"));
	$_SESSION['subscription']['meal_number'] = htmlentities(trim($_POST['meal_number']));
	$_SESSION['subscription']['add_rice'] = htmlentities(trim($_POST['add_rice']));
	$_SESSION['subscription']['note'] = htmlentities(trim($_POST['note']));
	

	$subscription_total = 80000;
	if($_SESSION['subscription']['add_rice'] == 'yes'){
		$subscription_total += 2000;
	}
	if($_SESSION['subscription']['meal_number'] == 2){
		$subscription_total *= 2 ;
	}

	$_SESSION['subscription']['subscription_total'] = $subscription_total;

	header('location:subscribe_confirm.php');

	
}





?>
<!DOCTYE html>
<html>
<head>
	<title>Demo</title>
</head>
<body>
	<?php include('inc/nav.php'); ?>

	<p>Today is: <?php echo  date("d/m/Y"); ?></p>

	<form action="subscribe.php" method="post">
		<label for="name">Start Date</label><br>
		<input type="date" name="start_date"  required /><br>

		<label for="duration">Meal Plan</label><br>
		<select name="duration">
			<option value="30" selected>30 days</option>
			<option value="60">60 days</option>
		</select>
		<br>

		<label>Number of Meals?</label><br>
		<input type="radio"  name="meal_number" value="1">
		<label for="1">1</label><br>
		<input type="radio" id="css" name="meal_number" value="2">
		<label for="2">2</label><br>

		<label>Add Rice?</label><br>
		<input type="radio"  name="add_rice" value="yes">
		<label for="yes">Yes</label><br>
		<input type="radio" id="css" name="add_rice" value="no">
		<label for="no">No</label><br>

		<label for="note">Additional Note</label><br>
		<textarea name="note"></textarea>

		
		<br>


		
		<br><br>
		<input type="submit" name="subscribe" value="submit"/>
	</form>

</body>
</html>