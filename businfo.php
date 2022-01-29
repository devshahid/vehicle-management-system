<?php

$showtable = false;
require './config.php';

$selectdata = "SELECT * FROM busdetails";
$result = mysqli_query($databasekey, $selectdata);
if (mysqli_num_rows($result) > 0) {
    $showtable = true;
    $rows = "";
    while ($fetch = mysqli_fetch_assoc($result)) {
        $rows = $rows . "<tr>
        

        <td>" . $fetch["BusID"] . "</td>
        <td>" . $fetch["BusOperator"] . "</td>
        <td>" . $fetch["BusName"] . "</td>
        <td>" . $fetch["operatorname"] . "</td>
        <td>" . $fetch["seats"] . "</td>
        <td>" . $fetch["leftseats"] . "</td>


        
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
    <title>bus info</title>
</head>

<body>
    <h1><?php require('./admindashboard.php') ?></h1>

    <?php
    if ($showtable == true) {
        echo "<table>
    <tr>
    <th> bus Id </th>
    <th> staff Id </th> 

     <th> bus Name </th>
     <th> staff name </th>
     <th>  total seats </th>
     <th>  available seats </th>

    </tr>
    " . $rows . "
    </table>";
    } else {
        echo "no data found";
    }



    ?>



</body>

</html>