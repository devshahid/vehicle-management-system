<?php
require './config.php';
$msg = "";
if (isset($_POST["submitbtn"])) {
    $busid = $_POST["busid"];
    $busroute = $_POST["busroute"];

    $busroute = preg_replace('/\s+/', '', $busroute);
    $busroute = strtoupper($busroute);
    $insertdata = "insert into routedetails ( busId, busroute) values
    ( '$busid', '$busroute')";
    $result = mysqli_query($databasekey, $insertdata);
    if ($result == true) {
        $msg = "Route Information Recorded Sucessfully";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/busroute.css">
    <title>Add Bus Route</title>
</head>

<body>
    <?php require('./navbar.php') ?>
    <div class="mainContent">
        <div class="formContent">
            <form method="POST">
                <p><?php echo !empty($msg) ?  $msg : "";  ?></p>
                <select name="busid" class="selectOption">
                    <?php
                    echo "<option class=optionName value=" . NULL . "> SELECT BUS NAME </option>";

                    $selectDetails = "select * from busdetails";
                    $result = mysqli_query($databasekey, $selectDetails);
                    if (mysqli_num_rows($result) > 0) {
                        while ($fetch = mysqli_fetch_assoc($result)) {
                            echo "<option class=optionName value=" . $fetch["BusID"] . ">" . $fetch["BusName"] . " </option>";
                        }
                    }
                    ?>
                </select>
                <textarea name="busroute" id="" cols="50" rows="5" placeholder="Enter Bus Route"></textarea>
                <input type="submit" name="submitbtn" value="ADD BUS ROUTE">
                <button class="signUpBtn"><a href="./admindashboard.php">ADMIN DASHBOARD</a></button>
            </form>
        </div>
    </div>
</body>

</html>