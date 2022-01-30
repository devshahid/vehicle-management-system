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
    <link rel="stylesheet" href="css/tables.css">
    <title>Bus Info</title>
</head>

<body>
    <?php require('./navbar.php') ?>
    <?php
    if ($showtable == true) {
    ?>
        <table id=mainTable>
            <tr>
                <th> BUS ID </th>
                <th> STAFF ID </th>
                <th> BUS NAME </th>
                <th> STAFF NAME </th>
                <th> TOTAL SEATS </th>
                <th> AVAILABLE SEATS </th>
            </tr>
            <?php echo $rows ?>
        </table>
    <?php
    } else {
    ?>
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