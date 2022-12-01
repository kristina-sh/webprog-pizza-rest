<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Kristina Shalaginova">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/assignment2.css">
    <title>Menu</title>
</head>
<!-- Navigation bar-->

<body>
    <header class="header" id="menupage">
        <div class="navbar">
            <h3>My Pizza shop</h3>
            <h6><a class="link" href="./index.html">Log-in</a></h6>
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
    <!--Conttent with menu items -->
    <div class="menu">
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "my_pizza_shop";

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
            <div class='item-image'><img src='$row[image]' alt='$row[name]'></div>
            <div class='name'>$row[name]</div>
            <div class='category'>$row[category]</div>
            <div class='descrip'>$row[description]</div>
            <div class='size'>$row[size]</div>
            <div class='price'>$row[price]</div>
            </div>
                ";
            };
                ?>
    </div>

    <!--Footer-->
    <div id="footer"></div>
    <div class="footer">
        <p>© 2022 My Pizza Shop (mypizza.com). All Rights Reserved.</p>
    </div>
    <script src="./JS/menu.js"></script>
</body>
</html>