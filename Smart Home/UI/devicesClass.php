<?php
//For security reasons, don't display any errors or warnings. Comment out in DEV.
error_reporting(0);
//start session
session_start();
class devices {

  //encryption
   var $encrypt = false;       //set to true to use md5 encryption for the password

function insertDevice($id, $name, $amountDay, $amountNight, $amountAway,
    $type, $enabled, $pos1, $pos2) {

  $conn = mysqli_connect("localhost", "root", "", "mydb");
  if ($conn->connect_error) {     // Check connection
      die("Connection failed: " . $conn->connect_error);
  }


  if ($pos1 == null) {
    $sql = "INSERT INTO devices (id,name,amountDay,amountNight,amountAway,type,enabled)
    VALUES ('$id', '$name', '$amountDay','$amountNight','$amountAway','$type','$enabled')
    ON DUPLICATE KEY UPDATE name='$name', amountDay='$amountDay', amountNight='$amountNight',
    amountAway='$amountAway',type='$type',enabled='$enabled'";
  } else if ($amountDay == null) {
    $sql = "INSERT INTO devices (id,pos1,pos2)
    VALUES ('$id','$pos1', '$pos2')
    ON DUPLICATE KEY UPDATE
    pos1='$pos1', pos2='$pos2'";
  } else {
    $sql = "INSERT INTO devices (id,name,amountDay,amountNight,amountAway,type,enabled,pos1,pos2)
    VALUES ('$id', '$name', '$amountDay','$amountNight','$amountAway','$type','$enabled','$pos1', '$pos2')
    ON DUPLICATE KEY UPDATE name='$name', amountDay='$amountDay', amountNight='$amountNight',
    amountAway='$amountAway',type='$type',enabled='$enabled',pos1='$pos1', pos2='$pos2'";
  }

  if ($conn->query($sql) === TRUE) {
      echo "Page saved!";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

function createDevicesJSON() {
  header('Content-type: application/json');

  try {
              // Try Connect to the DB with new MySqli object - Params {hostname, userid, password, dbname}
              $mysqli = new mysqli("localhost", "root", "", "mydb");


              $query = "SELECT * FROM devices";
              $result = mysqli_query($mysqli, $query);

              $json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
              echo json_encode($json );

          } catch (mysqli_sql_exception $e) { // Failed to connect? Lets see the exception details..
              echo "MySQLi Error Code: " . $e->getCode() . "<br />";
              echo "Exception Msg: " . $e->getMessage();
              exit(); // exit and close connection.
          }
}

function createDevicesDB() {
  /* Attempt MySQL server connection. Assuming you are running MySQL
  server with default setting (user 'root' with no password) */
  $link = mysqli_connect("localhost", "root", "");

  // Check connection
  if($link === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }

  //check if exists already
  $db_selected = mysqli_select_db($link, 'mydb');

  if (!$db_selected) {
    // Attempt create database query execution
    $sql = "CREATE DATABASE mydb";
    if(mysqli_query($link, $sql)){
        echo "Database created successfully";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
  }

    $link = mysqli_connect("localhost", "root", "", "mydb");

    // Attempt create table query execution
    $sql = "CREATE TABLE IF NOT EXISTS devices(
        id INT NOT NULL PRIMARY KEY,
        name VARCHAR(40) NOT NULL,
        amountDay int(11) NOT NULL,
        amountNight int(11) NOT NULL,
        amountAway int(11) NOT NULL,
        type VARCHAR(40) NOT NULL,
        enabled int(1) NOT NULL,
        pos1 int(11) NOT NULL,
        pos2 int(11) NOT NULL
    )";
    if(mysqli_query($link, $sql)){
        echo "Table created successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

  }
}
}

  ?>
