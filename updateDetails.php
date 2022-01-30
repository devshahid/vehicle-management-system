<?php
require './config.php';
$redirect = false;
if (!empty($_GET["staffId"])) {
    $staffID = $_GET["staffId"];
    if ($_GET["actionType"] == "update") {
        $query = "SELECT * FROM staffdetails WHERE staffId= '$staffID'";
        $result = mysqli_query($databasekey, $query);
        if (mysqli_num_rows($result) > 0) {
            $fetch = mysqli_fetch_assoc($result);
        }
    } else {
        $query = "DELETE FROM staffdetails WHERE staffid='$staffID'";
        $result = mysqli_query($databasekey, $query);
        if ($result) {
            $actionMsg = "Information Removed Successfully";
            header("location: staffinfo.php?actionMsg=" . $actionMsg);
        }
    }
}
if (isset($_POST["changeData"])) {
    $staffID = $_GET["staffId"];
    $staffName = $_POST["staffName"];
    $staffEmail = $_POST["staffEmail"];
    $staffPhone = $_POST["staffPhone"];
    $staffAdd = $_POST["staffAdd"];
    $staffDes = $_POST["staffDes"];

    $query = "UPDATE staffdetails SET staffName = '$staffName', staffPhone = '$staffPhone', 
    staffEmail= '$staffEmail', staffaddress='$staffAdd', staffdesignation='$staffDes' WHERE staffid= '$staffID'";
    $result = mysqli_query($databasekey, $query);
    if ($result) {
        $actionMsg = "Staff Details Updated";
        header("location: staffinfo.php?actionMsg=" . $actionMsg);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/updateStaff.css">
    <title>Update Details</title>
</head>

<body>
    <?php require('./navbar.php') ?>

    <div class="mainContent">
        <div class="formContent">
            <?php
            if ($redirect) {
                header("location: staffinfo.php?msg=" . $msg);
            }
            ?>
            <form method="POST">
                <input type="text" name="staffName" placeholder="Enter Staff Name" value='<?php echo $fetch["staffName"] ?>'>
                <input type="number" name="staffPhone" placeholder="Enter Staff Phone" value='<?php echo $fetch['staffPhone'] ?>'>
                <input type="email" name="staffEmail" placeholder="Enter Staff Email" value='<?php echo $fetch['staffEmail'] ?>'>
                <input type="text" name="staffAdd" placeholder="Enter Staff Address" value='<?php echo $fetch['staffaddress'] ?>'>
                <input type="text" name="staffDes" placeholder="Enter Staff Designation" value='<?php echo $fetch['staffdesignation'] ?>'>
                <input type="submit" value="UPDATE" name="changeData">
                <button class="signUpBtn"><a href="./staffinfo.php">CANCLE</a></button>
                <button class="signUpBtn"><a href="./admindashboard.php">ADMIN DASHBOARD</a></button>
            </form>
        </div>
    </div>
</body>

</html>