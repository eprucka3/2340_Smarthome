<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname); // Create connection
if ($conn->connect_error) {     // Check connection
    die("Connection failed: " . $conn->connect_error);
}


$name = mysqli_real_escape_string($conn, $_POST['name']);
$amount = mysqli_real_escape_string($conn, $_POST['amount']);


$sql = "INSERT INTO devices (name,amount)
VALUES ('$name', '$amount') ON DUPLICATE KEY UPDATE
amount='$amount'";

if ($conn->query($sql) === TRUE) {
    echo "Page saved!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
