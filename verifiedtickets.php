<?php
require './config.php';
$selectdata = "SELECT * from bookinginfo where travelled ='no'";
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
     <td><button><a href=collected.php?busid="  . $fetch["busid"] . "&seats=" . $fetch["seats"] . "&bookingdate=" . $fetch["bookingdate"] . "&passengername=" . urlencode($fetch["passengername"]) .  " >verified tickets</a></button></td>
     </tr>";
    }
}
if (!empty($_GET["msg"])) {
    if ($_GET["msg"] == "sucess") {
        echo "ticket collected";
    } else {
        echo "ticket not collected";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>verified tickets</title>
</head>

<body>
    <h1><?php require('./admindashboard.php') ?></h1>

    <?php
    if (!empty($tabledata)) {
        echo "<table> 
      <tr> 
      <th> busid  </th>
      <th> seats </th>
      <th> bookingdate </th>
      <th>  source </th>
      <th> destination </th>
      <th>  passengername </th>
      </tr>" . $tabledata . "
      </table>";
    } else {
        echo "data not found";
    }


    ?>

</body>

</html>