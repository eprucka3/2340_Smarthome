<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname); // Create connection
if ($conn->connect_error) {     // Check connection
    die("Connection failed: " . $conn->connect_error);
}

$id = mysqli_real_escape_string($conn, $_POST['id']);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$amount = mysqli_real_escape_string($conn, $_POST['amount']);
$pos1 = mysqli_real_escape_string($conn, $_POST['pos1']);
$pos2 = mysqli_real_escape_string($conn, $_POST['pos2']);


$sql = "INSERT INTO devices (id,name,amount,pos1,pos2)
VALUES ('$id', '$name', '$amount', '$pos1', '$pos2') ON DUPLICATE KEY UPDATE
amount='$amount', pos1='$pos1', pos2='$pos2'";

if ($conn->query($sql) === TRUE) {
    echo "Page saved!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
