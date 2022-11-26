<?php
$userid     =$_POST['userid'];
$password   =$_POST['password'];
$fname      =$_POST['fname'];
$lname      =$_POST['lname'];
$email      =$_POST['email'];
$phone      =$_POST['phone'];
// Database connection
$conn = new mysqli('localhost','root','','assign2');
if ($conn->connect_error) {
    die('Connection Failed : '.$conn->connect_error);
} else {
    $stmt =$conn->prepare("INSERT INTO user_info (user_name, first_name, last_name, password, email, phone) 
    VALUES (?,?,?,?,?,?)");
    $stmt->bind_param("ssssss",$userid,$password,$fname,$lname,$email,$phone);
    $stmt->execute();
     echo "registration success..";
    header("Location:index.html");
    $stmt->close();
    $conn->close();
}
?>