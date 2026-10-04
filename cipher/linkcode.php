<html>
	<body>
	<?php

	$servername = "localhost";
	$db_username = "root";
	$db_password = "";
	$dbname = "Cipher";
	$username = $_POST["username"];
	$email_id = $_POST["email_id"];
	$password = $_POST["password"];
	$gender   = $_POST["gender"];


	// Create connection
	$conn = new mysqli($servername, $db_username, $db_password, $dbname);

	// Check connection
	if ($conn->connect_error) {
    	   die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO sign_up (username,email_id,password,gender) VALUES ('$username', '$email_id', '$password', '$gender')";

	if ($conn->query($sql) === TRUE) {
    	echo "New record created successfully";
	}
	
	else {
    	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
	?>

	</body>
</html> 
