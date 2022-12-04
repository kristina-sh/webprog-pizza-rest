<!-- Course name: Web Programming (CST_8285_312)
Assignment 2
Students: Kristina Shalaginova, Melanie Methe, Banumajan Mohammad -->

<!-- This php file deletes the row from the user table that is assosicated with the id sent through GET method from the userManage page -->

<?php

$servername = "localhost";
$user = "root";
$databasePasswd = "";
$database = "webassign2";

$id = $_GET["id"];

//Create connection
$connection = new mysqli($servername, $user, $databasePasswd, $database);

$result = $connection -> query("DELETE FROM users WHERE id='$id'");
if (!$result) {
    $errorMessage = "Invalid Query: " . $connection -> error;
}

header("location: ./userManage.php");
?>