<!-- File coded by: Melanie Methe -->

<?php

$servername = "localhost";
$username = "root";
$databasePasswd = "";
$database = "webassign2";

$id = $_GET["id"];

//Create connection
$connection = new mysqli($servername, $username, $databasePasswd, $database);

$result = $connection -> query("DELETE FROM items WHERE id='$id'");
if (!$result) {
    $errorMessage = "Invalid Query: " . $connection -> error;
}

header("location: ./itemManage.php");
?>