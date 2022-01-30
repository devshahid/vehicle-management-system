<?php
session_start();
require './config.php';
$seatsCheck = true;

if (isset($_POST["submitCustomerData"])) {
    $customerName = $_POST["customerName"];
    $customerPhone = $_POST["customerPhone"];
    $customerEmail = $_POST["customerEmail"];
    $seatsRequired = intval($_POST['seats']);
    $seatType = $_POST['seatType'];
    $busid = $_GET["busid"];
    $source = $_GET["Source"];
    $destination = $_GET["destination"];
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
             (passengername, phone, email, BusID, seats, bookingdate, source, destination, seatType) values
             ('$customerName', '$customerPhone', '$customerEmail' ,'$busid','$seatsRequired', '$bookingdate', ' $source' ,'$destination', '$seatType')";
                $result = mysqli_query($databasekey, $insertdata);
                if ($result) {
                    $msg =  "Booking Confirmed";
                    header("location: booktickets.php?msg=" . $msg);
                }
            }
        }
    }
}
if (isset($_POST["seatsSearch"])) {
    $seatsCheck = false;
    $_SESSION["seatsRequired"] = $_POST["seatsRequired"];
}
// if (!empty($_GET["busid123"])) {
//     $source = $_GET["Source"];
//     $destination = $_GET["destination"];
//     $seatsRequired = $_GET["seatsRequired"];
//     $busid = $_GET["busid"];
//     $PID = $_SESSION["PID"];
//     $selectdata = "SELECT * FROM busdetails  WHERE BusID ='$busid'";

//     $result = mysqli_query($databasekey, $selectdata);
//     if (mysqli_num_rows($result) > 0) {
//         $fetch = mysqli_fetch_assoc($result);
//         $leftseats = $fetch["leftseats"];
//         if ($leftseats >= $seatsRequired) {
//             $leftseats = $leftseats - $seatsRequired;
//             $update = "UPDATE busdetails SET leftseats='$leftseats' WHERE BusID='$busid'";
//             $result = mysqli_query($databasekey, $update);
//             if ($result == true) {
//                 date_default_timezone_set("Asia/kolkata");
//                 $bookingdate = date('d-m-y');
//                 $insertdata = "insert into bookinginfo
//              (passengerid, BusID, seats, bookingdate, source, destination) values
//              ('$PID' ,'$busid','$seatsRequired', '$bookingdate', ' $source' ,'$destination')";
//                 $result = mysqli_query($databasekey, $insertdata);
//                 if ($result == true) {
//                     echo "booking confirmed";
//                 }
//             }
//         }
//     }
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bookstyle.css">
    <link rel="stylesheet" href="css/tables.css">
    <title>Confirm Ticket</title>
</head>

<body>
    <?php require('./navbar.php') ?>

    <?php
    if ($seatsCheck) {
    ?>
        <div class="mainContent">
            <div class="formContent">
                <form method="POST">
                    <input type="number" name="seatsRequired" placeholder="Enter Number of Seats Required">
                    <input type="submit" name="seatsSearch" value="CONFIRM SEATS">
                </form>
            </div>
        </div>
    <?php
    } else {
    ?>
        <div class="mainContent">
            <div class="formContent">
                <form method="POST">
                    <input type="text" name="customerName" placeholder="Enter Customer Name">
                    <input type="number" name="customerPhone" placeholder="Enter Customer Phone">
                    <input type="email" name="customerEmail" placeholder="Enter Customer Email">
                    <input type="text" value="<?php echo $_SESSION["seatsRequired"] ?>" hidden name="seats">
                    <div class="radiobutton">
                        <input type="radio" class="content" id="upper" name="seatType" value="UPPER" checked>
                        <label for="upper">UPPER</label><br>
                        <input type="radio" class="content" id="lower" name="seatType" value="LOWER">
                        <label for="lower">LOWER</label><br>
                    </div>
                    <input type="submit" name="submitCustomerData" value="BOOK TICKET">
                </form>
            </div>
        </div>
    <?php
    }
    ?>
</body>

</html>