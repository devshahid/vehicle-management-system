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
    <th> staff Id </th> 
     <th> staff Name </th>
     <th> staff Email </th>
     <th> staff Phone </th>
    </tr>
    " . $rows . "
    </table>";
    } else {
        echo "no data found";
    }



    ?>



</body>

</html>