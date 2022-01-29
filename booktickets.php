<?php
require './config.php';
$selectdata = "SELECT * FROM routedetails";
$result = mysqli_query($databasekey, $selectdata);
// $citieslist=array();
$showTable = false;
$displayerror = false;
$list = "";
if (mysqli_num_rows($result) > 0) {
    // when you have atleast 1 row
    while ($fetch = mysqli_fetch_assoc($result)) {
        $list = $list . $fetch["busroute"] . ",";
    }
    $list = substr_replace($list, "", -1); // removing last , from the string
    $list = explode(",", $list); // converting string into array by separating with ,


    // removing duplicate values
    $citiesList = array(); //created empty array
    // $citiesList = RAIPUR, BHILAI, DURG, NAGPUR, BHOPAL,MUMBAI
    foreach ($list as $inputArrayItem) { // outerloop = 1
        // $inputArrayItem = MUMBAI
        foreach ($citiesList as $outputArrayItem) { //inner loop
            // $outputarrayitem = DURG

            if ($inputArrayItem == $outputArrayItem) {
                continue 2;
            }
        }
        $citiesList[] = $inputArrayItem;
    }
}
if (isset($_POST["searchbus"])) {
    $source = $_POST["source"];
    $destination = $_POST["destination"];
    $seatsRequired = $_POST["seatsRequired"];
    $searchBus = "SELECT * from routedetails WHERE busroute regexp '$source?' AND busroute regexp '$destination?'";
    $result = mysqli_query($databasekey, $searchBus);
    $avaialbleBus = array();
    if (mysqli_num_rows($result) > 0) {
        while ($fetch = mysqli_fetch_assoc($result)) {
            array_push($avaialbleBus, $fetch["busId"]);
        }
        $imploded_arr = implode(',', $avaialbleBus);
        // $imploded_arr = 1234,8522
        $searchBus = "SELECT * from busdetails WHERE BusID IN ($imploded_arr)";
        $result = mysqli_query($databasekey, $searchBus);
        $tableData = "";

        if (mysqli_num_rows($result) > 0) {
            $showTable  = true;

            while ($fetch = mysqli_fetch_assoc($result)) {
                $tableData = $tableData .
                    "<tr>
                    <td>" . $fetch["BusID"] . "</td>
                    <td>" . $fetch["BusName"] . "</td>
                    <td>" . $source . "</td>
                    <td>" . $destination . "</td>
                    <td>" . $fetch["leftseats"] . "</td>

                    <td>" . $seatsRequired . "</td>
                    <td><a href=confirmtickets.php?busid=" . $fetch["BusID"] . "&Source=" . $source . "&destination=" . $destination . "&seatsRequired=" . $seatsRequired . ">Book Ticket</a></td>
                </tr>";
            }
        }
    } else {
        $noresult = "bus not available";
        $displayerror = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ticket booking</title>
</head>

<body>
    <h1><?php require('./admindashboard.php') ?></h1>

    <form method="POST">
        <select name="source">
            <?php
            foreach ($citiesList as $value) {
                echo "<option value=" . $value . "> " . $value . " </option>";
            }
            ?>
        </select>
        <select name="destination">
            <?php
            foreach ($citiesList as $value) {
                echo "<option value=" . $value . "> " . $value . " </option>";
            }
            ?>
        </select>
        <input type="number" name="seatsRequired" placeholder="number of seats required">
        <input type="submit" name="searchbus" value="search bus">
    </form>
    <button><a href="./logout.php">logout</a></button>
    <?php
    if ($showTable == true) {

        echo "<table>
            <tr>
                <th>Bus ID</th>
                <th>Bus Name</th>
                <th>Source</th>
                <th>Destination</th>
                <th>Available seats</th>
                <th>Select No. of seats</th>
            </tr>
            " . $tableData . "
        </table>";
    } elseif ($displayerror == true) {
        echo $noresult;
    }
    ?>


</body>

</html>