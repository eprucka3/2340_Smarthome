<?php
//For security reasons, don't display any errors or warnings. Comment out in DEV.
error_reporting(0);
//start session
session_start();
class logmein {

  //table fields
  var $user_table = 'user';
  var $id_column = 'id';
  var $user_column = 'username';
  var $pass_column = 'password';
  var $first_column = 'firstname';
  var $last_column = 'lastname';

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

   function setUsername($first) {
     $conn = new mysqli("localhost", "root", "", "mydb"); // Create connection
     $sql = "INSERT INTO user (id,username)
     VALUES ('0', '$user') ON DUPLICATE KEY UPDATE
     username='$user'";


     if ($conn->query($sql) === TRUE) {
         echo "Page saved!";
     } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
     }
     return;
   }

   function setUser($first, $last, $user, $pass) {
        echo "hey";
     $conn = new mysqli("localhost", "root", "", "mydb"); // Create connection
     $sql = "INSERT INTO user (id,username,password,firstname,lastname)
     VALUES ('0', '$user', '$pass', '$first', '$last') ON DUPLICATE KEY UPDATE
     username='$user', password='$pass', firstname='$first', lastname='$last'";


     if ($conn->query($sql) === TRUE) {
         echo "Page saved!";
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

function register($user_name, $user_password, $user_firstname, $user_lastname) {
  //try {
    //Hash Password
  //  $user_hashed_password = password_hash($user_password, PASSWORD_DEFAULT);
  //}
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
