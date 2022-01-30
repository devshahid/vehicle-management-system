<?php
if (isset($_POST["submitbtn"])) {
    $staffname = $_POST["staffname"];
    $phonenumber = $_POST["phonenumber"];
    $staffemail = $_POST["useremail"];
    $staffid = $_POST["staffid"];
    $staffAdd = $_POST["staffAdd"];
    $staffDes = $_POST["staffDes"];
    require './config.php';
    $insertdata = "insert into staffdetails
    (staffid, staffname, staffphone, staffemail, staffaddress, staffdesignation) values
    ('$staffid', '$staffname', '$phonenumber', '$staffemail', '$staffAdd', '$staffDes')";
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
        <input type="number" name="staffid" placeholder="Enter Staff ID" />
        <input type="text" name="staffname" placeholder="Enter Staff Name" />
        <input type="number" name="phonenumber" placeholder="Enter Staff Phone Number" />
        <input type="email" name="useremail" placeholder="Enter Staff Email" />
        <input type="text" name="staffAdd" placeholder=" Enter Staff Address" />
        <input type="text" name="staffDes" placeholder="Enter Staff Designation" />
        <input type="submit" name="submitbtn" value="Add Staff Information" />
    </form>
</body>

</html>