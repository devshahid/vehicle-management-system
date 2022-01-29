<?php
require './config.php';
if (isset($_POST["submitbtn"])) {
    $busid = $_POST["busid"];
    $busroute = $_POST["busroute"];

    $busroute = preg_replace('/\s+/', '', $busroute);
    $busroute = strtoupper($busroute);
    $insertdata = "insert into routedetails ( busId, busroute) values
    ( '$busid', '$busroute')";
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
    <title>add bus route</title>
</head>

<body>
    <h1><?php require('./admindashboard.php') ?></h1>

    <form method="POST">
        <select name="busid">
            <?php
            $selectDetails = "select * from busdetails";
            $result = mysqli_query($databasekey, $selectDetails);
            if (mysqli_num_rows($result) > 0) {
                while ($fetch = mysqli_fetch_assoc($result)) {
                    echo "<option value=" . $fetch["BusID"] . ">" . $fetch["BusName"] . " </option>";
                }
            }


            ?>
        </select>

        <textarea name="busroute" id="" cols="50" rows="5" placeholder="enter bus route"></textarea>
        <input type="submit" name="submitbtn" value="add bus route">

    </form>
    <button><a href="./admindashboard.php">admin dashboard</a></button>

</body>

</html>