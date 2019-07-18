<?php
//For security reasons, don't display any errors or warnings. Comment out in DEV.
error_reporting(0);
//start session
session_start();
class logmein {

  //encryption
   var $encrypt = false;       //set to true to use md5 encryption for the password

   function getUsername() {
       $conn = new mysqli("localhost", "root", "", "mydb"); // Create connection
       $query = "SELECT username FROM user";
       $result = mysqli_query($conn, $query);
       $user = mysqli_fetch_all ($result, MYSQLI_ASSOC)[0];
       $user = implode( ',', $user);
       return $user;
   }

   function getPassword() {
       $conn = new mysqli("localhost", "root", "", "mydb"); // Create connection
       $query = "SELECT password FROM user";
       $result = mysqli_query($conn, $query);
       $pass = mysqli_fetch_all ($result, MYSQLI_ASSOC)[0];
       $pass= implode( ',', $pass);
       return $pass;
   }

   function getFirst() {
       $conn = new mysqli("localhost", "root", "", "mydb"); // Create connection
       $query = "SELECT firstname FROM user";
       $result = mysqli_query($conn, $query);
       $first = mysqli_fetch_all ($result, MYSQLI_ASSOC)[0];
       $first = implode( ',', $first);
       return $first;
   }

   function getLast() {
       $conn = new mysqli("localhost", "root", "", "mydb"); // Create connection
       $query = "SELECT lastname FROM user";
       $result = mysqli_query($conn, $query);
       $last = mysqli_fetch_all ($result, MYSQLI_ASSOC)[0];
       $last = implode( ',', $last);
       return $last;
   }

   function setUser($first, $last, $user, $pass) {
     if ($first == "") {
       $first = $this->getFirst();
     }
     if ($last == "") {
       $last = $this->getLast();
     }
     if ($user == "") {
       $user = $this->getUsername();
     }
     if ($pass == "") {
       $pass = $this->getPassword();
     }


     $conn = new mysqli("localhost", "root", "", "mydb"); // Create connection
     $sql = "INSERT INTO user (id,username,password,firstname,lastname)
     VALUES ('0', '$user', '$pass', '$first', '$last') ON DUPLICATE KEY UPDATE
     username='$user', password='$pass', firstname='$first', lastname='$last'";


     if ($conn->query($sql) === TRUE) {
     } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
     }
     return;
   }

   //login function
function checkUser($username, $password){
  $user = $this->getUsername();
  $pass = $this->getPassword();


  //if username and password
       if ($user == $username &&
          $pass == $password) {
          return true;
        } else {
          return false;
        }

}

function checkPassword($pass){
if ($pass == "") {
  $pass = $this->getPassword();
}
$count = 0;
  $length = strlen($pass);
  for ($i=0; $i<$length; $i++) {
     if ($pass[$i] == "~" ||
     $pass[$i] == " " ||
     $pass[$i] == "!" ||
     $pass[$i] == "@" ||
     $pass[$i] == "#") {
       return false;
     } else {
       if (ctype_upper($pass[$i])) {
         $count++;
       }
     }
  }

  if ($count < 1) {
    return false;
  }

  return true;

}

function createUserDB() {
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
    if(mysqli_query($link, $sql)){
    } else{

  }

  $sql = "INSERT INTO user (id,username,password,firstname,lastname)
  VALUES ('0', 'admin', 'admin', 'firstname', 'lastname')
  ON DUPLICATE KEY UPDATE id=id";

  if ($link->query($sql) === TRUE) {
  } else {
  }
}
}

  ?>
