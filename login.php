<?php
session_start();
$msg = "";
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
    $msg = 'Invalid Credentials';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/style.css">
  <title>Login Page</title>
</head>

<body>
  <div class="mainContent">
    <h1>VEHICLE MANAGEMENT SYSTEM</h1>
    <div class="formContent">
      <form method="POST">
        <p class="errorMsg"><?php if (!empty($msg)) echo $msg ?></p>
        <input type="number" name="phonenumber" id="" placeholder="Number" required />
        <input type="password" name="password" id="" placeholder="password" required />
        <input type="submit" name="login" id="" value="LOGIN" />
        <p>Don't have account?Click below to sign up</p>
        <button class="signUpBtn"> <a href="signup.php">signup</a></button>
      </form>
    </div>
  </div>
</body>

</html>