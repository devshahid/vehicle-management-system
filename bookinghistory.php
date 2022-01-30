<?php

$showtable = false;
require './config.php';
$msg = "";
$selectdata = "SELECT * FROM bookinginfo WHERE travelled = 'yes'";
$result = mysqli_query($databasekey, $selectdata);
if (mysqli_num_rows($result) > 0) {
    $showtable = true;
    $rows = "";
    while ($fetch = mysqli_fetch_assoc($result)) {
        $rows = $rows . "<tr>
        <td>" . $fetch["passengername"] . "</td>
        <td>" . $fetch["busid"] . "</td>
        <td>" . $fetch["seats"] . "</td>
        <td>" . $fetch["bookingdate"] . "</td>
        <td>" . $fetch["source"] . "</td>
        <td>" . $fetch["destination"] . "</td>
        </tr>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tables.css">
    <title>Booking History</title>
</head>

<body>

    <?php require('./navbar.php') ?>
    <?php
    if ($showtable == true) {
    ?>
        <table id=mainTable>
            <tr>
                <th> PASSENGER NAME </th>
                <th> BUS ID </th>
                <th> SEATS </th>
                <th> BOOKING DATE </th>
                <th> SOURCE </th>
                <th> DESTINATION </th>
            </tr>
            <?php echo $rows; ?>
        </table>
    <?php
    } else { ?>
        <div class="mainTableContent">
            <div class="tableContent">
                <h1>No Records Found</h1>
            </div>
        </div>
    <?php
    }
    ?>

</body>

</html>