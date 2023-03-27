<?php
ob_start();
session_start();
include_once 'connection.php'
?>
<!DOCTYPE html>
<html>

  <head>
    <title>Login Form</title>
  </head>

  <body>

    <div>
      <a href="./index.php" style="margin-right: 15px;">Welcome</a>
      <a href="./registration.php" style="margin-right: 15px;">Registration</a>
      <a href="./login.php">Login</a>
    </div>


    <?php
if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
 $email    = $_POST['email'];
 $password = $_POST['password'];

 $select = "SELECT * from registration where email = '$email' and password = '$password'";

 $selectQry   = $conn->query( $select );
 $selectAssoc = $selectQry->fetch_assoc();
 $count       = $selectQry->num_rows;
 if ( $count == 1 ) {
  $_SESSION['admin_login'] = true;
  $_SESSION['fname']       = $selectAssoc['fname'];
  header( 'location: index.php' );
 } else {
  echo '<br><h1 class="text-center">Username or Password does not match</h1>';
 }
}

?>



    <h2>Login Form</h2>
    <form method="POST" action="login.php">
      <label for="email">Email:</label><br>
      <input type="email" id="email" name="email" required><br>

      <label for="password">Password:</label><br>
      <input type="password" id="password" name="password" required><br>

      <input type="submit" value="Login">
    </form>

    <p>Haven't an account <a href="./registration.php">Register</a></p>
  </body>

</html>