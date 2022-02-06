<?php
session_start();
include('inc/connect.php');
include('inc/functions.php');


$meals = getMeals($conn);

$subscription = getSubscriptionById($_GET['sid'], $conn);
//$subscription['meal_number'] = 1;
echo "meal numbers: {$subscription['meal_number']}";

if(isset($_POST['add-meal'])){

    
	//senitize incoming data
    $date = $conn->real_escape_string(trim($_POST['date']));
	$meat_1 = $conn->real_escape_string(trim($_POST['meat_1']));	
    $vege_1 = $conn->real_escape_string(trim($_POST['vege_1']));
    $subscription_id = $conn->real_escape_string(trim($_POST['subscription_id']));
    $customer_id = $_SESSION['user_id'];

    $meat_2 = "";
    $vege_2 = "";

    if(isset($meat_2)){
        $meat_2 = $conn->real_escape_string(trim($_POST['meat_2']));
    }
    
    if(isset($vege_2)){
        $vege_2 = $conn->real_escape_string(trim($_POST['vege_2']));
    }

	//save to database
	$sql = "INSERT INTO meal_options (`date`, meat_1, vege_1, meat_2, vege_2, subscription_id, customer_id) VALUES ('{$date}','{$meat_1}', '{$vege_1}', '{$meat_2}', '{$vege_2}', '{$subscription_id}', '{$customer_id}')";

	if ($conn->query($sql) === TRUE) {
	  header('Location:mysubscriptions_single.php?id='.$subscription_id);
	} else {
	  echo "Error: ".$conn->error;
	}
	
}
$conn->close();

?>
<!DOCTYE html>
<html>
<head>
	<title>Demo</title>
</head>
<body>
	<?php include('inc/nav.php'); ?>

	<form action="addmeal.php" method="post">

        <label for="date">Date</label>
        <input type="date" name="date" max="<?php echo $subscription['end_date']; ?>" min="<?php echo $subscription['start_date']; ?>"/><br>


        
		<label for="meat_1">Meat 1</label>
		<select name="meat_1">
            <option value="any" selected>-- Any --</option>
			<?php foreach($meals as $meal): ?>

                <?php if($meal['category_id'] == 1): ?>
				<option value="<?php echo $meal['name']; ?>"><?php echo $meal['name']; ?></option>
                <?php endif; ?>
			<?php endforeach; ?>
		</select>

        <label for="vege_1">Vege 1</label>
        <select name="vege_1">
            <option value="any" selected>-- Any --</option>
			<?php foreach($meals as $meal): ?>
                
                <?php if($meal['category_id'] ==2): ?>
				<option value="<?php echo $meal['name']; ?>"><?php echo $meal['name']; ?></option>
                <?php endif; ?>
			<?php endforeach; ?>
		</select>

        <br>

        <?php if($subscription['meal_number'] > 1): ?>            
        <label for="meat_1">Meat 2</label>
		<select name="meat_2">
            <option value="any" selected>-- Any --</option>
			<?php foreach($meals as $meal): ?>
                <?php if($meal['category_id'] == 1): ?>
				<option value="<?php echo $meal['name']; ?>"><?php echo $meal['name']; ?></option>
                <?php endif; ?>
			<?php endforeach; ?>
		</select>

        <label for="vege_2">Vege 2</label>
        <select name="vege_2">
            <option value="any" selected>-- Any --</option>
			<?php foreach($meals as $meal): ?>
                <?php if($meal['category_id'] ==2): ?>
				<option value="<?php echo $meal['name']; ?>"><?php echo $meal['name']; ?></option>
                <?php endif; ?>
			<?php endforeach; ?>
		</select>
        <?php endif; ?>

         <input type="hidden" name="subscription_id" value="<?php echo $_GET['sid']; ?>"/>

        <br><br>
		<input type="submit" name="add-meal" value="submit"/>
	</form>

</body>
</html>