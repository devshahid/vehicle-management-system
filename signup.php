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
  <link rel="stylesheet" href="css/signup.css">
  <title>Sign Up Form</title>
</head>

<body>
  <div class="mainContent">
    <h1>VEHICLE MANAGEMENT SYSTEM</h1>
    <div class="formContent">
      <form method="POST">
        <input type="text" name="fullname" placeholder="Enter Full Name" required />
        <input type="number" name="phonenumber" placeholder="Enter Mobile number" required />
        <input type="email" name="UserEmail" placeholder="Enter Email" required />
        <input type="password" name="UserPassword" placeholder="Enter password" required />
        <input type="password" name="ConfirmPassword" placeholder="Confirm password" required />
        <input type="submit" name="signUpbtn" value="SIGN UP" />
        <p>Already have account?Click below to Login</p>
        <button class="signUpBtn"><a href="login.php">login</a></button>
      </form>
    </div>
  </div>
</body>

</html>