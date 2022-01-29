<?php
if (isset($_POST["submitbtn"])) {
    $staffname = $_POST["staffname"];
    $phonenumber = $_POST["phonenumber"];
    $staffemail = $_POST["useremail"];
    $staffid = $_POST["staffid"];
    require './config.php';
    $insertdata = "insert into staffdetails
    (staffid, staffname, staffphone, staffemail) values
    ('$staffid', '$staffname', '$phonenumber', '$staffemail')";
    $result = mysqli_query($databasekey, $insertdata);
    if ($result == true) {
        echo "details inserted";
    } else {
        echo "not inserted";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <title>add staff details</title>
</head>

<body>
    <h1><?php require('./admindashboard.php') ?></h1>

    <form method="POST">
        <input type="text" name="staffname" placeholder="enter staff name" />
        <input type="number" name="phonenumber" placeholder="enter phone number" />
        <input type="email" name="useremail" placeholder=" enter email id" />
        <input type="number" name="staffid" placeholder="enter staffid " />
        <input type="submit" name="submitbtn" value="add staff information" />
    </form>
</body>

</html>