<?php
   include("userClass.php");
   $log = new logmein();
   $log->createUserDB();
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
  h1{
     color: #017572;
  }
.btn {
  background-color: #017572;
  border-style: solid;
    border-color: #191919;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  margin: 4px 2px;
  cursor: pointer;
}

/* Gray */
.left {
  position: absolute;
  left: 15px;
  transition: all 500ms ease-in-out;
}

.left:hover {
  color: black;
  transition: all 500ms ease-in-out
}

.dropdown a:hover {background-color: #ddd;}

.center-div
{
     margin: 0 auto;
     width: 200px;
}

.center_color {

  padding: 5px;
  margin-top: 10px;
  border-style: solid;
  border-color: #191919;
}

</style>
</head>
<body>
  <button class="btn left" onclick="location.href='home.html'">Home</button>

<h1 class="center-div">Account Info</h1>


<form class="center-div center_color"
  action="accountUpdate.php" method = "post">
  First name:<br>
  <input type="text" name="firstname" id = "firstname"
   placeholder = "<?php echo $log->getFirst()?>">
  <br>
  Last name:<br>
  <input type="text" name="lastname" id = "lastname"
   placeholder = "<?php echo $log->getLast()?>">
  <br>
  Username:<br>
  <input type="text" name="username" id = "username"
   placeholder = "<?php echo $log->getUsername()?>">
  <br>
  Password:<br>
  <input type="text" name="password" id = "password"
   placeholder = "<?php echo $log->getPassword()?>">
  <input type="submit" value = "Save" name="formSubmit">
</form>


</body>

</html>
