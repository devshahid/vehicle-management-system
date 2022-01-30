<?php

$showtable = false;
require './config.php';
$selectdata = "SELECT * FROM staffdetails";
$result = mysqli_query($databasekey, $selectdata);
if (mysqli_num_rows($result) > 0) {
    $showtable = true;
    $rows = "";
    while ($fetch = mysqli_fetch_assoc($result)) {
        $rows = $rows . "<tr>
        <td>" . $fetch["staffId"] . "</td>
        <td>" . $fetch["staffName"] . "</td>
        <td>" . $fetch["staffEmail"] . "</td>
        <td>" . $fetch["staffPhone"] . "</td>
        <td>" . $fetch["staffaddress"] . "</td>
        <td>" . $fetch["staffdesignation"] . "</td>
        <td><a href=updateDetails.php?staffId=" . $fetch["staffId"] . "&actionType=update>Update Detail</a></td>
        <td><a href=updateDetails.php?staffId=" . $fetch["staffId"] . "&actionType=delete>Remove Data</a></td>
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
    <title>booking history</title>
</head>

<body>
    <h1><?php require('./admindashboard.php') ?></h1>

    <?php
    if ($showtable == true) {
        echo "<table>
    <tr>
    <th> Staff Id </th> 
     <th> Staff Name </th>
     <th> Staff Email </th>
     <th> Staff Phone </th>
     <th> Staff Address </th>
     <th> Staff Designation </th>
    </tr>
    " . $rows . "
    </table>";
    } else {
        echo "no data found";
    }
    ?>
</body>

</html>