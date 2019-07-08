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

  $link = mysqli_connect("localhost", "root", "", "mydb");

  // Attempt create table query execution
  $sql = "CREATE TABLE devices(
      id INT NOT NULL PRIMARY KEY,
      name VARCHAR(40) NOT NULL,
      amount int(11) NOT NULL,
      pos1 int(11) NOT NULL,
      pos2 int(11) NOT NULL
  )";
  if(mysqli_query($link, $sql)){
      echo "Table created successfully.";
  } else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


// Close connection
mysqli_close($link);
?>
