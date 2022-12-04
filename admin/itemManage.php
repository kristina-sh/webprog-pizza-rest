<!-- Course name: Web Programming (CST_8285_312)
Assignment 2
Students: Kristina Shalaginova, Melanie Methe, Banumajan Mohammad -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Melanie Methe">
    <link rel="stylesheet" href="./../CSS/admin.css">
    <title>Menu Item Management Page</title>
</head>
<body>
    <div>
        <header>
            <h1>Menu Item Management Page</h1>
        </header>
        <a class="newItem adminButtons" href="./createItem.php" role="button">New Item</a>
        <table class="dataTable">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Size</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
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
                <tr>
                    <td>$row[id]</td>
                    <td>$row[image]</td>
                    <td>$row[name]</td>
                    <td>$row[category]</td>
                    <td>$row[description]</td>
                    <td>$row[size]</td>
                    <td>$row[price]</td>
                    <td>
                        <a class='editItem adminButtons' href='./editItem.php?id=$row[id]'>Edit</a>
                        <a class='deleteItem adminButtons' href='./deleteItem.php?id=$row[id]'>Delete</a>
                    </td>
                </tr>
                ";
            }


            ?>

        </table>  
    </div>
    <div>
        <a href="./../admin.html"  class="returnHome adminButtons">Return</a>
    </div>

</body>
</html>