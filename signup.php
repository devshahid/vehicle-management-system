<?php

if (isset($_POST["signUpbtn"])) {
  $fullName  = $_POST["fullname"];
  $userEmail = $_POST["UserEmail"];
  $phoneNumber = $_POST["phonenumber"];
  $password = $_POST["UserPassword"];
  $cpassword = $_POST["ConfirmPassword"];


  if ($cpassword == $password) {
    require './config.php';

    $selectData = "SELECT * FROM admindetails
      WHERE adminNumber = '$phoneNumber'";

    $result = mysqli_query($databasekey, $selectData);
    if (mysqli_num_rows($result) > 0) {
      echo 'number already exist';
    } else {
      $adminId = rand(10000, 99999);
      $insertdata = "insert into admindetails 
      (adminId, adminName, adminEmail, adminNumber, adminPassword ) values
      ('$adminId', '$fullName', '$userEmail', '$phoneNumber', '$cpassword')";
      $result = mysqli_query($databasekey, $insertdata);
      if ($result == true) {
        header("location: ./login.php");
      }
    }
  } else {
    echo "password not matched";
  }
}


?>













<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>signup</title>
</head>

<body>
  <form method="POST">

    <input type="text" name="fullname" id="" placeholder="full Name" />
    <input type="number" name="phonenumber" id="" placeholder="number" />
    <input type="email" name="UserEmail" id="" placeholder="Email" />
    <input type="password" name="UserPassword" id="" placeholder="password" />
    <input type="password" name="ConfirmPassword" id="" placeholder="confirm password" />
    <input type="submit" name="signUpbtn" id="" />
  </form>
  <button> <a href="login.php">login</a></button>

</body>

</html>