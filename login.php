<?php
session_start();
if (isset($_POST["login"])) {
  require './config.php';
  $Phone = $_POST["phonenumber"];
  $Password = $_POST["password"];


  $selectData = "SELECT * FROM admindetails
                           WHERE adminNumber ='$Phone' AND adminPassword='$Password'";

  $result = mysqli_query($databasekey, $selectData);

  if (mysqli_num_rows($result) > 0) {
    header("location: ./admindashboard.php");
  } else {
    echo 'Invalid Credentials';
  }
}









?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>login</title>
</head>

<body>
  <form method="POST">
    <input type="number" name="phonenumber" id="" placeholder="Number" />
    <input type="password" name="password" id="" placeholder="password" />
    <input type="submit" name="login" id="" value="login" />
  </form>
  <button> <a href="signup.php">signup</a></button>
</body>

</html>