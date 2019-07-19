<?php
   include("userClass.php");
   $log = new logmein();
   $log->createUserDB();
   $passCheck = $log->checkPassword($_POST['password']);
if ($passCheck == 0) {
  $log->setUser($_POST["firstname"], $_POST["lastname"],
  $_POST["username"], $_POST['password']);
  header("Location: home.html");
  die();
} else if ($passCheck == 1) {
  die("Password must contain a capital letter");
} else if ($passCheck == 2) {
  die("Password can't contain '~, !, @, ' ', #'");
} else {
  die("Password can't contain '~, !, @, ' ', #' and must contain a capital letter");
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

<!-- <script>
window.location.href = "home.html";
  </script> -->
