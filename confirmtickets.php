<?php
session_start();
require './config.php';
if (isset($_POST["submitbtn"])) {
    $Pname = $_POST["Pname"];
    $source = $_GET["Source"];
    $destination = $_GET["destination"];
    $seatsRequired = $_GET["seatsRequired"];
    $busid = $_GET["busid"];
    $selectdata = "SELECT * FROM busdetails  WHERE BusID ='$busid'";

    $result = mysqli_query($databasekey, $selectdata);
    if (mysqli_num_rows($result) > 0) {
        $fetch = mysqli_fetch_assoc($result);
        $leftseats = $fetch["leftseats"];
        if ($leftseats >= $seatsRequired) {
            $leftseats = $leftseats - $seatsRequired;
            $update = "UPDATE busdetails SET leftseats='$leftseats' WHERE BusID='$busid'";
            $result = mysqli_query($databasekey, $update);
            if ($result == true) {
                date_default_timezone_set("Asia/kolkata");
                $bookingdate = date('d-m-y');
                $insertdata = "insert into bookinginfo
             (passengername, BusID, seats, bookingdate, source, destination) values
             ('$Pname' ,'$busid','$seatsRequired', '$bookingdate', ' $source' ,'$destination')";
                $result = mysqli_query($databasekey, $insertdata);
                if ($result == true) {
                    echo "booking confirmed";
                }
            }
        }
    }
}

if (!empty($_GET["busid123"])) {
    $source = $_GET["Source"];
    $destination = $_GET["destination"];
    $seatsRequired = $_GET["seatsRequired"];
    $busid = $_GET["busid"];
    $PID = $_SESSION["PID"];
    $selectdata = "SELECT * FROM busdetails  WHERE BusID ='$busid'";

    $result = mysqli_query($databasekey, $selectdata);
    if (mysqli_num_rows($result) > 0) {
        $fetch = mysqli_fetch_assoc($result);
        $leftseats = $fetch["leftseats"];
        if ($leftseats >= $seatsRequired) {
            $leftseats = $leftseats - $seatsRequired;
            $update = "UPDATE busdetails SET leftseats='$leftseats' WHERE BusID='$busid'";
            $result = mysqli_query($databasekey, $update);
            if ($result == true) {
                date_default_timezone_set("Asia/kolkata");
                $bookingdate = date('d-m-y');
                $insertdata = "insert into bookinginfo
             (passengerid, BusID, seats, bookingdate, source, destination) values
             ('$PID' ,'$busid','$seatsRequired', '$bookingdate', ' $source' ,'$destination')";
                $result = mysqli_query($databasekey, $insertdata);
                if ($result == true) {
                    echo "booking confirmed";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST">
        <input type="text" name="Pname" placeholder="enter passenger name">
        <input type="submit" name="submitbtn">
    </form>
</body>

</html>