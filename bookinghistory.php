<?php

$showtable = false;
require './config.php';

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
    <title>booking history</title>
</head>

<body>
    <h1><?php require('./admindashboard.php') ?></h1>

    <?php
    if ($showtable == true) {
        echo "<table>
    <tr>
    <th> passenger name </th> 
     <th> busid </th>
     
     <th> seats </th>
     <th> booking date </th>
     <th> source </th>
     <th> destination </th>  

    
    </tr>
    " . $rows . "
    </table>";
    } else {
        echo "no data found";
    }



    ?>



</body>

</html>