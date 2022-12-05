<!-- Course name: Web Programming (CST_8285_312)
Assignment 2
Students: Kristina Shalaginova, Melanie Methe, Banumajan Mohammad -->

<?php

$servername = "localhost";
$user = "root";
$databasePasswd = "";
$database = "webassign2";

//Create connection
$connection = new mysqli($servername, $user, $databasePasswd, $database);

$firstName = "";
$lastName = "";
$email = "";
$phone = "";
$username = "";
$role = "";
$password = "";


$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST["username"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    do {
        if (empty($username) || empty($firstName) || empty($lastName) || empty($email) || empty($password)) {
            $errorMessage = "Username, first and last name, email, and password required";
            break;
        }

        // add new client to database

        $result = $connection -> query("INSERT INTO users (username, firstName, lastName, email, phone, role, password) VALUES ('$username', '$firstName', '$lastName', '$email', '$phone', '$role', '$password');");

        if (!$result) {
            $errorMessage = "Invalid Query: " . $connection->error;
            break;
        }

        $firstName = "";
        $lastName = "";
        $email = "";
        $phone = "";
        $username = "";
        $role = "";
        $password = "";

        $successMessage = "User added successfully";
        
        header("location: ./userManage.php");
        exit;

    } while (false);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Melanie Methe">
    <link rel="stylesheet" href="./../CSS/assignment2.css">
    <title>Create User</title>
</head>
<body>
    <div>
        <h1>Creating a New User</h1>

        <?php
        if ( !empty($errorMessage)) {
            echo "
            <div class='errorMessage' role='alert'>
                <button type='button' class='buttonError' data-bs-dismiss='alert'>$errorMessage</button>
            </div>
            ";
        }
        ?>
        <form action="" method="POST">
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" value="<?php echo $username; ?>">
            </div>
            <div>
                <label for="firstName">First Name</label>
                <input type="text" name="firstName" value="<?php echo $firstName; ?>">
            </div>
            <div>
                <label for="lastName">Last Name</label>
                <input type="text" name="lastName" value="<?php echo $lastName; ?>">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="text" name="email" value="<?php echo $email; ?>">
            </div>
            <div>
                <label for="phone">Phone Number</label>
                <input type="text" name="phone" value="<?php echo $phone; ?>">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" value="<?php echo $password; ?>">
            </div>
            <div>
                <label for="role">Role</label>
                <input type="text" name="role" value="<?php echo $role; ?>">
            </div>
            <?php
                if ( !empty($successMessage)) {
                    echo "
                    <div class='errorMessage' role='alert'>
                        <button type='button' class='buttonError' data-bs-dismiss='alert'>$successMessage</button>
                    </div>
                    ";
                }
            ?>
            <div>
                <button type="submit">Submit</button>
                <button type="reset">Clear</button>
                <a class="cancel" href="./userManage.php" role="button">Cancel</a>
            </div>
        </form>
    </div>
    
</body>
</html>