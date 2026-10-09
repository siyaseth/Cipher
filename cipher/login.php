
<?php

$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "cipher";

$conn = new mysqli(
    $servername,
    $db_username,
    $db_password,
    $dbname
);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    $sql = "SELECT * FROM sign_up
            WHERE username = ? AND password = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Login successful! Welcome " .
             htmlspecialchars($username);
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close();

} else {
    echo "Please submit the login form first.";
}

$conn->close();

?>

