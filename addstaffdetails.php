<?php
$msg = "";
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
    if ($result) {
        $msg = "Staff Information Added";
    } else {
        $msg = "Staff Information Not Added! Error..!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <link rel="stylesheet" href="css/addStaffDetails.css">
    <title>Add Staff Details</title>
</head>

<body>
    <?php require('./navbar.php') ?>
    <div class="mainContent">
        <div class="formContent">
            <form method="POST">
                <p><?php echo !empty($msg) ?  $msg : "";  ?></p>
                <input type="number" name="staffid" placeholder="Enter Staff ID" required />
                <input type="text" name="staffname" placeholder="Enter Staff Name" required />
                <input type="number" name="phonenumber" placeholder="Enter Staff Phone Number" required />
                <input type="email" name="useremail" placeholder="Enter Staff Email" required />
                <input type="text" name="staffAdd" placeholder=" Enter Staff Address" required />
                <input type="text" name="staffDes" placeholder="Enter Staff Designation" required />
                <input type="submit" name="submitbtn" value="Add Staff Information" />
                <button class="signUpBtn"><a href="./admindashboard.php">ADMIN DASHBOARD</a></button>
            </form>
        </div>
    </div>
</body>

</html>