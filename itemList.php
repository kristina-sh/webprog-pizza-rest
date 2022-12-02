
<?php
// {require_once('dbconnection.php');}
$conn = new mysqli('localhost','root','','assign2');
if ($conn->connect_error) {
    die('Connection Failed : '.$conn->connect_error);
}   
$sql ="select * from users" ;
$result =mysqli_query($conn, $sql);
// $row =mysqli_fetch_array($result,MYSQLI_ASSOC);
// while ($row = $result->fetch_assoc){
// echo "<table>";    
// while ($row = mysqli_fetch_assoc($result)){
// echo "this is table  ";
// echo "<tr>";
// echo $row['user_name'];
// echo "</tr>";
// }
// echo "</table>";

//The following is working
echo "<p> THis is a P tag</p>" ;
echo "<table>";
while ($row = mysqli_fetch_assoc($result)){
echo "<tr>";    
echo "<td>";    
echo $row['username'] ;
echo "</td>";
echo "<td>";    
echo $row['phone'] ;
echo "</td>";
echo "</tr>";
// echo "</br>";
}
echo "</table>";
$stmt->close();
$conn->close();
?>