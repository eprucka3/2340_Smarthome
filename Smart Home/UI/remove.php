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

$sql = "DELETE from devices WHERE id='$name'";

if ($conn->query($sql) === TRUE) {
    echo "Deleted!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
