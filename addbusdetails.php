<?php
require './config.php';
$msg = "";
if (isset($_POST["submitbtn"])) {
    $busname = $_POST["busname"];
    $busnumber = $_POST["busnumber"];
    $busoperator = $_POST["busoperator"];
    $busseats = $_POST["seats"];
    $selectdata = "SELECT * from staffdetails WHERE staffId='$busoperator'";
    $result = mysqli_query($databasekey, $selectdata);
    $fetch = mysqli_fetch_assoc($result);
    $operator = $fetch["staffName"];

    $insertdata = "insert into busdetails (Busname, BusId, BusOperator,operatorname,seats,leftseats) values
    ('$busname', '$busnumber', '$busoperator','$operator','$busseats','$busseats')";
    $result = mysqli_query($databasekey, $insertdata);
    if ($result) {
        $msg =  "Bus Information Added Sucessfully";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/addBusDetails1.css">
    <title>Add Bus Details</title>
</head>

<body>
    <?php require('./navbar.php') ?>
    <div class="mainContent">
        <div class="formContent">
            <form method="POST">
                <p><?php echo !empty($msg) ?  $msg : "";  ?></p>
                <input type="text" name="busname" placeholder="ENTER BUS NAME" required />
                <input type="text" name="busnumber" placeholder="ENTER BUS NUMBER" required />
                <input type="number" name="seats" placeholder="ENTER SEATS" required />
                <select name="busoperator" class="selectOption">

                    <?php
                    echo "<option class=optionName value=" . NULL . "> SELECT BUS OPERATOR </option>";
                    $selectDetails = "select * from staffdetails";
                    $result = mysqli_query($databasekey, $selectDetails);
                    if (mysqli_num_rows($result) > 0) {
                        while ($fetch = mysqli_fetch_assoc($result)) {
                            echo "<option class=optionName value=" . $fetch["staffId"] . ">" . $fetch["staffName"] . " </option>";
                        }
                    }

                    ?>
                </select>
                <input type="submit" name="submitbtn" value="ADD BUS DETAILS">
                <button class="signUpBtn"><a href="./admindashboard.php">ADMIN DASHBOARD</a></button>

            </form>
        </div>
    </div>
</body>

</html>