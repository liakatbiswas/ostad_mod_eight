<?php
ob_start();
session_start();
include_once 'connection.php';
?>

<!DOCTYPE html>
<html>

  <head>
    <title>Registration Form</title>
  </head>

  <body>
    <div>
      <a href="./index.php" style="margin-right: 15px;">Welcome</a>
      <a href="./registration.php" style="margin-right: 15px;">Registration</a>
      <a href="./login.php">Login</a>
    </div>

    <?php
if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
 $fname            = $_POST['fname'];
 $lname            = $_POST['lname'];
 $email            = $_POST['email'];
 $password         = $_POST['password'];
 $confirm_password = $_POST['confirm_password'];

 //Validation checks
 if ( empty( $fname ) || empty( $lname ) || empty( $email ) || empty( $password ) || empty( $confirm_password ) ) {
  echo "Please fill all the fields.";
 } else if ( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
  echo "Please enter a valid email address.";
 } else if ( $password != $confirm_password ) {
  echo "Passwords do not match.";
 } else {

  $insertData = "INSERT INTO registration (fname, lname, email, password, confirm_password )
  VALUES ('$fname','$lname','$email','$password','$confirm_password')";
  $selectQry = $conn->query( $insertData );

  if ( $insertData ) {
   echo "Successfully Inserted";
   echo "<meta http-equiv='refresh' content='5, URL=login.php'>";
  } else {
   echo "Failed to Update.";
  }
 }
}
?>



    <h2>Registration Form</h2>
    <form method="POST" action="">
      <label for="fname">First Name:</label><br>
      <input type="text" id="fname" name="fname" required><br>

      <label for="lname">Last Name:</label><br>
      <input type="text" id="lname" name="lname" required><br>

      <label for="email">Email:</label><br>
      <input type="email" id="email" name="email" required><br>

      <label for="password">Password:</label><br>
      <input type="password" id="password" name="password" required><br>

      <label for="confirm_password">Confirm Password:</label><br>
      <input type="password" id="confirm_password" name="confirm_password" required><br>
      <br>
      <input type="submit" value="Register">
    </form>

    <p>Have an account <a href="./login.php">Login</a></p>
  </body>

</html>