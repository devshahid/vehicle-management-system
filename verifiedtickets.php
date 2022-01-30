<?php
require './config.php';
$msg = "";
$selectdata = "SELECT * from bookinginfo WHERE travelled = 'no'";
$result = mysqli_query($databasekey, $selectdata);
$tabledata = "";
if (mysqli_num_rows($result) > 0) {
    while ($fetch = mysqli_fetch_assoc($result)) {
        $tabledata = $tabledata .
            "<tr>
     <td>" . $fetch["busid"] . "</td>
     <td>" . $fetch["seats"] . "</td>
     <td>" . $fetch["bookingdate"] . "</td>
     <td>" . $fetch["source"] . "</td>
     <td>" . $fetch["destination"] . "</td>
     <td>" . $fetch["passengername"] . "</td>
     <td class=verifyIcon><a href=collected.php?busid="  . $fetch["busid"] . "&seats=" . $fetch["seats"] . "&bookingdate=" . $fetch["bookingdate"] . "&passengername=" . urlencode($fetch["passengername"]) .  " ><i class=icon-check-sign></i></a></td>
     </tr>";
    }
}
if (!empty($_GET["msg"])) {
    if ($_GET["msg"] == "sucess") {
        $msg =  "Ticket Collected";
    } else {
        $msg = "Ticket Not Collected";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="css/tables.css">
    <title>Verify Tickets</title>
</head>

<body>
    <?php require('./navbar.php') ?>
    <div class="errorTitleDisplay">
        <h1><?php echo !empty($msg) ? $msg : "" ?></h1>
    </div>
    <?php
    if (!empty($tabledata)) {
    ?>
        <table id=mainTable>
            <tr>
                <th> BUS ID </th>
                <th> SEATS </th>
                <th> BOOKING DATE </th>
                <th> SOURCE </th>
                <th> DESTINATION </th>
                <th> PASSENGER NAME </th>
                <th class="verifyIcon"> VERIFY TICKETS </th>
            </tr>
            <?php echo $tabledata; ?>
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