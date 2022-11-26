<?php
$user_id     =$_POST['userid'];
$pwd        =$_POST['password'];

// Database connection
$conn = new mysqli('localhost','root','','assign2');
if ($conn->connect_error) {
    die('Connection Failed : '.$conn->connect_error);
} else {
    $sql ="select * from user_info where user_name ='$user_id' and password='$pwd'" ;
    $result =mysqli_query($conn, $sql);
    // $row =mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count =mysqli_num_rows($result);
    if ($count==1) {
        header("Location:itemList.html");
        
    }
    else {
        echo '<script>
        window.location.href ="index.html";
        alert ("Login Failed. Invalid username or password!!!")
        </script>';
    }  
   
    $stmt->close();
    $conn->close();
}
?>