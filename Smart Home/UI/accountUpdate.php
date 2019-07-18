<?php
   include("userClass.php");
   $log = new logmein();
   $log->createUserDB();
if ($log->checkPassword($_POST['password'])) {
  $log->setUser($_POST["firstname"], $_POST["lastname"],
  $_POST["username"], $_POST['password']);
} else {
  die("Invalid Password");
}
?>

<html>
<head>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
  body {
     padding-top: 40px;
     padding-bottom: 40px;
     background-color: #ADABAB;
  }
  </style>
</head>
</html>

<script>
window.location.href = "myaccount.php";
  </script>
