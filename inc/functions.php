<?php


/*******************
Categories
********************/

function getCategories($conn){
	$sql = "SELECT * from categories";
	
	$result = $conn->query($sql);
	if($result){
		$data = array();
		if($result->num_rows > 0){
			
			While($row = $result->fetch_assoc()){
				 array_push($data, $row);
			}
			return $data;		
		}else{			
			return false;
		}
	}else{
		echo $conn->error;		
		return false;
	}
}

function getCategoryName($id, $conn){
	$sql = "SELECT * from categories WHERE id={$id}";
	
	$result = $conn->query($sql);
	if($result){
		
		if($result->num_rows > 0){
			
			$row = $result->fetch_assoc();
			$data = $row["name"];
			
			return $data;		
		}else{			
			return false;
		}
	}else{
		echo $conn->error;		
		return false;
	}
}

/***********************
Customers
***********************/

function getCustomerNameById($id, $conn){
	$sql = "SELECT * from customers WHERE id={$id}";
	
	$result = $conn->query($sql);
	if($result){
		
		if($result->num_rows > 0){
			
			$row = $result->fetch_assoc();
			$data = $row["name"];
			
			return $data;		
		}else{			
			return false;
		}
	}else{
		echo $conn->error;		
		return false;
	}
}





/*******************
Meals
********************/

function getMeals($conn){
	$sql = "SELECT * from meals ORDER BY category_id,created_on";
	
	$result = $conn->query($sql);
	if($result){
		$data = array();
		if($result->num_rows > 0){
			
			While($row = $result->fetch_assoc()){
				 array_push($data, $row);
			}
			return $data;		
		}else{			
			return false;
		}
	}else{
		echo $conn->error;		
		return false;
	}
}

/*******************
Townships
********************/

function getTownships($conn){
	$sql = "SELECT * from townships";
	
	$result = $conn->query($sql);
	if($result){
		$data = array();
		if($result->num_rows > 0){
			
			While($row = $result->fetch_assoc()){
				 array_push($data, $row);
			}
			return $data;		
		}else{			
			return false;
		}
	}else{
		echo $conn->error;		
		return false;
	}
}


/*******************
Subscription
********************/

function getSubscriptions($conn){
	$sql = "SELECT s.start_date, s.end_date, s.meal_number, s.add_rice, s.note, s.subscription_total, c.name from subscriptions AS s, customers AS c WHERE s.customer_id=c.id";
	
	$result = $conn->query($sql);
	if($result){
		$data = array();
		if($result->num_rows > 0){
			
			While($row = $result->fetch_assoc()){
				 array_push($data, $row);
			}
			return $data;		
		}else{			
			return false;
		}
	}else{
		echo $conn->error;		
		return false;
	}
}


function getSubscriptionByUserId($user_id, $conn){
	$sql = "SELECT * from subscriptions WHERE customer_id='{$user_id}'";
	
	$result = $conn->query($sql);
	if($result){
		$data = array();
		if($result->num_rows > 0){			
			While($row = $result->fetch_assoc()){
				 array_push($data, $row);
			}
			return $data;		
		}else{			
			return $data;
		}
	}else{
		echo $conn->error;		
		return false;
	}
}


function getSubscriptionById($subscription_id, $conn){
	$sql = "SELECT * from subscriptions WHERE id='{$subscription_id}'";
	
	$result = $conn->query($sql);
	if($result){
		$data = array();
		if($result->num_rows > 0){			
			$row = $result->fetch_assoc();
			$data = $row;				 
			return $data;		
		}else{			
			return $data;
		}
	}else{
		echo $conn->error;		
		return false;
	}
}

/*******************
Meal Options
********************/


function getMealOptionsBySubscriptionId($subscription_id, $conn){
	$sql = "SELECT * from meal_options WHERE subscription_id='{$subscription_id}' ORDER BY `date` ASC";
	
	$result = $conn->query($sql);
	if($result){
		$data = array();
		if($result->num_rows > 0){			
			While($row = $result->fetch_assoc()){
				 array_push($data, $row);
			}
			return $data;		
		}else{			
			return $data;
		}
	}else{
		echo $conn->error;		
		return false;
	}
}


function getMealOptionsByDate($date, $conn){
	$sql = "SELECT m.date, m.meat_1, m.vege_1, m.meat_2, m.vege_2, c.name  from meal_options AS m, customers AS c WHERE m.customer_id = c.id AND m.date ='{$date}'";
	
	$result = $conn->query($sql);
	if($result){
		$data = array();
		if($result->num_rows > 0){			
			While($row = $result->fetch_assoc()){
				 array_push($data, $row);
			}
			return $data;		
		}else{			
			return $data;
		}
	}else{
		echo $conn->error;		
		return false;
	}
}

function getCustomerAddressByMealOptionDate($date, $conn){
	$sql = "SELECT m.date, c.name, c.address from meal_options AS m, customers AS c WHERE m.customer_id = c.id AND m.date ='{$date}'";
	
	$result = $conn->query($sql);
	if($result){
		$data = array();
		if($result->num_rows > 0){			
			While($row = $result->fetch_assoc()){
				 array_push($data, $row);
			}
			return $data;		
		}else{			
			return $data;
		}
	}else{
		echo $conn->error;		
		return false;
	}
}