<?php

include('../inc/connect.php');

if(isset($_POST['add-category'])){
	//senitize incoming data
	$name = $conn->real_escape_string(trim($_POST['name']));	

	//save to database
	$sql = "INSERT INTO categories (name) VALUES ('{$name}')";

	if ($conn->query($sql) === TRUE) {
	  header('Location:categories_list.php');
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

	<form action="categories_add.php" method="post">
		<label for="name">Category Name</label><br>
		<input type="text" name="name"  required /><br><br>
		<input type="submit" name="add-category" value="submit"/>
	</form>

</body>
</html>