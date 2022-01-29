<?php
require './config.php';
if (!empty($_GET["busid"])) {

    $busid = $_GET["busid"];
    $seats = $_GET["seats"];
    $passengername = urldecode($_GET["passengername"]);
    $bookingdate = $_GET["bookingdate"];

    $update = "UPDATE bookinginfo SET travelled = 'yes' where busid= '$busid' AND seats = '$seats'
   AND bookingdate = '$bookingdate' AND passengername ='$passengername' ";

    $result = mysqli_query($databasekey, $update);
    print_r($result);
    if ($result == true) {

        $selectdata = "SELECT * from busdetails where BusID ='$busid' ";

        $result = mysqli_query($databasekey, $selectdata);
        $fetch = mysqli_fetch_assoc($result);
        $leftseats = $fetch["leftseats"];
        $updatedseats = $leftseats + $seats;
        $update = "UPDATE busdetails SET leftseats = '$updatedseats' where BusID='$busid'";
        $result = mysqli_query($databasekey, $update);

        if ($result == true) {
            header("location: verifiedtickets.php?msg=sucess");
        }
    } else {
        header("location: verifiedtickets.php?msg=failed");
    }
}
