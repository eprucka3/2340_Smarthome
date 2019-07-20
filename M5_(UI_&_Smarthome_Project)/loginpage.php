<?php
   ob_start();
   session_start();
   include("userClass.php");
   $log = new logmein();
   $log->createUserDB();

?>


<html lang = "en">

   <head>
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


      <style>
         body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #ADABAB;
         }

         .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
         }

         .form-signin .form-signin-heading,
         .form-signin .checkbox {
            margin-bottom: 10px;
         }

         .form-signin .checkbox {
            font-weight: normal;
         }

         .form-signin .form-control {
            position: relative;
            height: auto;
            padding: 10px;
            font-size: 16px;
         }

         .form-signin .form-control:focus {
            z-index: 2;
         }

         .form-signin input[type="username"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            border-color:#191919;
         }

         .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-color:#191919;
         }

         h1{
            text-align: center;
            color: #017572;
         }
      </style>

   </head>

   <body>
      <h1>Welcome to SmartHome</h1>
      <h1>Please Login</h1>
      <div class = "container form-signin">

         <?php
             if (isset($_POST['login']) && !empty($_POST['username'])
                && !empty($_POST['password'])) {
                  if ($log->checkUser($_POST['username'], $_POST['password'])) {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();

                  header('Location: home.html');
               }else {
                  $msg = 'Wrong username or password';
               }
             }
         ?>
      </div> <!-- /container -->

      <div class = "container">

         <form class = "form-signin" role = "form"
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
            ?>" method = "post">
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            <input type = "username" class = "form-control"
               name = "username" id = "username"
               placeholder = "Username = <?php echo $log->getUsername()?>" required>
            <input type = "password" class = "form-control" id = "password"
               name = "password"
               placeholder = "Password = <?php echo $log->getPassword()?>" required>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit"
               name = "login">Login</button>
         </form>

      </div>

   </body>
</html>
