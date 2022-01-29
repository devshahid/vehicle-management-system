<?php
require './config.php';
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
    if ($result == true) {
        echo "recorded sucessfully";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add bus details</title>
</head>

<body>
    <h1><?php require('./admindashboard.php') ?></h1>
    <form method="POST">
        <input type="text" name="busname" placeholder="enter bus name" />
        <input type="text" name="busnumber" placeholder="enter bus number" />
        <input type="number" name="seats" placeholder="enter seats" />



        <select name="busoperator">
            <?php
            $selectDetails = "select * from staffdetails";
            $result = mysqli_query($databasekey, $selectDetails);
            if (mysqli_num_rows($result) > 0) {
                while ($fetch = mysqli_fetch_assoc($result)) {
                    echo "<option value=" . $fetch["staffId"] . ">" . $fetch["staffName"] . " </option>";
                }
            }

            ?>


        </select>
        <input type="submit" name="submitbtn" value="add bus details">

    </form>
</body>

</html>