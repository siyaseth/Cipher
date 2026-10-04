<?php

$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "Cipher";

$username = $_POST["username"];
$password = $_POST["password"];

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM sign_up WHERE username='$username' AND password='$password'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Login successful! Welcome " . $username;
} else {
    echo "Invalid username or password.";
}

$conn->close();

?>
