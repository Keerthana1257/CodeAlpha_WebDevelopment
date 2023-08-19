<?php
	
	$name = $_POST['name'];
	$email = $_POST['email']; 
	$gender = $_POST['gender'];
	$number = $_POST['number'];
    $role = $_POST['role'];
	$frnd = $_POST['frnd'];
    $yes=$_POST['yes'];
    

	// Database connection
	$conn = new mysqli('localhost','root','','survey');
	if($conn->connect_error){
		
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into form(name, email, gender, number, role,frnd, yes) values(?, ?, ?, ?, ?, ?,?)");
		$stmt->bind_param("sssisss", $name, $email, $gender, $number, $role, $frnd, $yes);
		$stmt->execute();
		echo "Submitted Successfully...";
		$stmt->close();
		$conn->close();
	}
?>