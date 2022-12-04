<!-- File coded by: Melanie Methe -->

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