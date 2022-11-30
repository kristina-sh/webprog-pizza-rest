<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Melanie, Kristina, Banu">
    <link rel="stylesheet" href="./CSS/assignment2.css">
    <title>User Management Page</title>
</head>
<body>
    <div>
        <h1>User Management Page</h1>
        <a class="newUser" href="./admin/createUser.php" role="button">New User</a>
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
                        <a class='editUser' href='./admin/editUser.php?id=$row[id]'>Edit</a>
                        <a class='deleteUser' href='./admin/deleteUser.php?id=$row[id]'>Delete</a>
                    </td>
                </tr>
                ";
            }


            ?>

        </table>  
    </div>

</body>
</html>