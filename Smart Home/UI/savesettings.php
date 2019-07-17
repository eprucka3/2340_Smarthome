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
$amountDay = mysqli_real_escape_string($conn, $_POST['amountDay']);
$amountNight = mysqli_real_escape_string($conn, $_POST['amountNight']);
$amountAway = mysqli_real_escape_string($conn, $_POST['amountAway']);
$type = mysqli_real_escape_string($conn, $_POST['type']);
$pos1 = mysqli_real_escape_string($conn, $_POST['pos1']);
$pos2 = mysqli_real_escape_string($conn, $_POST['pos2']);


if ($pos1 == null) {
  $sql = "INSERT INTO devices (id,name,amountDay,amountNight,amountAway,type)
  VALUES ('$id', '$name', '$amountDay','$amountNight','$amountAway','$type')
  ON DUPLICATE KEY UPDATE name='$name', amountDay='$amountDay', amountNight='$amountNight',
  amountAway='$amountAway',type='$type'";
} else if ($amountDay == null) {
  $sql = "INSERT INTO devices (id,pos1,pos2)
  VALUES ('$id','$pos1', '$pos2')
  ON DUPLICATE KEY UPDATE
  pos1='$pos1', pos2='$pos2'";
} else {
  $sql = "INSERT INTO devices (id,name,amountDay,amountNight,amountAway,type,pos1,pos2)
  VALUES ('$id', '$name', '$amountDay','$amountNight','$amountAway','$type','$pos1', '$pos2')
  ON DUPLICATE KEY UPDATE name='$name', amountDay='$amountDay', amountNight='$amountNight',
  amountAway='$amountAway',type='$type',pos1='$pos1', pos2='$pos2'";
}

if ($conn->query($sql) === TRUE) {
    echo "Page saved!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
