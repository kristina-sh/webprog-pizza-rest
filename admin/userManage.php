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
    <title>User Management Page</title>
</head>
<body>
    <div>
        <header>
            <h1>User Management Page</h1>
        </header>
        <div>
            <a href="./createUser.php" type="button" onclick="link" class="adminButtons newUser">New User</a>
        </div>
        <table class="dataTable">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Password</th>
                <th>Roles</th>
                <th>UserName</th>
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
            $sql = "SELECT * FROM users";
            $result = $connection->query($sql);

            if (!$result) {
                die("Invalid query: " . $connection->error);
            }

            while($row = $result->fetch_assoc()) {
                echo "
                <tr>
                    <td>$row[id]</td>
                    <td>$row[firstName]</td>
                    <td>$row[lastName]</td>
                    <td>$row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[password]</td>
                    <td>$row[role]</td>
                    <td>$row[username]</td>
                    <td>
                        <a class='editItem adminButtons' href='./editUser.php?id=$row[id]'>Edit</a>
                        <a class='deleteItem adminButtons' href='./deleteUser.php?id=$row[id]'>Delete</a>
                    </td>
                </tr>
                ";
            }


            ?>

        </table>  
    </div>
    <div>
        <a href="./../admin.html" class="returnHome adminButtons">Return</a>
    </div>

</body>
</html>