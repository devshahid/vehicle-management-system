<?php
$showtable = false;
require './config.php';
$selectdata = "SELECT * FROM staffdetails";
$result = mysqli_query($databasekey, $selectdata);
$actionMsg = "";
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
        <td class=verifyIcon><a href=updateDetails.php?staffId=" . $fetch["staffId"] . "&actionType=update><i class=icon-check-sign></i></a></td>
        <td class=verifyIcon><a href=updateDetails.php?staffId=" . $fetch["staffId"] . "&actionType=delete><i class=icon-remove></i></a></td>
        </tr>";
    }
}
if (!empty($_GET["actionMsg"])) {
    $actionMsg = $_GET["actionMsg"];
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
    <title>Staff Information</title>
</head>

<body>

    <?php require('./navbar.php') ?>
    <div class="errorTitleDisplay">
        <h1><?php echo !empty($actionMsg) ? $actionMsg : "" ?></h1>
    </div>
    <?php
    if ($showtable == true) {
    ?>
        <table id="mainTable">
            <tr>
                <th> Staff Id </th>
                <th> Staff Name </th>
                <th> Staff Email </th>
                <th> Staff Phone </th>
                <th> Staff Address </th>
                <th> Staff Designation </th>
                <th class="verifyIcon"> UPDATE </th>
                <th class="verifyIcon"> REMOVE </th>
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
    <?php }
    ?>
</body>

</html>