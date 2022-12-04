<!--    Course name: Web Programming (CST_8285_312)
        Assignment 2
        Students: Kristina Shalaginova, Melanie Methe, Banumajan Mohammad 
-->
<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Kristina Shalaginova,Banumajan Mohammad">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/assignment2.css">
    <title>Menu</title>
</head>

<body>
    <!-- Navigation bar-->
    <header class="header" id="menupage">    
        <div class="navbar">
            <p>My Pizza Shop</p>
        </div> 
        <div class="logoutdiv">                      
            <?php  if (isset($_SESSION['username'])) : ?>
                <p class="loginuser">Welcome                    
                    <?php echo $_SESSION['username']; ?>                    
                </p>                
            <?php endif ?>            
            <?php  if ($_SESSION['role'] == 'admin') { 
                 echo "<a class=\"adminlink\" href=\"./admin.php\"> Go to Admin Page </a>";               
            } ?>

            <a class="link" href="./index.html">Log-out</a> 
        </div>        
    </header>    
   
    <!-- Filtering and searching area -->
    <form class="select-form">
        <div class="head-select"> Filter menu items:</div>
        <select name="category" id="category-select" onclick="filter_item()">
            <option value="select_item" class="option">Select item...</option>
            <option value="pizza" class="option">Pizza</option>
            <option value="pasta" class="option">Pasta</option>
        </select>
        <input type="text" id="searchbar" onkeyup="search_item()" name="search" placeholder="Search...">
    </form>
    
    <!--Content with menu items -->
    <div class="menu">
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "webassign2";

            //Create connection
            $connection = new mysqli($servername, $username, $password, $database);

            //Check connection
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            //read all row from database table
            $sql = "SELECT * FROM items";
            $result = $connection->query($sql);

            if (!$result) {
                die("Invalid query: " . $connection->error);
            }

            while($row = $result->fetch_assoc()) {
                echo "
                
            <div class='item'>
            <div class='item-image'><img class='itemimage' src='$row[image]' alt='$row[name]'></div>
            <div class='item-text'>
            <div class='name'>$row[name]</div>
            <div class='category'>$row[category]</div>
            <div class='descrip'>$row[description]</div>
            <div class='size'>$row[size]</div>
            <div class='price'>$row[price]</div>
            </div>
            </div>
                ";
            };
                ?>
    </div>
    <!--Footer-->
    <?php include "footer.php";?>
    <script src="./JS/menu.js"></script>
</body>
</html>