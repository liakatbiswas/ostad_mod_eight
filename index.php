<?php
ob_start();
session_start();
include_once 'connection.php'
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>

  <body>

    <div>
      <a href="./index.php" style="margin-right: 15px;">Welcome</a>
      <a href="./registration.php" style="margin-right: 15px;">Registration</a>
      <a href="./login.php">Login</a>
    </div>

    <h1>Welcome <?php
if ( isset( $_SESSION['fname'] ) ) {
 echo $_SESSION['fname'];
}
?></h1>

  </body>

</html>