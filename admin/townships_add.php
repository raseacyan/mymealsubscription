<?php

include('../inc/connect.php');

if(isset($_POST['add-township'])){
	//senitize incoming data
	$name = $conn->real_escape_string(trim($_POST['name']));	

	//save to database
	$sql = "INSERT INTO townships (name) VALUES ('{$name}')";

	if ($conn->query($sql) === TRUE) {
	  header('Location:townships_list.php');
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

	<form action="townships_add.php" method="post">
		<label for="name">Township Name</label><br>
		<input type="text" name="name"  required /><br><br>
		<input type="submit" name="add-township" value="submit"/>
	</form>

</body>
</html>