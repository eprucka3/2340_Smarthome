<?php
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
  $sql = "CREATE TABLE IF NOT EXISTS user(
      id INT NOT NULL PRIMARY KEY,
      username VARCHAR(40) NOT NULL,
      password VARCHAR(40) NOT NULL,
      firstname VARCHAR(40) NOT NULL,
      lastname VARCHAR(40) NOT NULL
  )";


$sql = "INSERT INTO user (id,username,password,firstname,lastname)
VALUES ('0', 'admin', 'admin', 'firstname', 'lastname')
ON DUPLICATE KEY UPDATE id=id";



// Close connection
mysqli_close($link);
?>
