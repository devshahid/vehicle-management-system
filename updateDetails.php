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
            $msg = "deleted";
            $redirect = true;
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
        $msg = "updated";
        $redirect = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Details</title>
</head>

<body>
    <?php
    if ($redirect) {
        header("location: staffinfo.php?msg=" . $msg);
    }
    ?>
    <form method="POST">
        <label>Name</label>
        <input type="text" name="staffName" placeholder="Enter Staff Name" value=<?php echo $fetch['staffName'] ?>>
        <label>Phone</label>
        <input type="text" name="staffPhone" placeholder="Enter Staff Phone" value=<?php echo $fetch['staffPhone'] ?>>
        <label>Email</label>
        <input type="text" name="staffEmail" placeholder="Enter Staff Email" value=<?php echo $fetch['staffEmail'] ?>>
        <label>Address</label>
        <input type="text" name="staffAdd" placeholder="Enter Staff Address" value=<?php echo $fetch['staffaddress'] ?>>
        <label>Designation</label>
        <input type="text" name="staffDes" placeholder="Enter Staff Designation" value=<?php echo $fetch['staffdesignation'] ?>>
        <input type="submit" value="Update Details" name="changeData">
        <a href="staffinfo.php">Cancle</a>
    </form>
</body>

</html>