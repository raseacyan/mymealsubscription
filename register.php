<?php

include('inc/connect.php');
include('inc/functions.php');

$townships = getTownships($conn);

if(isset($_POST['register'])){
	//senitize incoming data
	$name = $conn->real_escape_string(trim($_POST['name']));	
	$phone = $conn->real_escape_string(trim($_POST['phone']));	
	$password = $conn->real_escape_string(trim($_POST['password']));
	$password = md5($password);
	$address = $conn->real_escape_string(trim($_POST['address']));	
	$township_id = $conn->real_escape_string(trim($_POST['township_id']));

	//save to database
	$sql = "INSERT INTO customers (name, phone, password, address, township_id) VALUES ('{$name}', '{$phone}','{$password}', '{$address}', '{$township_id}')";

	if ($conn->query($sql) === TRUE) {
	  header('Location:index.php');
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

	<form action="register.php" method="post">
		<label for="name">Name</label><br>
		<input type="text" name="name"  required /><br>

		<label for="phone">Phone</label><br>
		<input type="text" name="phone"  required /><br>

		<label for="password">Password</label><br>
		<input type="text" name="password"  required /><br>

		<label for="address">Address</label><br>
		<textarea name="address"></textarea><br><br>

		<label for="township_id">Township</label><br>
		<select name="township_id">
			<?php foreach($townships as $township): ?>
				<option value="<?php echo $township['id']; ?>"><?php echo $township['name']; ?></option>
			<?php endforeach; ?>
		</select>


		<br><br>
		<input type="submit" name="register" value="submit"/>
	</form>

</body>
</html>