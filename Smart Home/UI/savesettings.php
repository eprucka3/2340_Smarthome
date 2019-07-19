<?php
$conn = mysqli_connect("localhost", "root", "", "mydb");
if ($conn->connect_error) {     // Check connection
    die("Connection failed: " . $conn->connect_error);
}

$id = mysqli_real_escape_string($conn, $_POST['id']);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$amountDay = mysqli_real_escape_string($conn, $_POST['amountDay']);
$amountNight = mysqli_real_escape_string($conn, $_POST['amountNight']);
$amountAway = mysqli_real_escape_string($conn, $_POST['amountAway']);
$type = mysqli_real_escape_string($conn, $_POST['type']);
$enabled = mysqli_real_escape_string($conn, $_POST['enabled']);
$pos1 = mysqli_real_escape_string($conn, $_POST['pos1']);
$pos2 = mysqli_real_escape_string($conn, $_POST['pos2']);

include("devicesClass.php");
$log = new devices();
$log->insertDevice($id, $name, $amountDay, $amountNight, $amountAway,
    $type, $enabled, $pos1, $pos2);
?>
