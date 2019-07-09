<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname); // Create connection
if ($conn->connect_error) {     // Check connection
    die("Connection failed: " . $conn->connect_error);
}

$user = mysqli_real_escape_string($conn, $_POST['us']);
$pass = mysqli_real_escape_string($conn, $_POST['pa']);
$first = mysqli_real_escape_string($conn, $_POST['fn']);
$last = mysqli_real_escape_string($conn, $_POST['ln']);

$sql = "INSERT INTO user (id,username,password,firstname,lastname)
VALUES ('0', '$user', '$pass', '$first', '$last') ON DUPLICATE KEY UPDATE
username='$user', password='$pass', firstname='$first', lastname='$last'";

if ($conn->query($sql) === TRUE) {
    echo "Page saved!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
