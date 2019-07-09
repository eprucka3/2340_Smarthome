<?php
   ob_start();
   session_start();
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
            $msg = '';
            $mysqli = new mysqli("localhost", "root", "", "mydb");
            $query = "SELECT username FROM user";
            $result = mysqli_query($mysqli, $query);
            $username = mysqli_fetch_all ($result, MYSQLI_ASSOC)[0];
            $username = implode( ',', $username);

            $query = "SELECT password FROM user";
            $result = mysqli_query($mysqli, $query);
            $password = mysqli_fetch_all ($result, MYSQLI_ASSOC)[0];
            $password = implode( ',', $password);

            $mysqli->close();

            if (isset($_POST['login']) && !empty($_POST['username'])
               && !empty($_POST['password'])) {

               if ($_POST['username'] == $username &&
                  $_POST['password'] == $password) {
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
               required autofocus></br>
            <input type = "password" class = "form-control" id = "password"
               name = "password" placeholder = "password" required>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit"
               name = "login">Login</button>
         </form>

      </div>

      <script>
      //Create database if not created
      $.post(
          "createUser.php",
          function(data, status) {// success callback
          						console.log('status: ' + status + ', data: ' + data);
            });

            //Retrieve json data
            $.post(
                "readUser.php",
                  { name: "root" },
                  function(response) {

                  }, 'json'
              );

              //Parse json
              var xmlhttp = new XMLHttpRequest();
              username;
              password;
              xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                      var jsonData  = JSON.parse(this.responseText);
                        username = jsonData[0].username;
                        password = jsonData[0].password;
                        setPlaceholders(username, password);
                  }
              };
              xmlhttp.open("GET", "readUser.php", true);
              xmlhttp.send();

              function setPlaceholders(username, password, firstname, lastname) {
                document.getElementById("username").placeholder = "Username = " + username;
                document.getElementById("password").placeholder = "Password = " + password;
            }

      </script>

   </body>
</html>
