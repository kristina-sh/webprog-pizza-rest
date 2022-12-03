<!--    Course name: Web Programming (CST_8285_312)
        Assignment 2
        Students: Kristina Shalaginova, Melanie Methe, Banumajan Mohammad 
-->
<?php
$user_id     =$_POST['userid'];
$pwd        =$_POST['password'];

// Database connection
$conn = new mysqli('localhost','root','','webassign2');

if ($conn->connect_error) {
    die('Connection Failed : '.$conn->connect_error);
}

else {
    $sql ="select * from users where username ='$user_id' and password='$pwd'" ;
    $result =mysqli_query($conn, $sql);
    
    $count =mysqli_num_rows($result);
    
    if ($count==1) {
        
        header("Location:menu.php");

        //$row = mysqli_fetch_assoc($result);
       // echo $row['role'];
        // if($row['role']=='user'){
           // header("Location:menu.html");
          
       // }
       
        // else{
        //   //  header("Location:itemusermgt.html");
        //   header("Location:userManage.php");
        // }
        //header("Location:userManage.php");
    }

    else {
        echo '<script>
        window.location.href ="index.html";
        alert ("Login Failed. Invalid username or password!!!")
        </script>';
    }    
    $conn->close();
}
?>