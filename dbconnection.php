<?php
$conn = new mysqli('localhost','root','','assign2');
if ($conn->connect_error) {
    die('Connection Failed : '.$conn->connect_error);

    ?>