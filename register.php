<!--    Course name: Web Programming (CST_8285_312)
        Assignment 2
        Students: Kristina Shalaginova, Melanie Methe, Banumajan Mohammad 
-->

<!-- Author:BanuMajan Mohammad -->
<?php
// super global variables
$userid     =$_POST['userid'];
$password   =$_POST['password'];
$fname      =$_POST['fname'];
$lname      =$_POST['lname'];
$email      =$_POST['email'];
$phone      =$_POST['phone'];

// Database connection
$conn = new mysqli('localhost','root','','webassign2');

if ($conn->connect_error) {
    die('Connection Failed : '.$conn->connect_error);
} 
else {
    // insert user details into database
    $stmt =$conn->prepare("INSERT INTO users (username, password,firstname, lastname,email, phone) 
    VALUES (?,?,?,?,?,?)");
    $stmt->bind_param("ssssss",$userid,$password,$fname,$lname,$email,$phone);
    $stmt->execute();    
    header("Location:index.html");
    
    //close connection and statement
    $stmt->close();
    $conn->close();
}
?>