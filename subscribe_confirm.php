<?php
session_start();
include('inc/connect.php');
include('inc/functions.php');

if(isset($_SESSION['user_id'])){
	print_r($_SESSION['user_name']);
}else{
	header('location:login.php');
}


if(isset($_SESSION['subscription'])){	
	$start_date = $_SESSION['subscription']['start_date'];
	$end_date= $_SESSION['subscription']['end_date'];
	$meal_number = $_SESSION['subscription']['meal_number'];
	$add_rice = $_SESSION['subscription']['add_rice'];
	$note = $_SESSION['subscription']['note'];
	$subscription_total = $_SESSION['subscription']['subscription_total'];
}else{
	header('location:subscribe.php');
}

if(isset($_POST['edit-subscription'])){
	header('location:subscribe.php');
}


if(isset($_POST['confirm-subscription'])){
	$start_date = $conn->real_escape_string(trim($_POST['start_date']));
	$end_date = $conn->real_escape_string(trim($_POST['end_date']));	
	$meal_number = $conn->real_escape_string(trim($_POST['meal_number']));	
	$add_rice = $conn->real_escape_string(trim($_POST['add_rice']));	
	$note = $conn->real_escape_string(trim($_POST['note']));
	$subscription_total = $conn->real_escape_string(trim($_POST['subscription_total']));
	$customer_id = $_SESSION['user_id'];

	//save to database
	$sql = "INSERT INTO subscriptions (start_date, end_date, meal_number, add_rice, note, subscription_total, customer_id) 
	VALUES ('{$start_date}', '{$end_date}', '{$meal_number}', '{$add_rice}', '{$note}', '{$subscription_total}', '{$customer_id}')";

	if ($conn->query($sql) === TRUE) {
	  header('Location:mysubscriptions.php');
	} else {
	  echo "Error: ".$conn->error;
	}


}


?>

<!DOCTYE html>
<html>
<head>
	<title>Demo</title>
</head>
<body>
	<?php include('inc/nav.php'); ?>
	<p>
		Start Date:<?php echo $start_date; ?> <br>
		End Date:<?php echo $end_date; ?> <br>
		Meal Number:<?php echo $meal_number; ?> <br>
		Add Rice:<?php echo $add_rice; ?> <br>
		Note:<?php echo $note; ?> <br>
		
	</p>
	<p>Total Payment: <?php echo $subscription_total;?></p>

	<form action="subscribe_confirm.php" method="post">
		<input type="hidden" name="start_date" value="<?php echo $start_date; ?>"/>
		<input type="hidden" name="end_date" value="<?php echo $end_date; ?>"/>
		<input type="hidden" name="meal_number" value="<?php echo $meal_number; ?>"/>
		<input type="hidden" name="add_rice" value="<?php echo $add_rice; ?>"/>
		<input type="hidden" name="note" value="<?php echo $note; ?>"/>
		<input type="hidden" name="subscription_total" value="<?php echo $subscription_total; ?>"/>

		<input type="submit" name="confirm-subscription" value="confirm"/>
		<input type="submit" name="edit-subscription" value="edit"/>
	</form>


</body>
</html>