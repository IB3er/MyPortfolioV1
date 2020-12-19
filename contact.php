<?php
	$firstName = $_POST['firstName'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
    $message = $_POST['message'];

	// connection
	$conn = new mysqli('localhost','root','','myDB');
	if($conn->connect_error){
		//echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into contactMe(firstName, email, subject, message) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $firstName, $email, $subject, $message);
		$execval = $stmt->execute();
		//echo $execval; //counts messages
		//echo "Message successfully sent...";
		$stmt->close();
		$conn->close();
	}
	if($firstName !=''&& $email !=''&& $subject !=''&& $message !='')
	{
	//  To redirect form/to a particular page
	header("Location:index.html");
	}
?>