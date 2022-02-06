<?php

include('../inc/connect.php');
include('../inc/functions.php');

//get categories
$categories = getCategories($conn);


if(isset($_POST['add-meal'])){
	//senitize incoming data
	$name = $conn->real_escape_string(trim($_POST['name']));	
	$category_id = $conn->real_escape_string(trim($_POST['category_id']));

	//save to database
	$sql = "INSERT INTO meals (name, category_id) VALUES ('{$name}', '{$category_id}')";

	if ($conn->query($sql) === TRUE) {
	  header('Location:meals_list.php');
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

	<form action="meals_add.php" method="post">
		<label for="name">Meal Name</label><br>
		<input type="text" name="name"  required /><br><br>

		<select name="category_id">
			<?php foreach($categories as $category): ?>
				<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
			<?php endforeach; ?>
		</select>
		<br><br>
		<input type="submit" name="add-meal" value="submit"/>
	</form>

</body>
</html>