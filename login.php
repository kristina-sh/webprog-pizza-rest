<!--    Course name: Web Programming (CST_8285_312)
        Assignment 2
        Student: Banumajan Mohammad 
-->
<?php
// start the session
session_start();

// super global variables
$user_id     =$_POST['userid'];
$pwd        =$_POST['password'];

// Database connection
$conn = new mysqli('localhost','root','','webassign2');

if ($conn->connect_error) {
    die('Connection Failed : '.$conn->connect_error);
}

else {
    $sql ="select * from users where username ='$user_id' and password='$pwd'" ;

    //execute the sql
    $result =mysqli_query($conn, $sql);
    
    //check the number of rows returned
    $count =mysqli_num_rows($result);
    
    //if the number of rows returned is then its a successfull login
    if ($count==1) {
        $row = mysqli_fetch_assoc($result);
        
        //set the session user name and role so we can use it in future pages
         $_SESSION['username'] = $row['username'];
         $_SESSION['role'] = $row['role'];
       
        header("Location:menu.php");        
    }

    else {
        // error message to the user for incorrect login
        echo '<script>
        window.location.href ="index.html";
        alert ("Login Failed. Invalid username or password!!!")
        </script>';
    }    
    //close the sql connection
    $conn->close();
}
?>