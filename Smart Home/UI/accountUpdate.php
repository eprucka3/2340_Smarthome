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

<script>
window.location.href = "myaccount.php";
  </script>
